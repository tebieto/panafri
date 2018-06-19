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

function showSearchModal() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.remove('hidden')	
	
}


function verifyPassword() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.remove('hidden')	
	
}


function hideSearchModal() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.add('hidden')	
	
}

function startSellingModal() {
	
var startSelling = document.getElementById('start-selling')	
startSelling.classList.remove('hidden')

}

function hideStartSellingModal() {
	
var startSelling = document.getElementById('start-selling')	
startSelling.classList.add('hidden')

}

function sayHi() {
	
	console.log('hi')
	
}
	