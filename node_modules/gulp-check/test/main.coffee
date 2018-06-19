require 'mocha'
fs = require 'fs'
chai = require 'chai'
gutil = require 'gulp-util'
sinon = require 'sinon'
sinonChai = require 'sinon-chai'
checkPlugin = require '../'

expect = chai.expect
chai.use(sinonChai)

checkFileContents = fs.readFileSync('test/fixtures/check.txt')

describe 'gulp-check', ->
  errorStub = null
  endStub = null

  describe 'when buffering', ->

    bufferedFile = null
    checkStream = (check) ->
      stream = checkPlugin check
      stream.on 'error', errorStub
      stream.on 'end', endStub

      stream.write bufferedFile
      stream.end()

    beforeEach ->
      bufferedFile = new gutil.File
        path: 'test/fixtures/check.txt'
        cwd: 'test/'
        base: 'test/fixtures'
        contents: checkFileContents
      errorStub = sinon.stub()
      endStub = sinon.stub()

    describe 'when input is a string', ->

      it 'should emit an error if checks fail', ->
        checkStream 'console'
        expect(errorStub).to.have.been.called

      it 'should contain information about failed checks and file', ->
        checkStream 'console'
        message = errorStub.lastCall.args[0].message
        expect(message).to.contain 'console'
        expect(message).to.contain 'check.txt'

      it 'should not emit an error if checks pass', ->
        checkStream 'wazzup'
        expect(errorStub).to.not.have.been.called

    describe 'when input is a RegExp', ->

      it 'should emit an error if checks fail', ->
        checkStream /console/
        expect(errorStub).to.have.been.called

      it 'should contain information about failed checks and file', ->
        checkStream /console/
        message = errorStub.lastCall.args[0].message
        expect(message).to.contain 'console'
        expect(message).to.contain 'check.txt'

      it 'should only find first failed check', ->
        checkStream /(console)|(debugger)/
        message = errorStub.lastCall.args[0].message
        expect(message).to.contain 'console'
        expect(message).to.not.contain 'debugger'

      it 'should not emit an error if checks pass', ->
        checkStream /wazzup/
        expect(errorStub).to.not.have.been.called

    describe 'when input is invalid', ->

      it 'should throw an error on undefined', ->
        expect(checkStream).to.throw

      it 'should throw an error on numbers', ->
        expect(-> checkStream 1).to.throw

      it 'should throw an error on boolean', ->
        expect(-> checkStream true).to.throw

  describe 'when streaming', ->
    streamedFile = null
    stream = null

    checkStream = (check) ->
      stream = checkPlugin check
      stream.on 'error', errorStub
      stream.on 'end', endStub

      stream.write streamedFile
      stream.end()

    beforeEach ->
      streamedFile = new gutil.File
        path: 'test/fixtures/check.txt'
        cwd: 'test/'
        base: 'test/fixtures'
        contents: fs.createReadStream 'test/fixtures/check.txt'

    it 'should fail because streams are not supported yet', ->
      expect(checkStream).to.throw /streams not implemented/



