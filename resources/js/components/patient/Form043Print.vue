<template>
    <!--шаблон печати в таблице на кнопку печати-->
<div class="makets" name="print_1">
    <div class="maket maket-1 " :class="{'active': selMaketIndex == 1}" style="background-image: url('/platform/img/svg/maket-1.svg')">
        <div class="openTheme openTheme-field_5" v-on:click="openModal('field5')">i</div>
        <div class="openTheme openTheme-field_7" v-on:click="openModal('field6')">i</div>
        <div class="field   number"><input v-model="form.card_number" :class="{ 'is-invalid': form.errors.has('card_number') }"></div>
        <div class="field   name">
            <contenteditable tag="div" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" :noNL="true" />
            <!-- <div contenteditable="true" v-model="form.name"></div> -->
        </div>
        <div class="field   year">
            <div contenteditable="true"></div>
        </div>
        <div class="field   docYear">
            <date-pick v-model="form.doc_year" :class="{ 'is-invalid': form.errors.has('doc_year') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
        </div>
        <div class="field   month">
            <div contenteditable="true"></div>
        </div>
        <div class="field   day">
            <date-pick v-model="form.birthdate" :class="{ 'is-invalid': form.errors.has('birthdate') }" :displayFormat="dateFormatNoDot" :weekdays="weekdays" :months="months"></date-pick>
        </div>
        <div class="field   address">
            <contenteditable tag="div" v-model="form.address" :noNL="true" :class="{ 'is-invalid': form.errors.has('address') }" />
        </div>
        <div class="field   phone">
            <contenteditable tag="div" v-model="form.phone" :noNL="true" :class="{ 'is-invalid': form.errors.has('phone') }" />
        </div>
        <div class="field   field_0">
            <contenteditable tag="div" v-model="form.clinic_name" :noNL="true" :class="{ 'is-invalid': form.errors.has('clinic_name') }" />
        </div>
        <div class="field   field_1">
            <contenteditable tag="div" v-model="form.clinic_address" :noNL="true" :class="{ 'is-invalid': form.errors.has('clinic_address') }" />
        </div>
        <div class="field   field_2"><input v-model="form.clinic_kod_edropu" :class="{ 'is-invalid': form.errors.has('clinic_kod_edropu') }"></div>
        <div class="field   field_3"><input disabled="" value=""></div>
        <div class="field   field_4"><input disabled="" value=""></div>
        <div class="field   field_5">
            <contenteditable tag="div" v-model="form.field5" :noNL="false" />
        </div>
        <div class="field   field_7">
            <contenteditable tag="div" v-model="form.field6" :noNL="false" />
        </div>
        <div class="field   field_8">
            <contenteditable tag="div" v-model="form.field7" :noNL="true" />
        </div>
        <div class="field   field_9">
            <contenteditable tag="div" v-model="form.field8" :noNL="true" />
        </div>
        <div class="field   sex">
            <contenteditable tag="div" v-model="form.gender" :noNL="true" v-on:click="openModal('gender')" :class="{ 'is-invalid': form.errors.has('gender') }" />
        </div>
        <div class="field tr  tr_1" :class="{'leftAlign' : form.field71 == 'Y', 'rightAlign': form.field71 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field71')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr  tr_2" :class="{'leftAlign' : form.field72 == 'Y', 'rightAlign': form.field72 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field72')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr tr_3" :class="{'leftAlign' : form.field73 == 'Y', 'rightAlign': form.field73 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field73')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr tr_4" :class="{'leftAlign' : form.field74 == 'Y', 'rightAlign': form.field74 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field74')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr tr_5" :class="{'leftAlign' : form.field75 == 'Y', 'rightAlign': form.field75 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field75')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr tr_6" :class="{'leftAlign' : form.field76 == 'Y', 'rightAlign': form.field76 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field76')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr  tr_7" :class="{'leftAlign' : form.field77 == 'Y', 'rightAlign': form.field77 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field77')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr  tr_8" :class="{'leftAlign' : form.field78 == 'Y', 'rightAlign': form.field78 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field78')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr  tr_9" :class="{'leftAlign' : form.field79 == 'Y', 'rightAlign': form.field79 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field79')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr  tr_10" :class="{'leftAlign' : form.field80 == 'Y', 'rightAlign': form.field80 != 'Y'}">
            <div class="tr_action_left" v-on:click="addMark($event)"></div>
            <div contenteditable="true">{{getMarkContent('field80')}}</div>
            <div class="tr_action_right" v-on:click="addMark($event)"></div>
        </div>
        <div class="field tr rightAlign tr_11">
            <!--<contenteditable tag="div" v-model="form.field81" v-on:click="openModal('field81')" :noNL="true" />-->
            <date-pick v-model="form.field81" :class="{ 'is-invalid': form.errors.has('field81') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>

        </div>
        <div class="field tr rightAlign tr_12">
            <!--<contenteditable tag="div" v-model="form.field82" v-on:click="openModal('field82')" :noNL="true" />-->
            <date-pick v-model="form.field82" :class="{ 'is-invalid': form.errors.has('field82') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>

        </div>
    </div>
    <div class="maket maket-2 " :class="{'active': selMaketIndex == 2}" style="background-image: url('/platform/img/svg/maket-2.svg')">
        <div class="field field-p2-main">
            <contenteditable tag="div" v-model="form.field9" :noNL="false" />
            <div contenteditable="true"></div>
        </div>
        <div class="fields_container">
            <div class="ctable " :class="[' ctable-'+m]" v-for="m in 8">
                <div class="ctable_title">
                    <div class="field " :class="[' p2_line'+m]" v-on:click="openModal('field9time',{row:m})">
                        <input disabled="" value="" v-model="form.field9time[''+m]">
                    </div>
                </div>
                <div class="ctable_fields">
                    <div class="field " :class="['field-'+(f-1)]" v-for="f in 16" v-on:click="openModal('field9table',{row:m,col:f})">
                        <input disabled="" value="" v-model="form.field9table[m + '_' + f]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="maket maket-3 " :class="{'active': selMaketIndex == 3}" style="background-image: url('/platform/img/svg/maket-3.svg')">
        <div class="field field_1" v-on:click="openModal('field10')"><input disabled="" v-model="form.field10"></div>
        <div class="field field_2">
            <contenteditable tag="div" v-model="form.field11" :noNL="false" />
        </div>
        <div class="field field_3">
            <contenteditable tag="div" v-model="form.field12" :noNL="false" />
        </div>
        <div class="field field_4" v-on:click="openModal('field13')"><input disabled="" v-model="form.field13"></div>
        <div class="field field_5_date" v-on:click="openModal('field14')"><input disabled="" v-model="form.field14"></div>
        <div class="field field_6_date" v-on:click="openModal('field15')"><input disabled="" v-model="form.field15"></div>
        <div class="field field_7">
            <contenteditable tag="div" v-model="form.field15text" :noNL="false" />
        </div>
    </div>
    <div class="maket maket-4 " v-for="(page,index) in doctorsPageNumsList" :class="{'active': selMaketIndex == (4 + index)}" style="background-image: url('/platform/img/svg/maket-4.svg')">
        <div class="themeList" v-if="selOptions['shhodennik_likarya'] && selOptions['shhodennik_likarya'].length > 0">
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field16',{page:page})">i</div>
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field16',{page:page,isAdd:true})">i</div>
        </div>
        <div class="lines">
            <div class="line line-1">
                <div class="field field-date">
                    <input v-on:click="openModal('field16dates',{row:lineNum,page:page})" v-model="form.field16dates[page + '_' + lineNum]" v-for="lineNum in 22">
                </div>
                <div class="field field-value">
                    <contenteditable tag="div" v-model="form.field16[page]" :noNL="false" />
                </div>
            </div>

            <div class="line line-23">
                <div class="field field-date"><input disabled="" value=""></div>
                <div class="field field-value" v-if="form.doctors[page] !=undefined">
                    <div contenteditable="true">{{form.doctors[page].fullname}}</div>
                </div>
                <img style="width: 40px;" :src="'/uploads/'+form.doctors[page].avatar" v-if="form.doctors[page] !=undefined && form.doctors[page].avatar && form.doctors[page].avatar != '' ">
            </div>
        </div>
        <div class="addPage" v-on:click="addDoctorWrite()">+</div>
    </div>
    <div class="maket maket-4 maket-5 " :class="{'active': selMaketIndex == ( 4 + doctorsPageNumsList.length )}" style="background-image: url('/platform/img/svg/maket-5.svg')">
        <div class="themeList themeList-5" v-if="selOptions['epikriz'] && selOptions['epikriz'].length > 0">
            <div class="openTheme openTheme-undefined" v-for="lineNum in 22" v-on:click="openModal('field17',{row:lineNum})">i</div>
        </div>
        <div class="lines">
            <div class="line" :class="['line-'+lineNum]" v-for="lineNum in 22">
                <div class="field field-date" v-on:click="openModal('field17dates',{row:lineNum})">
                    <input disabled="" v-model="form.field17dates[''+lineNum]">
                </div>
                <div class="field field-value">
                    <contenteditable tag="div" v-model="form.field17[''+lineNum]" :noNL="false" />
                </div>
            </div>
        </div>
    </div>
    <div class="maket maket-4 maket-6 " :class="{'active': selMaketIndex == ( 5 + doctorsPageNumsList.length )}" style="background-image: url('/platform/img/svg/maket-6.svg')">
        <div class="themeList themeList-6 themeList-left">
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field18')">i</div>
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field18',{isAdd:true})">i</div>
        </div>
        <div class="themeList themeList-6 themeList-right">
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field19')">i</div>
            <div class="openTheme openTheme-undefined" v-on:click="openModal('field19',{isAdd:true})">i</div>
        </div>
        <div class="lines">
            <div class="line line-1" style="height:492px">
                <div class="field field-date">
                    <contenteditable tag="div" v-model="form.field18" :noNL="false" />
                </div>
                <div class="field field-value">
                    <contenteditable tag="div" v-model="form.field19" :noNL="false" />
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            // Create a new form instance
            selFieldkey: '',
            selMaketIndex: 1,
            maxNum: 6,
            doctorsPageNumsList: [1],
            // doctorPagesCount: 1,
            form: new Form({
                id: '',
                clinic_address: '',
                clinic_name: '',
                clinic_kod_edropu: '',
                card_number: '',
                doc_year: '',
                name: '',
                birthdate: '',
                gender: '',
                address: '',
                phone: '',
                field5: '',
                field6: '',
                field7: '',
                field71: '',
                field72: '',
                field73: '',
                field74: '',
                field75: '',
                field76: '',
                field77: '',
                field78: '',
                field79: '',
                field80: '',
                field81: '',
                field82: '',
                field8: '',
                field9: '',
                field9time: {},
                field9table: {},
                field10: '',
                field11: '',
                field12: '',
                field13: '',
                field14: '',
                field15: '',
                field15text: '',
                field16: {},
                field16dates: {},
                field17: {},
                field17dates: {},
                field18: '',
                field19: '',
                doctors: {},
            }),
            modaloptions: {},
            isSmallItems: false,
            isNew: false,
            selOptions: [],
            clinic: {},
            dateFormat : 'DD.MM.YY',
          dateFormatNoDot: 'DDMMYY',

          weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        }
    },
    created() {
        // for (let index = 1; index <= this.doctorPagesCount; index++) {
        //     this.form.field16['' + index] = [];
        //     this.form.field16dates['' + index] = [];
        // }
    },
    mounted() {
        this.getPatient();
    },
    methods: {
        getPatient() {
            this.doctorsPageNumsList = [1];
            this.maxNum = 6;
            if (this.$route.params.id == undefined)
                return;

            let loader = this.$loading.show();
            this.form.get('/patient/getForm04/' + this.$route.params.id).then(({
                    data
                }) => {
                    this.form.fill(data.data);
                    this.doctorsPageNumsList = data.data.pages && data.data.pages.length > 0 ? data.data.pages : [1];
                    this.maxNum = 3 + (this.doctorsPageNumsList.length == 0 ? 1 : this.doctorsPageNumsList.length) + 2;
                    this.clearUndifined();
                })
                .catch(error => console.log(error))
                .then(() => {
                    loader.hide()
                })
        },
        getMarkContent: function (key) {
            return this.form[key] == '' ? '' : (this.form[key] == 'Y' ? 'так' : 'ні');
        },
        getDefaultDoctor() {
            return (this.$route.params.id != undefined && !this.$gate.isDoctor()) ? {
                id: 0,
                fullname: '',
                avatar: ''
            } : {
                id: 0,
                fullname: this.$gate.getFullName(),
                avatar: this.$gate.getUser().avatar
            };

        },
        clearUndifined() {
            for (let index = 0; index < this.doctorsPageNumsList.length; index++) {
                if (this.form.field16['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.field16['' + this.doctorsPageNumsList[index]] = '';
                if (this.form.doctors['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.doctors['' + this.doctorsPageNumsList[index]] = this.getDefaultDoctor();
            }
            for (let rowIndex = 1; rowIndex <= 22; rowIndex++) {
                if (this.form.field17['' + rowIndex] == undefined)
                    this.form.field17['' + rowIndex] = '';
            }
        },
    },
    computed: {
        // a computed getter
    },
}
</script>
