<template>
    <div class="wrapper">
        <div class = "title">AmoCRM TEST</div>
        <custom-select @change = "setActive" :options = "['Сделка', 'Контакт', 'Компания']"></custom-select>
        <lead ref = "leads" v-if = "active == 'Сделка'"></lead>
        <contact ref = "contacts" v-else-if = "active == 'Контакт'"></contact>
        <company ref = "companies" v-else-if = "active == 'Компания'"></company>
        <custom-button @onclick = "add" caption = "Сохранить" :disabled = "!active"></custom-button>
        <custom-table :table = "tableData" :header = "tableHeader" :caption = "tableCaption"></custom-table>
    </div>
</template>

<script>
import Select from './components/select.vue'
import Button from './components/button.vue'
import Lead from './components/lead.vue'
import Contact from './components/contact.vue'
import Company from './components/company.vue'
import Table from './components/table.vue'
import { mapActions, mapGetters } from 'vuex'

export default {
    data(){
        return {
            active: undefined
        }
    },
    components: {
        'custom-select': Select,
        'custom-button': Button,
        'custom-table': Table,
        'lead': Lead,
        'contact': Contact,
        'company': Company
    },
    computed: {
        ...mapGetters(['leads','contacts','companies']),
        tableData(){
            switch (this.active){
                case 'Сделка': return this.leads; break;
                case 'Контакт': return this.contacts; break;
                case 'Компания': return this.companies; break;
                default: return [];
            }    
        },
        tableHeader(){
            switch (this.active){
                case 'Сделка': return ["Название сделки", "Бюджет сделки"]; break;
                case 'Контакт': return ["Название контакта", "Имя", "Фамилия"]; break;
                case 'Компания': return ["Название компании"]; break;
                default: return [];
            }       
        },
        tableCaption(){
            switch (this.active){
                case 'Сделка': return "Таблица сделок"; break;
                case 'Контакт': return "Таблица контактов"; break;
                case 'Компания': return "Таблица компаний"; break;
                default: return "";
            }       
        }
    },
    methods: {
        ...mapActions(['addLead', 'addContact', 'addCompany']),
        setActive(key){
            this.active = key
        },
        add(){
            switch (this.active){
                case 'Сделка': {
                    let data = this.$refs.leads.getData()
                    this.addLead(data)
                }; break;
                case 'Контакт': {
                    let data = this.$refs.contacts.getData()
                    this.addContact(data)
                }; break;
                case 'Компания': {
                    let data = this.$refs.companies.getData()
                    this.addCompany(data)
                }; break;
            }
        }
    }
}
</script>
