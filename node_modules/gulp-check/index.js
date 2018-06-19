var through = require('through2');
var gutil = require('gulp-util');

module.exports = function (pattern) {
  'use strict';
  if (typeof pattern === 'string') {
    pattern = new RegExp(pattern);
  } else if (!pattern instanceof RegExp) {
    throw new gutil.PluginError('gulp-check', 'Pattern must be a string or regular expression');
  }

  var stream = through.obj(function (file, enc, callback) {
    if (file.isStream()) {
      throw new gutil.PluginError('gulp-check', 'streams not implemented');
    } else if (file.isBuffer()) {
      var contents = String(file.contents);

      var matches = contents.match(pattern);
      if (matches) {
        this.emit('error', new gutil.PluginError('gulp-check', 'Found: ' + matches[0] + ' in file: ' + file.relative));
      }
    }

    this.push(file);
    return callback();
  });

  return stream;
};