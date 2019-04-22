import Vue from 'vue';
import "core-js/fn/object/assign";

let data = {
	title: "Nothing!",
	site_url: ""
};
data.data = [];

if(window.vuebnb_listing_model){
	let model = JSON.parse(window.vuebnb_listing_model);
	// console.log(model);
	retrieveData(model);
}

var app = new Vue({
	el: '#app',
	data: data,
	methods: {
		escapeKeyListener(evt) {
			if (evt.keyCode === 27 && app.modalOpen)
				app.modalOpen = false;
		}
	},
	watch:{
		modalOpen: function() {
			var className = 'modal-open';
			if(this.modalOpen){
				document.body.classList.add(className);
			}else{
				document.body.classList.remove(className);
			}
		},
		site_url: function (url){
			location = url;
		}
	},

	created: function(){
		document.addEventListener('keyup', this.escapeKeyListener)
	},
	destroyed: function () {
		document.removeEventListener('keyup', this.escapeKeyListener);
	}
});


function resolveImageURL(container, url){
	return container + url;
}

function retrieveData(model){
	if(!model[0]){
		data.data = Object.assign(model,{
			'title': model.title,
			'address': model.address,
			'about' : model.about,
			'headerImageLink':model.images[0].url,
			'headerImageStyle':{
				'background-image' : "url("+model.images[0].url+")"
			},
			"images": model.images,
			"amenities": model.amenities,
			"prices": model.prices,
			"contracted": true,
			"url": model.url,
			"modalOpen": false
		});
	}else{
		for(let n in model){
			data.data.push(
			{
				'title': model[n].title,
				'address': model[n].address,
				'about' : model[n].about,
				'headerImageLink':model[n].images[0].url,
				'headerImageStyle':{
					'background-image' : "url("+model[n].images[0].url+")"
				},
				"amenities": model[n].amenities,
				"prices": model[n].prices,
				"images": model[n].images,
				"contracted": true,
				"modalOpen": false ,
				"url": model[n].url
			});
		}
	}
}
