import axios from 'axios'

export default {
	async add({getters, dispatch, commit}){
		commit('toggleLoad')
		switch (getters.activeModel){
            case 'Сделка': {
                await dispatch('addLead')
            }; break;
            case 'Контакт': {
               await dispatch('addContact') 
            }; break;
            case 'Компания': {
               await dispatch('addCompany')         
            }; break;
        }
        commit('toggleLoad')
	},
	/*
	* Эти экшены можно обьединить в один, но так вроде более читаемо
	*/
	async addLead({getters, commit}){
		const response = await axios.post('/api/leads/add', getters.lead)
		if (response.status == 200){
			let id = response.data.id
			commit('setLead',id)
		}
		
	},
	async addContact({getters, commit}){
		const response = await axios.post('/api/contacts/add', getters.contact)
		if (response.status == 200){
			let id = response.data.id
			commit('setContact', id)
		}
	},
	async addCompany({getters, commit}){
		const response = await axios.post('/api/companies/add', getters.company)
		if (response.status == 200){
			let id = response.data.id
			commit('setCompany', id)
		}
	}
}