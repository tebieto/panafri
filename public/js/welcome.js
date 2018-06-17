function showMenu() {

var hiddenDiv = document.getElementById('hide')
var showmenu = document.getElementById('showmenu')
var hidemenu = document.getElementById('hidemenu')

hiddenDiv.classList.remove('hidden')
showmenu.classList.add('hidden')
hidemenu.classList.remove('hidden')

}


function hideMenu() {

var hiddenDiv = document.getElementById('hide')
var hidemenu = document.getElementById('hidemenu')
var showmenu = document.getElementById('showmenu')

hiddenDiv.classList.add('hidden')
showmenu.classList.remove('hidden')
hidemenu.classList.add('hidden')

}