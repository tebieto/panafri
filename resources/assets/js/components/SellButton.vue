<template>
<span>
<button v-if="!hide && this.cid != 3 && this.type !== 'remove' " @click="iSellProduct()">I Sell {{this.pname}} Nearby</button>
<button v-if="!hide && this.cid == 3 && this.type !== 'remove' " @click="iSellProduct()">I render this service</button>
<p v-if="hide && type != 'remove'"> Already in your store</p>
<button v-if="this.type=='remove'" @click="removeProduct()">Remove {{this.pid}}</button>
</span>

</template>



<script>

export default {

props: ['pid', 'pname', 'cid', 'type'],

mounted(){

this.authStore()
this.checkStore()

},
data() {

	return {
	
	hide: false,
	similar: [],
	store:[],
	
	
	
	}




},

methods: {



checkStore() {

axios.get('/check/store/' + this.pid)
				.then( (response) => {
				
				if (response.data == 1) {
				
				this.hide= true;
				
				} else {
				
				this.hide = false;
				
				}
				
				})


},




authStore() {
	
	axios.get('/auth/store')
				.then( (response) => {
	this.store= []
	
	response.data.forEach((item) => {
	
    this.store.push(item)
	
	})

				})
	
	
},

iSellProduct() {

this.hide=true
axios.get('/sell/products/' + this.cid + '/' + this.pid)
				.then( (response) => {


this.similar = []



response.data.forEach((similar) => {
	
	this.similar.push(similar)
	
});


this.authStore()



				})				
	
	
},




}



}


</script>