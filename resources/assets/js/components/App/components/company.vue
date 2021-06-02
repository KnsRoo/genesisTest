<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление компании</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название компании" />
		</div>
	</div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'

export default {
	name: 'company-add',
	computed: {
		...mapGetters(['company']),
		name: {
			set(value){
				this.setProp({model: 'company', prop: 'name', value})
			},
			get(){
				return this.company.name
			}
		}
	},
	methods: {
		...mapMutations(['setProp'])
	}
}
</script>