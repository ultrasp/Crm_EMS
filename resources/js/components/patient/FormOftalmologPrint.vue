<!--шаблон если клик на кнопку печати в таблице-->

<template>
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
        <div class="field   field_2"><input v-model="form.clinic_kod_edropu" :class="{ 'is-invalid': form.errors.has('clinic_kod_edropu') }"></div>
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
            <contenteditable tag="div" v-model="form.blood" :noNL="true" />
        </div>
        <div class="field   field_resus">
            <contenteditable tag="div" v-model="form.rezus" :noNL="true" />
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
            <img :src="'/uploads/'+maket2doctor.avatar" v-if="maket2doctor.avatar != ''" class="img-fluid" alt="">
            <!--<img src="/uploads/1638780620.png" class="img-fluid">-->

        </div>

    </div>
    <div class="maket maket-4 maket-oftalm-4" v-for="(page,index) in doctorsPageNumsList" :class="{'active': selMaketIndex == (3 + index)}" style="background-image: url('/platform/img/svg_oftalm/maket-3-new.svg')">
        <div class="themeList" v-if="selOptions['shhodennik_likarya'] && selOptions['shhodennik_likarya'].length > 0">
            <div class="openTheme openTheme-undefined" >i</div>
            <div class="openTheme openTheme-undefined" >i</div>
        </div>
        <div class="lines">
            <div class="line line-1">
                <div class="field field-date">
                    <template v-for="lineNum in 1">
                    <date-pick v-model="form.field16dates[page + '_' + lineNum]"  :displayFormat="dateFormatDots2" :weekdays="weekdays" :months="months"></date-pick>
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

                <img class="signal_img img-fluid" :src="'/uploads/'+form.doctors[page].avatar" v-if="form.doctors[page] !=undefined && form.doctors[page].avatar && form.doctors[page].avatar != '' ">
            </div>
        </div>
        <div class="addPage" >+</div>
        <div class="addStatus">Заключення <i class="fas fa-check-circle"></i></div>
    </div>
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
                    name: 'Да'
                },
                {
                    id: 2,
                    name: 'Нет'
                },

            ],
            field8Types: [
                {id:1, name:'інваліди війни – 1'},
                {id:2, name:'учасники війни – 2'},
                {id:3, name:'учасники бойових дій – 3'},
                {id:4, name:'інваліди – 4'},
                {id:5, name:'учасники ліквідації наслідків аварії на Чорнобильській АЕС – 5'},
                {id:6, name:'евакуйовані – 6'},
                {id:7, name:'особи, які проживають на території зони радіоекологічного контролю, – 7'},
                {id:8, name:'діти, які народились від батьків, які віднесені до 1, 2, 3 категорій осіб, що постраждали внаслідок  Чорнобильської катастрофи, із зони відчуження, а також відселені із зон безумовного (обов’язкового) і гарантованого добровільного відселення – 8'},
                {id:8, name:'інші пільгові категорії – 9'},
            ],
            maket2doctor: {
                fullname: '',
                avatar: ''
            },
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
            dateFormatDots2: 'DD.MM.YYYY',
            weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        }
    },
    created() {
    },
    mounted() {
    },
    methods: {
        refresh() {
            if (this.$route.params.id != undefined)
                this.selPatientId = this.$route.params.id
            this.form.reset();
            this.getClinic();
            this.getPatient();
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
                    this.clearUndifined();
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
        },
        fillClinic() {
            this.form.clinic_address = this.clinic.address;
            this.form.clinic_name = this.clinic.name;
            this.form.clinic_kod_edropu = this.clinic.kod_edropu;
        },
        changeMaket(n) {
            this.selMaketIndex = n;
        },
    },
    computed: {
        // a computed getter
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
