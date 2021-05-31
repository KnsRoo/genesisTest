import Vue from 'vue';
import App from './Layout.vue'
import store from '../store'

export default function (selector){
	const el = document.querySelector(selector);
	new Vue({
		el,
		store,
		render: h => h(App),
	});
}