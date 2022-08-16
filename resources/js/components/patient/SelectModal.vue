<template>
<div class="modal modal-fields modal-themes" :class="{ 'active': showModal}">
    <div class="modal_container">
        <div class="close" v-on:click="save(true)">×</div>
        <h3>{{title}}</h3>
        <div v-if="type == 'date'">
            <date-pick v-model="selDate" :format="dateFormat" :weekdays="weekdays" :months="months" :inputAttributes="inputAttributes"></date-pick>
        </div>
        <div class="items" :class="{'items-full' :!isSmall,'items-small':isSmall}" v-if="type == 'select'">
            <div class="item " :class="{ 'active': selItem.id == item.id}" v-for="item in items" v-on:click="itemClicked(item)">{{item.name}}</div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ["title", "type", "items", "showModal", "isSmall","value"],
    data() {
        return {
            selItem: {
                id: 0
            },
            selDate: '',
            toggleModal: this.showModal,
            weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
            dateFormat: 'DD.MM.YY',
            inputAttributes: {
                placeholder: "дд.мм.рр",
                readonly: "readonly"
            }
        }
    },
    methods: {
        itemClicked(item) {
            this.selItem = item;
            this.save();
        },
        dateChanged() {
            console.log(this.selDate, 'chaned')
        },
        save(force = false) {
            if (this.isEmpty() && !force)
                return;
            // this.$emit('update:showModal', false)
            this.$emit('itemsSelected', (this.type == 'date') ? this.selDate : this.selItem);
            this.clear();
        },
        isEmpty() {
            return (this.type == 'date') ? this.selDate == '' : this.selItem.id == 0;
        },
        clear() {
            if (this.type == 'date') {
                this.selDate == ''
            } else {
                this.selItem = {
                    id: 0
                }
            };

        }
    },
    watch: {
        selDate: function (val) {
            this.save(true);
            // this.selDate = '';
            // this.fullName = val + ' ' + this.lastName
        },
        showModal:function(val){
            if(val){
                if(this.value != ''){
                    if (this.type == 'date') {
                        this.selDate = this.value;
                    }else{
                        this.selItem = {
                            id: this.value
                        };
                    }

                }
                
            }
        }
    }
}
</script>
