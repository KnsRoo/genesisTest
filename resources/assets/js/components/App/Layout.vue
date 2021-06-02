<template>
    <div class="wrapper">
        <div class = "title">AmoCRM TEST</div>
        <custom-select v-model = "active" :options = "options"></custom-select>
        <lead v-if = "active == 'Сделка'"></lead>
        <contact v-else-if = "active == 'Контакт'"></contact>
        <company v-else-if = "active == 'Компания'"></company>
        <custom-button @onclick = "add" :loading = "loading" caption = "Создать" :disabled = "!active"></custom-button>
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
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
    components: {
        'custom-select': Select,
        'custom-button': Button,
        'custom-table': Table,
        'lead': Lead,
        'contact': Contact,
        'company': Company
    },
    computed: {
        ...mapGetters(['activeModel', 'options', 'loading', 'tableData', 'tableHeader', 'tableCaption']),
        active: {
            set(model){
                this.setActiveModel(model)
            },
            get(){
                return this.activeModel
            }
        }
    },
    methods: {
        ...mapMutations(['setActiveModel']),
        ...mapActions(['add'])
    }
}
</script>
