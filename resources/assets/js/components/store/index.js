import Vue from "vue";
import Vuex from "vuex";
import axios from 'axios'

/*
 |--------------------------------------------------------------------------
 | Vuex хранилище
 |--------------------------------------------------------------------------
 |
 | Поскольку хранилище небольшое, нет смысла разбивать его на отдельные файлы
 | (actions,mutations,...).
 | т.к. хранилище единственное, нет смысла делать его именованым.
 |
 */

Vue.use(Vuex)

const store = new Vuex.Store({
	state: {
		leads: [],
		contacts: [],
		companies: [],
	},
	actions: {
		/*
		* Эти экшены можно обьединить в один, но так вроде более читаемо
		*/
		async addLead({commit}, data){
			const response = await axios.post('/api/leads/add', data)
			if (response.status == 200){
				data.id = response.data.id
			}
			commit('setLead',data)
		},
		async addContact({commit}, data){
			const response = await axios.post('/api/contacts/add', data)
			if (response.status == 200){
				data.id = response.data.id
			}
			commit('setContact', data)
		},
		async addCompany({commit}, data){
			const response = await axios.post('/api/companies/add', data)
			if (response.status == 200){
				data.id = response.data.id
			}
			commit('setCompany', data)
		}
	},
	mutations: {
		setLead(state, data){
			state.leads.push(data)
		},
		setContact(state, data){
			state.contacts.push(data)
		},
		setCompany(state, data){
			state.companies.push(data)
		}
	},
	getters: {
		leads: s => s.leads,
		contacts: s => s.contacts,
		companies: s => s.companies
		
	}
})

 export default store;