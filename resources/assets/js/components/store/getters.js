export default {
	leads: s => s.leads,
	contacts: s => s.contacts,
	companies: s => s.companies,
	lead: s => s.data.lead,
	company: s => s.data.company,
	contact: s => s.data.contact,
	activeModel: s => s.select.activeModel,
	options: s => s.select.options,
	loading: s => s.loading,

	// Вспомогательные данные таблиц решил возвразать на лету, нет смысла хранить их как поля
    tableData(state){
        switch (state.select.activeModel){
            case 'Сделка': return state.leads; break;
            case 'Контакт': return state.contacts; break;
            case 'Компания': return state.companies; break;
            default: return [];
        }    
    },
    tableHeader(state){
        switch (state.select.activeModel){
            case 'Сделка': return ["id", "Название сделки", "Бюджет сделки"]; break;
            case 'Контакт': return ["id", "Название контакта", "Имя", "Фамилия"]; break;
            case 'Компания': return ["id", "Название компании"]; break;
            default: return [];
        }       
    },
    tableCaption(state){
        switch (state.select.activeModel){
            case 'Сделка': return "Таблица сделок"; break;
            case 'Контакт': return "Таблица контактов"; break;
            case 'Компания': return "Таблица компаний"; break;
            default: return "";
        }       
    }
}