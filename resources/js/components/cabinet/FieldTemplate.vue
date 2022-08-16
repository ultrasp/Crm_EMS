<template>
<div class="container container-settings">
    <div class="container_title">Збережені поля</div>

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" v-bind:class="{active: selectedTabId == category.id}" v-on:click="selectTab(category)" v-for="category in categories" :id="'category'+category.id" data-toggle="pill" role="tab">{{category.name}}</a>
            </div>
        </div>

        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade " v-bind:class="{'show active': selectedTabId == category.id}" v-for="category in categories" :id="'category-pill-'+category.id" role="tabpanel">
                    <div class="form form-fields">
                        <div class="sfield">
                            <div class="sfield_title">{{category.name}}</div>
                            <div class="items">
                                <div class="item form-group" v-for="(template,index) in templates">
                                    <input placeholder="Назва шаблону" v-model="template.name" :class="{ 'is-invalid': errors[index+'name']}" class="form-control" @change="onInpChange(index+'name')" :disabled="template.subscriber_id ==0">
                                    <div class="remove" v-if="template.subscriber_id !=0 " v-on:click="removeTemplate(template,index)" v-tooltip="'Видалити поле'">×</div>
                                    <textarea placeholder="Текст" class="form-control" v-model="template.full_description" :class="{ 'is-invalid': errors[index+'full_description']}" @change="onInpChange(index+'full_description')" :disabled="template.subscriber_id ==0"></textarea>
                                </div>
                                <div class="ml-auto add-btn" v-on:click="addTemplate()" v-tooltip="'Додати поле'">+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="buttons">
        <div class="btn-my bg-success"  v-on:click="saveTemplates()">Зберегти</div>
    </div>

</div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
            templates: [],
            selectedTabId: 0,
            removeIds: [],
            errors:{}
        }
    },
    mounted() {
        this.getCategoires();
    },
    methods: {
        getCategoires() {
            return axios.get('/template/categories').then(res => {
                this.categories = res.data.categories;
                if (this.categories.length > 0)
                    this.selectTab(this.categories[0])
            })
        },
        getCategoiresTemplates() {
            this.templates = [];
            return axios.post('/template/list', {
                category_id: this.selectedTabId
            }).then(res => {
                this.templates = res.data.templates;
            })
        },
        selectTab(category) {
            this.selectedTabId = category.id;
            this.getCategoiresTemplates();
        },
        addTemplate() {
            this.templates.push({
                id: 0,
                name: '',
                full_description: '',
                field_category_id: this.selectedTabId
            });
        },
        removeTemplate(template, index) {
            this.templates.splice(index, 1);
            if (template.id > 0)
                this.removeIds.push(template.id);
        },
        onInpChange(key){
            this.$delete(this.errors, key);
        },
        saveTemplates() {
            this.errors = [];
            return axios.post('/template/store', {
                    templates: this.templates,
                    categoryId: this.selectedTabId,
                    removeIds: this.removeIds
                }).then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    });
                    this.getCategoiresTemplates();
                    // this.templates = res.data.templates;
                })
                .catch(error => {
                    let errors = error.response.data.errors;
                    let keys = Object.keys(errors);
                    for (let index = 0; index < keys.length; index++) {
                        let value = errors[keys[index]];
                        let k = keys[index].split(".");
                        this.errors[k[1] +k[2]] = value[0];
                    }
                    this.errors = Object.assign({}, this.errors);
                    console.log(this.errors,'this.errors');
                })

        }
    }
}
</script>
