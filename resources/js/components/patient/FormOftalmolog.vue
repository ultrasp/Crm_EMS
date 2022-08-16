
<!--если открыть форму 025 из таблицы-->
<template>
<div class="workbench">
    <div class="btn-my btn-blue btn-print" v-on:click="print()"><i class="fas fa-print"></i></div>
    <div class="btn-my btn-blue btn-save bg-success" v-on:click="save()"><i class="fas fa-save"></i></div>
    <div class="container container-newPatient">
        <div class="btn-my btn-new btn-blue" v-if="isNew">Додати пацієнта</div>
        <div class="makets     maket-oftalm-block" name="print_1">
            <div class="maket maket-1 maket-oftalm-1" :class="{'active': selMaketIndex == 1}" style="background-image: url('/platform/img/svg_oftalm/maket-1.svg')">
                <div class="field   number"><input v-model="form.card_number" :class="{ 'is-invalid': form.errors.has('card_number') }"></div>
                <div class="field   name">
                    <contenteditable tag="div" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" :noNL="true" />
                    <!-- <div contenteditable="true" v-model="form.name"></div> -->
                </div>
                <div class="field   year">
                    <div contenteditable="true"></div>
                </div>
                <div class="field   docYear">
                    <date-pick v-model="form.doc_year" :class="{ 'is-invalid': form.errors.has('doc_year') }" :displayFormat="dateFormatDots" :weekdays="weekdays" :months="months"></date-pick>
                </div>
                <div class="field   month">
                    <div contenteditable="true"></div>
                </div>
                <div class="field   day">
                    <date-pick v-model="form.birthdate" :class="{ 'is-invalid': form.errors.has('birthdate') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
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
                <div class="field   field_2">
                    <input v-model="form.clinic_kod_edropu" :class="{ 'is-invalid': form.errors.has('clinic_kod_edropu') }" maxlength="8"></div>
                <!-- <div class="field   field_3"><input disabled="" value=""></div>
                    <div class="field   field_4"><input disabled="" value=""></div> -->
                <div class="field   field_5">
                    <contenteditable tag="div" v-model="form.field5" :noNL="false" />
                </div>

                <div class="field   sex">
                    <contenteditable tag="div" v-model="form.gender" :noNL="true" v-on:click="openModal('gender')" :class="{ 'is-invalid': form.errors.has('gender') }" />
                </div>

                <!--Новые поля старт-->

                <div class="field   dispanser">
                    <contenteditable tag="div" v-model="form.field6" :noNL="true" v-on:click="openModal('field6')" :class="{ 'is-invalid': form.errors.has('field6') }" />
                </div>

                <div class="field   kontingent">
                    <contenteditable tag="div" v-model="form.field8" :noNL="true" v-on:click="openModal('field8')" :class="{ 'is-invalid': form.errors.has('field8') }" />
                </div>

                <div class="field   kontingent_text">
                    <contenteditable tag="div" v-model="form.field8text" :noNL="false" />
                </div>

                <div class="field   privilege_num">
                    <input v-model="form.field9" maxlength="6">
                </div>

                <div class="field   privilege_date_1">
                    <date-pick v-model="form.field10" :class="{ 'is-invalid': form.errors.has('field10') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
                </div>
                <div class="field   privilege_text_1">
                    <contenteditable tag="div" v-model="form.field10text" :noNL="true" />
                </div>
                <div class="field   privilege_date_2">
                    <date-pick v-model="form.field11" :class="{ 'is-invalid': form.errors.has('field11') }" :displayFormat="dateFormat" :weekdays="weekdays" :months="months"></date-pick>
                </div>
                <div class="field   privilege_text_2">
                    <contenteditable tag="div" v-model="form.field11text" :noNL="true" />
                </div>
            </div>
            <div class="maket maket-2 maket-oftalm-2" :class="{'active': selMaketIndex == 2}" style="background-image: url('/platform/img/svg_oftalm/maket-2-new.svg')">

                <div class="field   field_blood">
                    <contenteditable tag="div" v-model="form.blood" :noNL="true"  v-on:click="openModal('blood')" />
                </div>
                <div class="field   field_resus">
                    <contenteditable tag="div" v-model="form.rezus" :noNL="true" v-on:click="openModal('rezus')"/>
                </div>
                <div class="field   field_blood_transfusion">
                    <contenteditable tag="div" v-model="form.blood_transfusion" :noNL="true" />
                </div>
                <div class="field   field_diabet">
                    <contenteditable tag="div" v-model="form.diabet" :noNL="true" />
                </div>
                <div class="field   field_infection">
                    <contenteditable tag="div" v-model="form.infection" :noNL="true" />
                </div>

                <div class="field   field_hirurgion">
                    <contenteditable tag="div" v-model="form.hirurgion" :noNL="false" />
                </div>
                <div class="field   field_alergion">
                    <contenteditable tag="div" v-model="form.allergy" :noNL="false" />
                </div>
                <div class="field   field_preparate">
                    <contenteditable tag="div" v-model="form.preparate" :noNL="false" />
                </div>

                <div class="field   field_factorrisk">
                    <contenteditable tag="div" v-model="form.factor_risk" :noNL="false" />
                </div>
                <div class="field   field_doctor_signal">
                    <contenteditable tag="div" v-model="maket2doctor.fullname" :noNL="false" />
                </div>

                <div class="field   field_doctor_signal_img">
                    <!--<img src="/uploads/1638780620.png" class="img-fluid" alt="">-->
                    <img :src="'/uploads/'+maket2doctor.avatar" v-if="maket2doctor.avatar != ''" class="img-fluid" alt="">
                </div>

            </div>
            <div class="maket maket-4 maket-oftalm-4" v-for="(page,index) in doctorsPageNumsList" :class="{'active': selMaketIndex == (3 + index)}" style="background-image: url('/platform/img/svg_oftalm/maket-3-new.svg')">
                <div class="themeList" v-if="selOptions['shhodennik_likarya'] && selOptions['shhodennik_likarya'].length > 0">
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та замінити'"  v-on:click="openModal('field16',{page:page})">i</div>
                    <div class="openTheme openTheme-undefined" v-tooltip="'Вибрати та додати в кінець'" v-on:click="openModal('field16',{page:page,isAdd:true})">i</div>
                </div>
                <div class="lines">
                    <div class="line line-1">
                        <div class="field field-date">
                          <template v-for="lineNum in 1">
                            <date-pick v-model="form.field16dates[page + '_' + lineNum]"  :displayFormat="dateFormatDots" :weekdays="weekdays" :months="months"></date-pick>
                            </template>
                        </div>
                        <div class="field field-value">
                            <contenteditable tag="div" v-model="form.field16[page]" :noNL="false" />
                        </div>
                    </div>
                    <div class="line line-23">
                        <div class="field field-date"><input disabled="" value=""></div>
                        <div class="field field-value" v-if="form.doctors[page] !=undefined">
                            <div contenteditable="false">{{form.doctors[page].fullname}}</div>
                        </div>
                        <img :src="'/uploads/'+form.doctors[page].avatar" v-if="form.doctors[page] !=undefined && form.doctors[page].avatar && form.doctors[page].avatar != '' " class="signal_img img-fluid">
                        <!--<img src="/uploads/1638780620.png"  class="signal_img img-fluid" alt="">-->
                    </div>
                </div>
                <div class="addPage" v-tooltip="'Додати нову сторінку'" v-on:click="addDoctorWrite()">+</div>
                <div class="deletePage" v-tooltip="'Видалити сторінку'" v-on:click="deleteDoctorWrite(page,index)" v-if="index > 0"><i class="fas fa-trash"></i></div>
                <div class="addStatus" v-tooltip="'Редагувати заключення'" v-on:click="openConclusion(page)">Заключення <i class="fas fa-check-circle" v-if="concData[page]"></i></div>
            </div>
        </div>
    </div>
    <div class="list">
        <hooper :vertical="true" style="height: 700px" :itemsToShow="5" v-if="this.$gate.isDoctorOrOwner()">
            <slide v-for="n in maxNum" :key="n">
                <div class="item " v-on:click="changeMaket(n)" :class="{active: selMaketIndex == n}" v-bind:style="{backgroundImage: 'url(/platform/img/'+ ( n > 2 ? 'svg/maket-'+4 : 'svg_oftalm/maket-'+n) +'.svg)'}">
                </div>
            </slide>
        </hooper>
    </div>
    <div class="pagination" v-if="this.$gate.isDoctorOrOwner()">
        <div class="page" v-on:click="changeMaket(n)" v-for="n in maxNum" :class="{'active journal': selMaketIndex == n}">{{n}}</div>
    </div>
    <select-modal :title="modalTitle" :type="modaltype" :items="modalItems" :showModal="showModal" :isSmall="isSmallItems" v-on:itemsSelected="modalSelected($event)"></select-modal>
    <patient-form025-modal :patientId="selPatientId" :pageNum="selPageNum" :info="conclusionlist[selPageNum]" :showModal="conclusionShowModal" v-on:concSaved="conclusionSaved($event)"></patient-form025-modal>

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
            conclusionShowModal: false,
            selFieldkey: '',
            modaltype: 'select',
            selMaketIndex: 1,
            maxNum: 3,
            doctorsPageNumsList: [1],
            // doctorPagesCount: 1,
            yesNoSelect: [{
                    id: 1,
                    name: 'Так'
                },
                {
                    id: 2,
                    name: 'Ні'
                },

            ],
            field8Types: [

                {
                    id: 1,
                    name: 'інваліди війни – 1'
                },
                {
                    id: 2,
                    name: 'учасники війни – 2'
                },
                {
                    id: 3,
                    name: 'учасники бойових дій – 3'
                },
                {
                    id: 4,
                    name: 'інваліди – 4'
                },
                {
                    id: 5,
                    name: 'учасники ліквідації наслідків аварії на Чорнобильській АЕС – 5'
                },
                {
                    id: 6,
                    name: 'евакуйовані – 6'
                },
                {
                    id: 7,
                    name: 'особи, які проживають на території зони радіоекологічного контролю, – 7'
                },
                {
                    id: 8,
                    name: 'діти, які народились від батьків, які віднесені до 1, 2, 3 категорій осіб, що постраждали внаслідок  Чорнобильської катастрофи, із зони відчуження, а також відселені із зон безумовного (обов’язкового) і гарантованого добровільного відселення – 8'
                },
                {
                    id: 8,
                    name: 'інші пільгові категорії – 9'
                },
            ],
            maket2doctor: {
                fullname: '',
                avatar: ''
            },
            bloodTypes:[
                {id:'0(I)',name:'0(I)'},
                {id:'A(II)',name:'A(II)'},
                {id:'A(II)',name:'A(II)'},
                {id:'B(III)',name:'B(III)'},
                {id:'B(III)',name:'B(III)'},
                {id:'AB(IV)',name:'AB(IV)'},
                {id:'AV(IV)',name:'AV(IV)'},
            ],
            rezustypes:[
                {id:'Rh+',name:'Rh+'},
                {id:'Rh-',name:'Rh-'},
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
                field8text: '',
                field8: '',
                field9: '',
                field10: '',
                field10text: '',
                field11: '',
                field11text: '',
                blood: '',
                rezus: '',
                blood_transfusion: '',
                diabet: '',
                infection: '',
                hirurgion: '',
                allergy: '',
                preparate: '',
                factor_risk: '',
                field16: {},
                field16dates: {},
                doctors: {},
                conclusionlist: {},
            }),
            modaloptions: {},
            isSmallItems: false,
            isNew: false,
            selOptions: [],
            clinic: {},
            selPatientId: 0,
            selPageNum: 0,
            conclusionlist: {},
            dateFormat: 'DDMMYY',
            dateFormatDots: 'DD.MM.YY',
            weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
            concData:{},
            oldvalues:{},
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
    },
    methods: {
        refresh() {
            if (this.$route.params.id != undefined)
                this.selPatientId = this.$route.params.id
            this.form.reset();
            this.getClinic();
            this.getPatient();
            // this.storeOldValues();
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
            this.maxNum = 3;
            if (this.$route.params.id == undefined)
                return;

            let loader = this.$loading.show();
            this.form.get('/patient/getForm025/' + this.$route.params.id).then(({
                    data
                }) => {
                    this.form.fill(data.data);
                    this.doctorsPageNumsList = data.data.pages && data.data.pages.length > 0 ? data.data.pages : [1];
                    this.maxNum = 2 + (this.doctorsPageNumsList.length == 0 ? 1 : this.doctorsPageNumsList.length);
                    if (data.data.maket2_doctor != null) {
                        this.maket2doctor.fullname = data.data.maket2_doctor.fullname;
                        this.maket2doctor.avatar = data.data.maket2_doctor.avatar;
                    }
                    this.concData = data.data.concData;
                    this.clearUndifined();
                    this.storeOldValues();
                })
                .catch(error => console.log(error))
                .then(() => {
                    loader.hide()
                })
        },
        getDefaultDoctor(isSaved = true) {
            return (this.$gate.isDoctor() && !isSaved) ?
                {
                    id: 0,
                    fullname: this.$gate.getFullName(),
                    avatar: this.$gate.getUser().avatar
                } :  {
                    id: 0,
                    fullname: '',
                    avatar: ''
                };
        },
        clearUndifined() {
            for (let index = 0; index < this.doctorsPageNumsList.length; index++) {
                if (this.form.field16['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.field16['' + this.doctorsPageNumsList[index]] = '';
                if (this.form.doctors['' + this.doctorsPageNumsList[index]] == undefined)
                    this.form.doctors['' + this.doctorsPageNumsList[index]] = this.getDefaultDoctor( this.selPatientId > 0 );
            }
        },
        fillClinic() {
            this.form.clinic_address = this.clinic.address;
            this.form.clinic_name = this.clinic.name;
            this.form.clinic_kod_edropu = this.clinic.kod_edropu;
        },
        modalSelected(item) {
            this.showModal = false;
            if (this.modaltype == 'date' ? item == '' : item.id == 0)
                return;
            if (this.modaltype == 'select') {
                if (this.selFieldkey == 'field16') {
                    if(item.id)
                        this.form[this.selFieldkey][this.modaloptions.page] = (this.modaloptions.isAdd ? this.form[this.selFieldkey][this.modaloptions.page] : '') + item.name;
                    return;
                }
                this.form[this.selFieldkey] = ['gender', 'field6', 'field8'].includes(this.selFieldkey) ? '' + (item.id ? item.id : '')  : (item.hasOwnProperty('full_description') ? item.full_description : (item.name ? item.name : ''));
            } else {
                if (this.selFieldkey == 'field16dates') {
                    this.form.field16dates = Object.assign({}, this.form.field16dates, {
                        [this.modaloptions.page + '_' + this.modaloptions.row]: item
                    });
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
            if (key == 'field6') {
                this.modalTitle = 'Оберіть варіант';
                this.modalItems = this.yesNoSelect;
            }
            if (key == 'field8') {
                this.modalTitle = 'Оберіть варіант';
                this.modalItems = this.field8Types;
            }
            if (key == 'blood') {
                this.modalItems = this.bloodTypes;
            }
            if (key == 'rezus') {
                this.modalItems = this.rezustypes;
            }
            if (['field16dates'].includes(key)) {
                this.modaltype = 'date';
            }
            // if (['field81', 'field82', 'field9time', 'field14', 'field15', 'field16dates', 'field17dates'].includes(key)) {
            //     this.modaltype = 'date';
            // }
            if (key == 'field16') {
                this.modalItems = this.selOptions['shhodennik_likarya'];
            }

            this.getFieldList(catKey);
        },
        changeMaket(n) {
            this.selMaketIndex = n;
        },
        addDoctorWrite() {
            let newPageNum = Math.max(...this.doctorsPageNumsList) + 1;
            this.doctorsPageNumsList.push(newPageNum);
            console.log(Math.max(...this.doctorsPageNumsList),newPageNum,this.doctorsPageNumsList);
            this.maxNum += 1;

            this.form.doctors[newPageNum] = this.getDefaultDoctor(false);

            for (let rowIndex = 1; rowIndex <= 22; rowIndex++) {
                if (this.form.field16[newPageNum] == undefined)
                    this.form.field16[newPageNum] = '';
            }
        },
        save(nextFunc = null) {
            if(!this.isValid())
                return;
            // this.form.field16dates ={gg:'as'};
            if (this.selPatientId == 0) {
                this.form.conclusionlist = this.conclusionlist;
            }
            this.form.post('/form025/store')
                .then(({
                    data
                }) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    if(nextFunc != null){
                        nextFunc();
                    }
                    // console.log(this.$route.params.id,'this.$route.params.id')
                    this.storeOldValues();
                    if (this.$route.params.id == undefined) {
                        this.$router.push({
                            name: 'patient-form_oftol',
                            params: {
                                id: data.id
                            }
                        })
                    }
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
        openConclusion(pageNum) {
            this.selPageNum = pageNum;
            console.log(this.selPageNum, 'this.selPageNum');
            this.conclusionShowModal = true;
        },
        conclusionSaved(info) {
            this.conclusionShowModal = false;
            console.log(info,'info');
            if (info.data != null)
                this.$set(this.conclusionlist, this.selPageNum, info);

            if(info.hasData)
                this.concData[info.pageNum] = 1;
            else
                this.concData[info.pageNum] = 0;
        },
        deleteDoctorWrite(page,index){
            console.log(page,index,'page,index');
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
            delete this.conclusionlist[page];
            delete this.concData[page];
            Toast.fire({
                icon: 'success',
                title: 'Видалено!'
            });
            console.log(this.selMaketIndex,pageIndex,'this.selMaketIndex,index');
            if(this.selMaketIndex == 3 +pageIndex)
                this.selMaketIndex = 3 +pageIndex - 1;
        },
        delDoctorPageFromServer(page_num,index){
            if(this.selPatientId == 0){
                this.removeDoctorPageLocal(page_num,index)
                return;
            }
            axios.post('/patient/removeDoctorPage', {
                    patient_id: this.selPatientId,
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
            console.log(this.concData[page] ,'this.conclusionlist[page] && this.conclusionlist[page].hasData');
            if(this.concData[page])
                return true;
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
                    isChanged = true;
                    console.log(keys[index],JSON.stringify(val),oldVal,'Incorrect value')
                }
            }
            return isChanged;
        },
        onRouteChange(to, from, next){
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
    beforeRouteLeave (to, from, next) {
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
        }
    }

}
</script>
