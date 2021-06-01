<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление контакта</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название контакта" />
			<input class = "text-input" type ="text" v-model = "firstName" placeholder="Имя" />
			<input class = "text-input" type ="text" v-model = "lastName" placeholder="Фамилия" />
		</div>
	</div>
</template>

<script>

export default {
	name: 'contact-add',
	data(){
		return {
			name: '',
			firstName: '',
			lastName: ''
		}
	},
	methods: {
		getData(){
			return {
				id: null,
				name: this.name,
				first_name: this.firstName,
				last_name: this.lastName
			}
		}
	}
}
</script>

<style lang = "scss">
</style>