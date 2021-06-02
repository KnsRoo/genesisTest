export default {
	setLead(state, id){
		let data = state.data.lead
		data.id = id
		state.leads.push(data)
		state.data.lead = {
			id: undefined,
			name: '',
			price: '',
		}
	},
	setContact(state, id){
		let data = state.data.contact
		data.id = id
		state.contacts.push(data)
		state.data.contact = {
			id: undefined,
			name: '',
			first_name: '',
			last_name: ''
		}
	},
	setCompany(state, id){
		let data = state.data.company
		data.id = id
		state.companies.push(data)
		state.data.company = {
			id: undefined,
			name: '',
		}
	},
	setActiveModel(state, model){
		state.select.activeModel = model
	},
	setProp(state, {model, prop, value}){
		state.data[model][prop] = value
	},
	toggleLoad(state){
		state.loading = !state.loading
	}
}