<template>
	<div class = "form__wrapper">
		<div class = "form__title">Добавление сделки</div>
		<div class = "form__inner">
			<input class = "text-input" type ="text" v-model = "name" placeholder="Название сделки" />
			<input class = "text-input" type ="numeric" v-model = "price" placeholder="Бюджет сделки" />
		</div>
	</div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'

export default {
	name: 'lead-add',
	computed: {
		...mapGetters(['lead']),
		name: {
			set(value){
				this.setProp({ model: 'lead', prop: 'name', value})
			},
			get(){
				return this.lead.name
			}
		},
		price: {
			set(value){
				this.setProp({ model: 'lead', prop: 'price', value: parseInt(value)})
			},
			get(){
				return this.lead.price
			}
		},
	},
	methods: {
		...mapMutations(['setProp'])
	}
}
</script>