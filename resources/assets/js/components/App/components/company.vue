<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление компании</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название компании" />
		</div>
	</div>
</template>

<script>

export default {
	name: 'company-add',
	data(){
		return {
			name: ''
		}
	},
	methods: {
		getData(){
			return {
				id: null,
				name: this.name,
			}
		}
	}
}
</script>