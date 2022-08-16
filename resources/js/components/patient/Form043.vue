<template>
<div class="workbench">
    <div class="btn-my btn-blue btn-print" v-on:click="print()"><i class="fas fa-print"></i></div>
    <div class="btn-my btn-blue btn-save bg-success" v-on:click="save()"><i class="fas fa-save"></i></div>
    <div class="container container-newPatient">
        <div class="btn-my btn-new btn-blue" v-if="isNew">Додати пацієнта</div>
        <div class="makets" name="print_1">
            <div class="maket maket-1 " :class="{'active': selMaketIndex == 1}" style="background-image: url('/platform/img/svg/maket-1.svg')">
                <div class="openTheme openTheme-field_5  " v-tooltip="'Вибрати діагноз'" v-on:click="openModal('field5')">i</div>
                <div class="openTheme openTheme-field_7" v-tooltip="'Вибрати скаргу'"  v-on:click="openModal('field6')">i</div>
                <div class="openTheme openTheme-field_8" v-tooltip="'Вибрати'"  v-on:click="openModal('field7')">i</div>
                <div class="openTheme openTheme-field_9" v-tooltip="'Вибрати развиток'"  v-on:click="openModal('field8')">i</div>
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
                <div class="field   field_2"><input v-model="form.clinic_kod_edropu" :class="{ 'is-invalid': form.errors.has('clinic_kod_edropu') }" maxlength="8"></div>
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
                <div class="field tr rightAlign tr_11 date-pick-right">
                    <date-pick v-model="form.field81" :class="{ 'is-invalid': form.errors.has('field81') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
                </div>
                <div class="field tr rightAlign tr_12 date-pick-right ">
                    <date-pick v-model="form.field82"   :class=" { 'is-invalid': form.errors.has('field82') } " :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
                </div>
            </div>
            <div class="maket maket-2 " :class="{'active': selMaketIndex == 2}" style="background-image: url('/platform/img/svg/maket-2.svg')">
                <div class="openTheme openTheme-field_10  " v-tooltip="'Дани обективного доследования'" v-on:click="openModal('m2field10')">i</div>
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
                            <div class="field " :class="['field-'+(f-1)]" v-for="f in 16" v-on:click="openModal('field9table',{row:m,col:f,value:form.field9table[m + '_' + f]})">
                                <input disabled="" value="" v-model="form.field9table[m + '_' + f]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="maket maket-3 " :class="{'active': selMaketIndex == 3}" style="background-image: url('/platform/img/svg/maket-3.svg')">
                <div class="openTheme openTheme-field_11  "  v-on:click="openModal('m3field11')">i</div>
                <div class="openTheme openTheme-field_12  "  v-on:click="openModal('m3field12')">i</div>
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
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та замінити'" v-on:click="openModal('field16',{page:page})">i</div>
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та додати в кінець'" v-on:click="openModal('field16',{page:page,isAdd:true})">i</div>
                </div>
                <div class="lines">
                    <div class="line line-1">
                        <div class="field field-date">
                          <template v-for="lineNum in 1">
                            <date-pick v-model="form.field16dates[page + '_' + lineNum]" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
                        </template>
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
                <div class="addPage" v-tooltip="'Додати нову сторінку'" v-on:click="addDoctorWrite()">+</div>
                <div class="deletePage" v-tooltip="'Видалити сторінку'" v-on:click="deleteDoctorWrite(page,index)" v-if="index > 0"><i class="fas fa-trash"></i></div>
            </div>
            <div class="maket maket-4 maket-5 " :class="{'active': selMaketIndex == ( 4 + doctorsPageNumsList.length )}" style="background-image: url('/platform/img/svg/maket-5-1.svg')">
                <div class="themeList themeList-5"  v-if="selOptions['epikriz'] && selOptions['epikriz'].length > 0">
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та замінити'" v-for="lineNum in 22" v-on:click="openModal('field17',{row:lineNum})">i</div>
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
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та замінити'" v-on:click="openModal('field18')">i</div>
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та додати в кінець'" v-on:click="openModal('field18',{isAdd:true})">i</div>
                </div>
                <div class="themeList themeList-6 themeList-right">
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та замінити'" v-on:click="openModal('field19')">i</div>
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та додати в кінець'" v-on:click="openModal('field19',{isAdd:true})">i</div>
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
    </div>
    <div class="list" style="width:140px" v-if="this.$gate.isDoctorOrOwner()">
        <hooper :vertical="true" style="height: 700px" :itemsToShow="5">
            <slide v-for="n in maxNum" :key="n">
                <div class="item " v-on:click="changeMaket(n)"  :class="{active: selMaketIndex == n}"  v-bind:style="{backgroundImage: 'url(/platform/img/svg/maket-'+ ( n > 3 && n < maxNum -2 ? 4 : ( n < 4 ?  n : n - doctorsPageNumsList.length + 1 )) +'.svg)'}">
                </div>
            </slide>
        </hooper>
    </div>
    <div class="pagination" v-if="this.$gate.isDoctorOrOwner()">
        <div class="page" v-on:click="changeMaket(n)" v-for="n in maxNum" :class="{'active': selMaketIndex == n,'journal': selMaketIndex == n && n >= 4 && n <  4 + doctorsPageNumsList.length}">{{n}}</div>
    </div>
    <select-modal :title="modalTitle" :type="modaltype" :items="modalItems" :showModal="showModal" :value="selectValue" :isSmall="isSmallItems" v-on:itemsSelected="modalSelected($event)" ></select-modal>
</div>
</template>

<script>
export default {
    data() {
        return {
            // Create a new form instance
            modalTitle: '',
            modalItems: [],
            showModal: false,
            selFieldkey: '',
            modaltype: 'select',
            selectValue:'',
            selMaketIndex: 1,
            maxNum: 6,
            // doctorPagesCount: 1,
            doctorsPageNumsList: [1],
            dentaltypes: [{
                    id: 'C',
                    name: 'C'
                },
                {
                    id: 'P',
                    name: 'P'
                },
                {
                    id: 'Pt',
                    name: 'Pt'
                },
                {
                    id: 'Lp',
                    name: 'Lp'
                },
                {
                    id: 'Gp',
                    name: 'Gp'
                },
                {
                    id: 'R',
                    name: 'R'
                },
                {
                    id: 'A',
                    name: 'A'
                },
                {
                    id: 'Cd',
                    name: 'Cd'
                },
                {
                    id: 'PI',
                    name: 'PI'
                },
                {
                    id: 'F',
                    name: 'F'
                },
                {
                    id: 'ar',
                    name: 'ar'
                },
                {
                    id: 'r',
                    name: 'r'
                },
                {
                    id: 'H',
                    name: 'H'
                },
                {
                    id: 'Am',
                    name: 'Am'
                },
                {
                    id: 'res',
                    name: 'res'
                },
                {
                    id: 'pin',
                    name: 'pin'
                },
                {
                    id: 'i',
                    name: 'i'
                },
                {
                    id: 'Rp',
                    name: 'Rp'
                },
                {
                    id: 'Dc',
                    name: 'Dc'
                },
            ],
            form10Types: [{
                    id: 1,
                    name: 'ортогнатичний'
                },
                {
                    id: 2,
                    name: 'прямий'
                },
                {
                    id: 3,
                    name: 'фізіологічна опістогнатія'
                },
                {
                    id: 4,
                    name: 'фізіологічна біпрогнатія'
                },
                {
                    id: 5,
                    name: 'прогнатія'
                },
                {
                    id: 6,
                    name: 'прогенія'
                },
                {
                    id: 7,
                    name: 'глибокий'
                },
                {
                    id: 8,
                    name: 'відкритий'
                },
                {
                    id: 9,
                    name: 'перехресний'
                },
            ],
            form13Types: [{
                    id: 1,
                    name: 'A1'
                },
                {
                    id: 2,
                    name: 'A2'
                },
                {
                    id: 3,
                    name: 'A3'
                },
                {
                    id: 4,
                    name: 'A3,5'
                },
                {
                    id: 5,
                    name: 'A4'
                },
                {
                    id: 6,
                    name: 'B1'
                },
                {
                    id: 7,
                    name: 'B2'
                },
                {
                    id: 8,
                    name: 'B3'
                },
                {
                    id: 9,
                    name: 'B4'
                },
                {
                    id: 10,
                    name: 'C1'
                },
                {
                    id: 11,
                    name: 'C2'
                },
                {
                    id: 12,
                    name: 'C3'
                },
                {
                    id: 13,
                    name: 'C4'
                },
                {
                    id: 14,
                    name: 'D2'
                },
                {
                    id: 15,
                    name: 'D3'
                },
                {
                    id: 16,
                    name: 'D4'
                },
            ],
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
            dateFormat: 'DD.MM.YY',
            dateFormatNoDot: 'DDMMYY',
            weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
            oldvalues:{},
            dataSaved:false,
        }
    },
    created() {
        // for (let index = 1; index <= this.doctorPagesCount; index++) {
        //     this.form.field16['' + index] = [];
        //     this.form.field16dates['' + index] = [];
        // }
    },
    mounted() {
        // this.getClinic();
        // this.getPatient();
        this.getFieldList('shhodennik_likarya', false);
        this.getFieldList('epikriz', false);
        this.getFieldList('plan_obstezennya', false);
        this.getFieldList('plan_likuvannya', false);
    },
    methods: {
        refresh() {
            this.form.reset();
            this.getClinic();
            this.getPatient();
        },
        storeOldValues(){
            this.oldvalues = {};
            let data = this.form.data();
            let keys = this.form.keys();
            for (let index = 0; index < keys.length; index++) {
                let val = data[keys[index]];
                this.oldvalues[keys[index]] = JSON.stringify(val);
            }
        },
        isValid(){
            if(this.form.clinic_address && this.form.clinic_name && this.form.clinic_kod_edropu){
                return true;
            }else{
                Swal.fire(
                    'Помилка!',
                    'Заповніть дані клініки, щоб розпочати роботу з формою',
                    'error'
                );
                return false;
            }

        },
        getClinic() {
            if (this.$route.params.id != undefined)
                return;

            let loader = this.$loading.show();
            this.form.get('/clinic/info').then(({
                    data
                }) => {
                    this.clinic = data.clinic;
                    this.form.card_number = data.card_number;
                    this.fillClinic();
                    this.clearUndifined();
                    this.storeOldValues();
                })
                .catch(error => console.log(error))
                .then(() => {
                    loader.hide()
                })
        },
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
                    this.storeOldValues();
                })
                .catch(error => console.log(error))
                .then(() => {
                    loader.hide()
                })
        },
        getDefaultDoctor() {
            return (this.$route.params.id != undefined && !this.$gate.isDoctor()) ? {
                id: 0,
                fullname: '',
                avatar: ''
            } : {
                id: 0,
                fullname: this.$gate.getFullName2(),
                avatar: this.$gate.getUser().sign_image
            };

        },
        clearUndifined() {
            for (let index = 0; index < this.doctorsPageNumsList.length; index++) {
                if (this.form.field16['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.field16['' + this.doctorsPageNumsList[index]] = '';
                if (this.form.doctors['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.doctors['' + this.doctorsPageNumsList[index]] = this.getDefaultDoctor();
            }
            if (this.form.field17 == '')
                this.form.field17 = {};
            for (let rowIndex = 1; rowIndex <= 22; rowIndex++) {
                if (this.form.field17['' + rowIndex] == undefined)
                    this.form.field17['' + rowIndex] = '';
            }
        },
        fillClinic() {
            this.form.clinic_address = this.clinic.address;
            this.form.clinic_name = this.clinic.name;
            this.form.clinic_kod_edropu = this.clinic.kod_edropu;
        },
        addMark(event) {
            let parentDiv = $(event.target).parent();
            let classList = parentDiv.attr('class').split(/\s+/);
            let index = parseInt(classList[classList.length - 2].substr(3));

            // var div = parentDiv.find('div[contenteditable]');
            // div.html('&#10003;&nbsp;&nbsp;' + ($(event.target).hasClass('tr_action_left') ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : ''));
            this.form['field' + (70 + index)] = $(event.target).hasClass('tr_action_left') ? 'Y' : 'N';
            // parentDiv.addClass($(event.target).hasClass('tr_action_left') ? 'leftAlign' : 'rightAlign').removeClass(!$(event.target).hasClass('tr_action_left') ? 'leftAlign' : 'rightAlign');
        },
        getMarkContent: function (key) {
            return this.form[key] == '' ? '' : (this.form[key] == 'Y' ? 'так' : 'ні');
        },
        modalSelected(item) {
            this.showModal = false;
            if (this.modaltype == 'date' ? item == '' : item.id == 0)
                return;
            if (this.modaltype == 'select') {
                if (this.selFieldkey == 'field9table') {
                    this.form.field9table = Object.assign({}, this.form.field9table, {
                        [this.modaloptions.row + '_' + this.modaloptions.col]: item.name
                    });
                    // this.form[this.selFieldkey][this.modaloptions.row + '_' + this.modaloptions.col] = item.name;
                    return;
                }
                if (this.selFieldkey == 'field16') {
                    this.form[this.selFieldkey][this.modaloptions.page] = (this.modaloptions.isAdd ? this.form[this.selFieldkey][this.modaloptions.page] : '') + item.name;
                    return;
                }
                if (this.selFieldkey == 'field17') {
                    this.form[this.selFieldkey][this.modaloptions.row] = item.full_description;
                    return;
                }
                if (['field18', 'field19'].includes(this.selFieldkey) && this.modaloptions.isAdd) {
                    this.form[this.selFieldkey] = this.form[this.selFieldkey] + ' ' + item.full_description;
                    return;
                }
                this.form[this.selFieldkey] = this.selFieldkey == 'gender' ? '' + item.id : (item.hasOwnProperty('full_description') ? item.full_description : item.name);
            } else {
                if (this.selFieldkey == 'field16dates') {
                    this.form.field16dates = Object.assign({}, this.form.field16dates, {
                        [this.modaloptions.page + '_' + this.modaloptions.row]: item
                    });
                    return;
                }
                if (['field9time', 'field17dates'].includes(this.selFieldkey)) {
                    this.form[this.selFieldkey]['' + this.modaloptions.row] = item;
                    return;
                }
                this.form[this.selFieldkey] = item;
            }
        },
        getFieldList(catKey, isModal = true) {
            if (catKey == '')
                return;
            return axios.post('/form/templates', {
                slug: catKey
            }).then(res => {
                if (isModal)
                    this.modalItems = res.data.templates;
                else
                    this.selOptions[catKey] = res.data.templates;
            })
        },
        openModal(key, options = {}) {
            this.showModal = true;
            let catKey = '';
            this.selFieldkey = key;
            this.modalItems = [];
            this.modaltype = 'select';
            this.modaloptions = options;
            this.isSmallItems = false;
            this.modalTitle = ' Оберіть варіант';
            if (key == 'gender') {
                this.modalItems = [{
                    id: '1',
                    name: 'Чоловік'
                }, {
                    id: '2',
                    name: 'Жінка'
                }]
            }
            if (key == 'field5') {
                this.modalTitle = 'Діагноз'
                catKey = 'diagnozi';
            }
            if (key == 'field6') {
                this.modalTitle = 'Скарги'
                catKey = 'skargi';

            }
            if (key == 'field7') {
                catKey = '3-pereneseni_ta_suputni_zaxvoryuvannya';
            }
            if (key == 'field8') {
                catKey = '8-rozvitok-tepereshnovo-zaxvoroniya';
            }
            if (key == 'm2field10') {
                catKey = '9-daniy-obyektivnovo-isledovaniya';
                this.selFieldkey = 'field9';
            }
            if (key == 'm3field11') {
                catKey = '11-stan-gigieni-projni-rta';
                this.selFieldkey = 'field11';
            }
            if (key == 'm3field12') {
                catKey = '12-dani-rengentskix-obsledovaniy';
                this.selFieldkey = 'field12';
            }
            if (['field81', 'field82', 'field9time', 'field14', 'field15', 'field16dates', 'field17dates'].includes(key)) {
                this.modaltype = 'date';
            }
            if (key == 'field9table') {
                this.modalItems = this.dentaltypes;
                this.isSmallItems = true;
            }
            if (key == 'field10') {
                this.modalItems = this.form10Types;
            }
            if (key == 'field13') {
                this.modalItems = this.form13Types;
                this.isSmallItems = true;
            }
            if (key == 'field16') {
                this.modalItems = this.selOptions['shhodennik_likarya'];
            }
            if (key == 'field17') {
                this.modalItems = this.selOptions['epikriz'];
            }
            if (key == 'field18') {
                this.modalItems = this.selOptions['plan_obstezennya'];
            }
            if (key == 'field19') {
                this.modalItems = this.selOptions['plan_likuvannya'];
            }
            if(options.value && options.value != '' ){
                this.selectValue = options.value;
            }else{
                this.selectValue = '';
            }
            console.log(options,this.selectValue,'this.selectValue');
            this.getFieldList(catKey);
        },
        changeMaket(n) {
            this.selMaketIndex = n;
        },
        addDoctorWrite() {
            let newPageNum = Math.max(this.doctorsPageNumsList) + 1;
            this.doctorsPageNumsList.push(newPageNum);
            this.maxNum += 1;
            this.form.doctors[newPageNum] = this.getDefaultDoctor();

            for (let rowIndex = 1; rowIndex <= 22; rowIndex++) {
                if (this.form.field16[newPageNum] == undefined)
                    this.form.field16[newPageNum] = '';
            }
        },
        save(nextFunc = null) {
            if(!this.isValid())
                return;
            // this.form.field16dates ={gg:'as'};
            return this.form.post('/patient/store')
                .then(({
                    data
                }) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    // console.log(this.$route.params.id,data.id,'this.$route.params.id')
                    if(nextFunc != null){
                        nextFunc();
                    }
                    if (this.$route.params.id == undefined){
                        this.dataSaved = true;
                        this.$router.push({ name: 'patient-form_043', params: { id: data.id } })
                    }
                    this.storeOldValues();
                    // this.$router.push({
                    //     name: 'patients'
                    // })
                })
                .catch(error => {
                    console.log(error.response.data.errors);
                    if (error.response.status == 422) {

                        let list = '';

                        for (const property in error.response.data.errors) {
                            list += error.response.data.errors[property][0] + '\n';
                            // console.log(`${property}: ${object[property]}`);
                        }

                        Swal.fire(
                            'Помилка!',
                            list,
                            'error'
                        )
                    } else {
                        Swal.fire(
                            'Помилка!',
                            'Файл: ' + error.response.data.file + ' строка : ' + error.response.data.line + ' Помилка: ' + error.response.data.message,
                            'error'
                        );

                    }
                })
        },
        print() {
            if(!this.isValid())
                return;
            // window.print()
            var iframe = $("#printWindow");
            if (iframe.length == 0) {
                iframe = $('<iframe id="printWindow" style="position: absolute; top: -1000px; left: -1000px;"></iframe>');
                $('body').append(iframe)
            }
            var link = $('<link href="/platform/main.css" rel="stylesheet"></link>');
            var customStyle = $('<style>@page {size: landscape;margin: 0mm;}@media print {body {-webkit-print-color-adjust: exact;}}</style>');
            // // iframe.empty();
            // // console.log(iframe.contents().find('head'));
            iframe.contents().find('head').empty();
            iframe.contents().find('head').append(customStyle);
            iframe.contents().find('head').append(link);
            // // iframe.contents().find('head').a($('head').clone());
            // // iframe.contents().find('body').append($('.makets').html);
            // // iframe.contents().append($('head').clone());
            iframe.contents().find('body').empty();
            iframe.contents().find('body').append($('.makets').clone());
            setTimeout(function () {
                iframe.get(0).contentWindow.print()
            }, 1000);
            // iframe.get(0).contentWindow.print();

        },
        deleteDoctorWrite(page,index){
            if(this.checkHasWritePage(page)){
                Swal.fire({
                    text: "Ви дійсно хочете видалити сторінку ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Так, видалити',
                    cancelButtonText: 'Скасувати'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.delDoctorPageFromServer(page,index);
                    }
                })
            }else{
                this.delDoctorPageFromServer(page,index);
            }
        },
        removeDoctorPageLocal(page,pageIndex){
            this.doctorsPageNumsList.splice(pageIndex,1);
            this.maxNum = this.maxNum  -1;
            delete this.form.field16[page];
            for (let line = 1; line < 23; line++) {
                delete this.form.field16dates[ page + '_' + line];
            }
            Toast.fire({
                icon: 'success',
                title: 'Видалено!'
            });
            if(this.selMaketIndex == 4 +pageIndex)
                this.selMaketIndex = 4 +pageIndex - 1;
        },
        delDoctorPageFromServer(page_num,index){
            if(this.$route.params.id == undefined){
                this.removeDoctorPageLocal(page_num,index)
                return;
            }
            axios.post('/patient/removeDoctorPage', {
                    patient_id: this.$route.params.id,
                    page_num:page_num
                })
                .then(response => {
                    this.removeDoctorPageLocal(page_num,index)
                })
                .catch(err => alert(err));

        },
        checkHasWritePage(page){
            if(this.form.field16[page])
                return true;
            for (let line = 1; line < 23; line++) {
                if(this.form.field16dates[ page + '_' + line]){
                    break;
                    return true;
                }
            }
            return false;
        },
        isChangedForm(){
            let isChanged = false;
            let keys = this.form.keys();
            for (let index = 0; index < keys.length; index++) {
                if( keys[index] == 'doctors')
                    continue;
                let val = this.form[keys[index]];
                let oldVal = this.oldvalues[keys[index]];
                if(JSON.stringify(val) !== oldVal){
                    console.log(JSON.stringify(val) , oldVal,'JSON.stringify(val) !== oldVal');
                    isChanged = true;
                    console.log(keys[index],JSON.stringify(val),oldVal,'Incorrect value')
                }
            }
            return isChanged;
        },
        onRouteChange(to, from, next){
            console.log(this.dataSaved, this.form.id,'this.dataSaved && this.form.id')
            if(this.dataSaved && this.form.id == ''){
                next();
                return;
            }
            if(this.isChangedForm()){
                Swal.fire({
                    title: 'Вийти без збереження?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `Зберегти і вийти`,
                    denyButtonText: `Не зберігати`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        this.save(next);
                        // Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                        next()
                    }
                })
            }else{
                next()
            }

        }
    },
    computed: {
        // a computed getter
    },
    // beforeDestroy() {
    //     console.log('beforeDestroy');
    // },
    beforeRouteLeave (to, from, next) {
        // console.log(to,from,'to,from');
        this.onRouteChange(to, from, next)
    },
    watch: {
        '$route.params.id': {
            handler: function (id) {
                this.refresh();
                //    console.log(id);
            },
            deep: true,
            immediate: true
        },
    }

}
</script>
