<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление контакта</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название контакта" />
			<input class = "text-input" type ="text" v-model = "first_name" placeholder="Имя" />
			<input class = "text-input" type ="text" v-model = "last_name" placeholder="Фамилия" />
		</div>
	</div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'

export default {
	name: 'contact-add',
	computed: {
		...mapGetters(['contact']),
		name: {
			set(value){
				this.setProp({ model: 'contact', prop: 'name', value})
			},
			get(){
				return this.contact.name
			}
		},
		first_name: {
			set(value){
				this.setProp({ model: 'contact', prop: 'first_name', value})
			},
			get(){
				return this.contact.first_name
			}
		},
		last_name: {
			set(value){
				this.setProp({ model: 'contact', prop: 'last_name', value})
			},
			get(){
				return this.contact.last_name
			}
		}
	},
	methods: {
		...mapMutations(['setProp'])
	}
}
</script>

<style lang = "scss">
</style>