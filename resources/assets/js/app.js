
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
Vue.component('sell-button', require('./components/SellButton.vue'));

var algoliasearch = require('algoliasearch');
var client = algoliasearch('VEOFPEJRLG', '6e163e296a3af0e603000750a01a4743');
var index = client.initIndex('products');

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
				products: [],
				sellerEmail: '',
				sellerImage: [],
				adminEmail: '',
				sdisabled:true,
				store: [],
				similar: [],
				query:'',
				results: [],
				
				
			
		}
		
		
		
	},
	
mounted() {
	
	

	
this.authStore()	
this.allCategories()
this.allProducts()
	
},
	
methods: {

showError(error) {
	
	var x = document.getElementById("demo");

    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
},
	
	
showPosition(position) {
	var lat = position.coords.latitude;
	var lng = position.coords.longitude
	var latlon = position.coords.latitude + "," + position.coords.longitude;
    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&key=AIzaSyAh3prpUKLUAW3z5ylYBjUgORLidrBdRMU";
    document.getElementById("map").innerHTML = "<img src='"+img_url+"'>";
},
	
getLocation() {
	var x = document.getElementById("demo");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(this.showPosition, this.showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
	
},



	
searchProducts() {
	if (!this.query.length) {
	return	
		
	}
	index.search(this.query, (err, content) => {
	
	this.results =content.hits
	
});
	
	
},


removeProduct(pid) {

axios.get('/remove/product/' + pid ).then(response=>{
		
		this.authStore();
		
		
		
});

},	
	
allProducts() {

axios.get('/all/products').then(response=>{
		
		this.products=[]
		response.data.forEach((product)=> {
			
		this.products.push(product)
			
		})
		
		
});

},


guestProducts() {

axios.get('guest/all/products').then(response=>{
		
		this.products=[]
		response.data.forEach((product)=> {
			
		this.products.push(product)
			
		})
		
		
});

},

	
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
					
					this.allProducts();
					
					
				 
				})
			},
			
			
submitSeller() {
	
	if ((this.sellerEmail.length>0) && (this.sellerImage.length>0) && (this.adminEmail.length>0)) {
			
		this.sdisabled= false
			
		} else {
	
	this.sdisabled= true
	return
	
	
}

let data = JSON.stringify({
        email: this.sellerEmail,
        image: this.sellerImage[0].URL,
		admin: this.adminEmail
    })
				
				this.show_post_spinner=true
				
				axios.post('/submit/seller', data, {
					headers: {
						'Content-Type': 'application/json'
						
						}
						
					})
				.then( (response) => { 
					
					console.log(response.data)
					this.sellerImage = []
					this.sellerEmail = ''
					this.adminEmail = ''
					this.show_post_spinner=false
					
					
				 
				})
			},
			
			
//  Handling modal hiding and display methods			
		
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


displayAdminSeller() {
	
var adminSeller = document.getElementById('admin-seller')	
adminSeller.classList.remove('hidden')	
	
	
},


hideAdminSeller() {
	
var adminSeller = document.getElementById('admin-seller')	
adminSeller.classList.add('hidden')	
	
	
},


//Handle Product Sales
authStore() {
	
	axios.get('/auth/store')
				.then( (response) => {
	this.store= []
	
	response.data.forEach((item) => {
	
    this.store.push(item)
	
	})

				})
	
	
},


		
		
// Handling Product Image Upload


showImagePicker() {
		
		this.$refs.image.click();
		
		},
		
showProductImagePicker() {
		
		this.$refs.productimage.click();
		
		},

removeUploaded() {	
	this.productImage= [];				
},
		
imageChange(e) {
	
	console.log ('hi')
		
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



sellerImageChange(e) {
		
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
					
					this.sellerImage = [];
					this.uploadDelay= [];
					this.sellerImage.push(response.data);
				
				
		
		})
				.catch(response=>{
				//errors
				});
		
},



	
		
		
		
		
	},
	
watch: {
	
sellerImage() {

if ((this.sellerImage.length>0) && (this.sellerEmail.length>0 ) && (this.adminEmail.length>0)) {
			
		this.sdisabled= false
			
		} else {
	
	this.sdisabled= true
	return this.sdisabled
	
	
}

},

sellerEmail() {

if ((this.sellerImage.length>0) && (this.sellerEmail.length>0 ) && (this.adminEmail.length>0)) {
			
		this.sdisabled= false
			
		} else {
	
	this.sdisabled= true
	return this.sdisabled
	
	
}

},

adminEmail() {

if ((this.sellerImage.length>0) && (this.sellerEmail.length>0 ) && (this.adminEmail.length>0)) {
			
		this.sdisabled= false
			
		} else {
	
	this.sdisabled= true
	return this.sdisabled
	
	
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
