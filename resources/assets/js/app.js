
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('welcome', require('./components/Welcome.vue'));

const app = new Vue({
    el: '#app',
	methods: {
		
		
		

showMenu() {

var hiddenDiv = document.getElementById('hide')
var showmenu = document.getElementById('showmenu')
var hidemenu = document.getElementById('hidemenu')

hiddenDiv.classList.remove('hidden')
showmenu.classList.add('hidden')
hidemenu.classList.remove('hidden')

},


hideMenu() {

var hiddenDiv = document.getElementById('hide')
var hidemenu = document.getElementById('hidemenu')
var showmenu = document.getElementById('showmenu')

hiddenDiv.classList.add('hidden')
showmenu.classList.remove('hidden')
hidemenu.classList.add('hidden')

},

showSearchModal() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.remove('hidden')	
	
},


verifyPassword() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.remove('hidden')	
	
},


hideSearchModal() {
	
var searchModal = document.getElementById('search-page')	
searchModal.classList.add('hidden')	
	
},

startSellingModal() {
	
var startSelling = document.getElementById('start-selling')	
startSelling.classList.remove('hidden')

},

hideStartSellingModal() {
	
startSelling = document.getElementById('start-selling')	
startSelling.classList.add('hidden')

},

welcomeLoginModal() {
	
var welcomeLogin = document.getElementById('welcome-login')	
welcomeLogin.classList.remove('hidden')	
	
	
},


hideWelcomeLoginModal() {
	
var welcomeLogin = document.getElementById('welcome-login')	
welcomeLogin.classList.add('hidden')	
	
	
},

welcomeRegisterModal() {
	
var welcomeLogin = document.getElementById('welcome-register')	
welcomeLogin.classList.remove('hidden')	
	
	
},


hideWelcomeRegisterModal() {
	
var welcomeLogin = document.getElementById('welcome-register')	
welcomeLogin.classList.add('hidden')	
	
	
},

freeLanceModal() {
	
var freeLance = document.getElementById('freelance-delivery')	
freeLance.classList.remove('hidden')	

},

hideFreeLanceModal(){
	
var freeLance = document.getElementById('freelance-delivery')	
freeLance.classList.add('hidden')	
}


	
		
		
		
		
	}
});
