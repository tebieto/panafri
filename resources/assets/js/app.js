
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
	
	
	
	data() {
		
		return {
		
				content: '',
				not_working: true,
				attachment: false,
				form: new FormData,
				uploadedFile: [],
				uploadDelay: [],
				productImage: [],
				sendingPost: false,
				show_post_spinner:false,
				productName: '',
				ocategory: '1',
				ncategory: '',
				pdisabled: true,
				categories: [],
			
			
		}
		
		
		
	},
	
mounted() {
	
this.allCategories()	
	
},
	
methods: {
	
allCategories() {

axios.get('/all/categories').then(response=>{
		console.log(response.data);
		this.categories = []
		response.data.forEach((category)=> {
			
		this.categories.push(category)
			
		})
		
		
});



},
		
sendCategory() {
if (this.ncategory.length==0) {	
	return
}

axios.get('/save/category/' + this.ncategory).then(response=>{
		
		this.categories = []
		response.data.forEach((category)=> {
			
		this.categories.push(category)
			
		})
		
		this.ncategory= ' '
		
		
});


},



submitProduct() {
	
	if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return
	
	
}

let data = JSON.stringify({
        name: this.productName,
        image: this.productImage[0].URL,
		category: this.ocategory
    })
				
				this.show_post_spinner=true
				
				axios.post('/submit/product', data, {
					headers: {
						'Content-Type': 'application/json'
						
						}
						
					})
				.then( (response) => { 
					
					
					this.productImage = []
					this.productName = ''
					this.show_post_spinner=false
					
					
				 
				})
			},
			
			
			
		
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
},

displayAdminCategory() {
	
var adminCategory = document.getElementById('admin-category')	
adminCategory.classList.remove('hidden')	
	
	
},


hideAdminCategory() {
	
var adminCategory = document.getElementById('admin-category')	
adminCategory.classList.add('hidden')	
	
	
},

showImagePicker() {
		
		this.$refs.image.click();
		
		},
		
		
// Handling Product Image Upload


removeUploaded() {	
	this.productImage= [];				
},
		
imageChange(e) {
		
		let selected=e.target.files[0];
		
		if (!selected) {
		return 0
		}
		
		
		this.uploadDelay.push('File')
		
		
		
		let selectedFile=e.target.files[0];
		
		
		this.attachment=selectedFile;
		this.form.append('img', this.attachment);
		const config = {headers: {'Content-Type': 'multipart/form-data'}};
		
		axios.post('/upload/image', this.form, config).then(response=>{
		//success
		
		
			
			if (response.data.length == 0) {
			this.uploadDelay= [];
			
			return
			
			}
					
					this.productImage = [];
					this.uploadDelay= [];
					this.productImage.push(response.data);
				
				
		
		})
				.catch(response=>{
				//errors
				});
		
},



	
		
		
		
		
	},
	
watch: {
	
productImage() {

if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return this.pdisabled
	
	
}

},

productImage() {

if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return this.pdisabled
	
	
}

},


ncategory() {

if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return this.pdisabled
	
	
}

},


ocategory() {

if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return this.pdisabled
	
	
}
},

productName() {

if ((this.productImage.length>0) && (this.ocategory>0 && this.ncategory.length==0) && (this.productName.length>0)) {
			
		this.pdisabled= false
			
		} else {
	
	this.pdisabled= true
	return this.pdisabled
	
	
}


}	
	
	
}
});
