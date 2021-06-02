export default {

	// Если сейчас идёт fetch на сервер

	loading: false,

	// Сюда положу всё, что относится к выбору сущности

	select: {
		activeModel: undefined,
		options: ['Сделка', 'Контакт', 'Компания']
	},

	// Здесь будут созданные данные

	leads: [],
	contacts: [],
	companies: [],

	// Сюда положу всё, что относится к полям компонентов добавления сущностей
	data: {
		// сделка
		lead: {
			id: undefined,
			name: '',
			price: ''
		},
		// контакт
		contact: {
			id: undefined,
			name: '',
			first_name: '',
			last_name: ''
		},
		// компания
		company: {
			id: undefined,
			name: '',
		}
	}
}