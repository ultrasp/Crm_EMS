<template>
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
        <div class="field   docYear"><input v-model="form.doc_year" :class="{ 'is-invalid': form.errors.has('doc_year') }"></div>
        <div class="field   month">
            <div contenteditable="true"></div>
        </div>
        <div class="field   day"><input v-model="form.birthdate" :class="{ 'is-invalid': form.errors.has('birthdate') }"></div>
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
            <contenteditable tag="div" v-model="form.field81" v-on:click="openModal('field81')" :noNL="true" />
        </div>
        <div class="field tr rightAlign tr_12">
            <contenteditable tag="div" v-model="form.field82" v-on:click="openModal('field82')" :noNL="true" />
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
    <div class="maket maket-4 " v-for="page in doctorPagesCount" :class="{'active': selMaketIndex == (3 + page)}" style="background-image: url('/platform/img/svg/maket-4.svg')">
        <div class="themeList" v-if="selOptions['shhodennik_likarya'] && selOptions['shhodennik_likarya'].length > 0">
            <div class="openTheme openTheme-undefined" v-for="lineNum in 22" v-on:click="openModal('field16',{row:lineNum,page:page})">i</div>
        </div>
        <div class="lines">
            <div class="line" :class="['line-'+lineNum]" v-for="lineNum in 22">
                <div class="field field-date" v-on:click="openModal('field16dates',{row:lineNum,page:page})">
                    <input disabled="" value="" v-model="form.field16dates[page + '_' + lineNum]">
                </div>
                <div class="field field-value">
                    <contenteditable tag="div" v-model="form.field16[page + '_' + lineNum]" :noNL="false" />
                </div>
            </div>
            <div class="line line-23">
                <div class="field field-date"><input disabled="" value=""></div>
                <div class="field field-value">
                    <div contenteditable="true">Іванов І.І.</div>
                </div>
            </div>
        </div>
        <div class="addPage" v-on:click="addDoctorWrite()">+</div>
    </div>
    <div class="maket maket-4 maket-5 " :class="{'active': selMaketIndex == ( 4 + doctorPagesCount )}" style="background-image: url('/platform/img/svg/maket-5.svg')">
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
    <div class="maket maket-4 maket-6 " :class="{'active': selMaketIndex == ( 5 + doctorPagesCount )}" style="background-image: url('/platform/img/svg/maket-6.svg')">
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
                    <contenteditable tag="div" v-model="form.field18" :noNL="true" :noHTML="false" />
                </div>
                <div class="field field-value">
                    <contenteditable tag="div" v-model="form.field19" :noNL="true" />
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
            modalTitle: '',
            modalItems: [],
            showModal: false,
            selFieldkey: '',
            modaltype: 'select',
            selMaketIndex: 1,
            maxNum: 6,
            doctorPagesCount: 1,
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
            }),
            modaloptions: {},
            isSmallItems: false,
            isNew: false,
            selOptions: [],
            clinic: {},
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
        this.getPatient();
        this.getFieldList('shhodennik_likarya', false);
        this.getFieldList('epikriz', false);
        this.getFieldList('plan_obstezennya', false);
        this.getFieldList('plan_likuvannya', false);
    },
    methods: {
        getClinic() {
            this.form.get('/clinic/info').then(({
                data
            }) => {
                this.clinic = data.clinic;
                this.fillClinic();
            })
        },
        getPatient() {
            if (this.$route.params.id == '') {
                this.getClinic();
                return;
            }

            this.form.get('/patient/getForm04/' + this.$route.params.id).then(({
                data
            }) => {
                this.form.fill(data.data);
                this.getClinic();
            })
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
                    this.form[this.selFieldkey][this.modaloptions.row + '_' + this.modaloptions.col] = item.name;
                    return;
                }
                if (this.selFieldkey == 'field16') {
                    this.form[this.selFieldkey][this.modaloptions.page + '_' + this.modaloptions.row] = item.name;
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
                    this.form[this.selFieldkey][this.modaloptions.page + '_' + this.modaloptions.row] = item;
                    return;
                }
                if (['field9time', 'field17dates'].includes(this.selFieldkey)) {
                    this.form[this.selFieldkey][this.modaloptions.row] = item;
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

            this.getFieldList(catKey);
        },
        changeMaket(n) {
            this.selMaketIndex = n;
        },
        addDoctorWrite() {
            this.doctorPagesCount += 1;
            this.maxNum += 1;
        },
        save() {
            this.form.post('/patient/store')
                .then(({
                    data
                }) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    this.$router.push({
                        name: 'patients'
                    })
                })
        },
        print() {
            window.print()
            // var iframe = $("#printWindow");
            // if (iframe.length == 0){
            //     iframe = $('<iframe id="printWindow" style="position: absolute; top: -1000px; left: -1000px;"></iframe>');
            //     $('body').append(iframe)
            // }
            // var link = $('<link href="http://emc/platform/main.css" rel="stylesheet"></link>');
            // var customStyle = $('
            // // iframe.empty();
            // // console.log(iframe.contents().find('head'));
            // iframe.contents().find('head').empty();
            // iframe.contents().find('head').append(customStyle);
            // iframe.contents().find('head').append(link);
            // // iframe.contents().find('head').a($('head').clone());
            // // iframe.contents().find('body').append($('.makets').html);
            // // iframe.contents().append($('head').clone());
            // iframe.contents().find('body').empty();
            // iframe.contents().find('body').append($('.makets').clone());
            // iframe.get(0).contentWindow.print();

        }
    },
    computed: {
        // a computed getter
    }

}
</script>
