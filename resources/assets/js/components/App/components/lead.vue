<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление сделки</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название сделки" />
			<input class = "text-input" type ="text" v-model = "price" placeholder="Бюджет сделки" />
		</div>
	</div>
</template>

<script>

export default {
	name: 'lead-add',
	data(){
		return {
			name: '',
			price: ''
		}
	},
	methods: {
		getData(){
			return {
				name: this.name,
				price: this.price
			}
		}
	}
}
</script>