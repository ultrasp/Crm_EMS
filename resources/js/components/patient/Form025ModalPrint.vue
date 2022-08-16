<!--шаблон печати заключения офтальмолога-->
<template>
    <div>
        <div id="t1_1" class="t s1_1"><img :src="'/uploads/'+clinic.logo" v-if="clinic.logo" style="width:100px;height:100px"></div>
        <div id="t2_1" class="t s2_1">Консультативне заключення</div>
        <div id="t3_1" class="t s1_1">«{{clinic.name}}»</div>
        <!-- <div id="t4_1" class="t s1_1">професора»</div> -->
        <div id="t5_1" class="t s1_1">{{clinic.address}}</div>
        <!-- <div id="t6_1" class="t s1_1">Пирогова 1</div> -->
        <div id="t7_1" class="t s3_1">Ліцензія МОЗ України</div>
        <div id="t8_1" class="t s3_1">АЕ № 9484 від 19.03.2014року</div>
        <!--<div id="t9_1" class="t s1_1">тел. </div>-->
        <div id="ta_1" class="t s2_1">Пацієнт:</div>
        <div id="tb_1" class="t s2_1"> {{(patient.lastname || '') + ' ' + (patient.name || '') + ' ' + (patient.surname || '')}}</div>
        <div id="tc_1" class="t s1_1 font-bold">Стать: <span>{{patient.gender == 1 ? 'М': 'Ж'}}</span></div>
        <div id="td_1" class="t s1_1 font-bold">Вік: <span>{{age}}</span></div>
        <div id="te_1" class="t s1_1 font-bold">Дата візиту: <span>{{patient.created_at | myDate}}</span></div>
        <div id="tf_1" class="t s2_1">№ картки:</div>
        <div id="tg_1" class="t s1_1">{{patient.card_number || ''}}</div>
        <div id="th_1" class="t s1_1 font-bold">Телефон: <span>{{patient.phone || ''}}</span></div>
        <div id="ti_1" class="t s2_1">Лікар:</div>
        <div id="tj_1" class="t s1_1">{{doctor}}</div>
        <div class="visnovoc-content">
            <div id="tk_1" class=" s4_1 mt-t-4" v-if="form.skargi">Скарги</div>
            <div id="tl_1" class=" s1_1" v-if="form.skargi">{{form.skargi}}</div>
            <!-- <div id="tm_1" class=" s1_1">esse maiores saepe. Et eveniet ex, hic nemo nesciunt nisi oﬃcia voluptatum. Amet cupiditate ducimus error et nihil </div>
            <div id="tn_1" class="t s1_1">perspicias quis quisquam velit vitae voluptatum</div> -->
            <div id="to_1" class=" s4_1 mt-t-4" v-if="form.anamnez">Короткий анамнез</div>
            <div id="tp_1" class=" s1_1" v-if="form.anamnez">{{form.anamnez}}</div>
            <!-- <div id="tq_1" class=" s1_1">esse maiores saepe. Et eveniet ex, hic nemo nesciunt nisi oﬃcia voluptatum. Amet cupiditate ducimus error et nihil </div>
            <div id="tr_1" class=" s1_1">perspicias quis quisquam velit vitae voluptatum</div> -->
            <div id="ts_1" class=" s4_1 mt-t-4">Дані обстеження</div>

            <div class="visus-b">
                <!--<div class="visus-b-item">-->
                <!--<div class="visus-b-l">-->
                <!---->
                <!--</div>-->
                <!--<div class="visus-b-r">-->
                <!---->
                <!--</div>-->
                <!--</div>-->
                <div class="visus-b-item mt-t-4">
                    <div class="visus-b-l visus-b-od-os" style="">
                        <div id="tt_1" class="od-os s5_1 font-bold" style="margin-right: 5px">Visus OD =</div>
                        <div id="tu_1" class="od-os s6_1">{{form.visus_od}} <span v-if="form.visus_od_kop">З кор.sph. {{form.visus_od_kop}} </span> <span v-if="form.visus_od_cyl">cyl. {{form.visus_od_cyl}}</span> <span v-if="form.visus_od_ax">ax. {{form.visus_od_ax}} </span>= {{form.visus_od_equal}}</div>

                    </div>
                    <div class="visus-b-r visus-b-od-os" style="">
                        <div id="tv_1" class="od-os s6_1 font-bold" style="margin-right: 5px">Visus OS =</div>
                        <div id="tw_1" class="od-os s6_1">{{form.visus_os}}<span v-if="form.visus_os_sph"> З кор.sph. {{form.visus_os_sph}}</span><span v-if="form.visus_os_cyl"> cyl. {{form.visus_os_cyl}}</span> <span v-if="form.visus_os_ax">ax. {{form.visus_os_ax}}</span> = {{form.visus_os_equal}}</div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="tx_1" class=" s6_1 font-bold" v-if="form.visus_od_konyuktiv">Кон‘юнктива: <span>{{form.visus_od_konyuktiv}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="ty_1" class=" s6_1 font-bold" v-if="form.visus_os_konyuktiv">Кон‘юнктива: <span>{{form.visus_os_konyuktiv}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="tz_1" class=" s5_1 font-bold" v-if="form.visus_od_rogivka">Рогівка: <span>{{form.visus_od_rogivka}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t10_1" class=" s6_1 font-bold" v-if="form.visus_os_rogivka">Рогівка: <span>{{form.visus_os_rogivka}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="t11_1" class=" s5_1 font-bold" v-if="form.visus_od_krishtalik">Кришталик: <span>{{form.visus_od_krishtalik}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t12_1" class=" s6_1 font-bold" v-if="form.visus_os_krishtalik">Кришталик: <span>{{form.visus_os_krishtalik}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="t13_1" class=" s5_1 font-bold" v-if="form.visus_od_sklo">Скловидне тіло: <span>{{form.visus_od_sklo}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t14_1" class=" s6_1 font-bold" v-if="form.visus_os_sklo">Скловидне тіло: <span>{{form.visus_os_sklo}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="t15_1" class=" s5_1 font-bold" v-if="form.visus_od_ochne">Очне дно: <span>{{form.visus_od_ochne}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t16_1" class=" s6_1 font-bold" v-if="form.visus_os_ochne">Очне дно: <span>{{form.visus_os_ochne}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="t17_1" class=" s6_1 font-bold" v-if="form.visus_od_keratot">Кератотопографія: <span>{{form.visus_od_keratot}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t19_1" class=" s6_1 font-bold" v-if="form.visus_os_keratot">Кератотопографія: <span>{{form.visus_os_keratot}}</span></div>
                    </div>
                </div>
                <hr>

                <div class="visus-b-item mt-t-3">
                    <div class="visus-b-l">
                        <div id="t1b_1" class=" s5_1 font-bold" v-if="form.visus_od_refrakt">Рефрактометрія: <span>{{form.visus_od_refrakt}}</span></div>
                    </div>
                    <div class="visus-b-r">
                        <div id="t1c_1" class=" s6_1 font-bold" v-if="form.visus_os_refrakt">Рефрактометрія: <span>{{form.visus_os_refrakt}}</span></div>
                    </div>
                </div>
                <hr>
            </div>
            <!--<div id="tt_1" class=" s5_1">Visus OD =</div>-->
            <!--<div id="tu_1" class=" s6_1" >{{form.visus_od}} <span v-if="form.visus_od_kop">З кор.sph. {{form.visus_od_kop}} </span> <span v-if="form.visus_od_cyl">cyl. {{form.visus_od_cyl}}</span> <span v-if="form.visus_od_ax">ax. {{form.visus_od_ax}} </span>= {{form.visus_od_equal}}</div>-->
            <!--<div id="tv_1" class=" s6_1">Visus OS =</div>-->
            <!--<div id="tw_1" class=" s6_1">{{form.visus_os}}<span v-if="form.visus_os_sph"> З кор.sph. {{form.visus_os_sph}}</span><span v-if="form.visus_os_cyl"> cyl. {{form.visus_os_cyl}}</span> <span v-if="form.visus_os_ax">ax. {{form.visus_os_ax}}</span> = {{form.visus_os_equal}}</div>-->
            <!--<div id="tx_1" class=" s6_1" v-if="form.visus_od_konyuktiv">Кон‘юнктива: <span>{{form.visus_od_konyuktiv}}</span></div>-->
            <!--<div id="ty_1" class=" s6_1" v-if="form.visus_os_konyuktiv">Кон‘юнктива: <span>{{form.visus_os_konyuktiv}}</span></div>-->
            <!--<div id="tz_1" class=" s5_1" v-if="form.visus_od_rogivka">Рогівка: <span>{{form.visus_od_rogivka}}</span></div>-->
            <!--<div id="t10_1" class=" s6_1" v-if="form.visus_os_rogivka">Рогівка: <span>{{form.visus_os_rogivka}}</span></div>-->

            <!--<div id="t11_1" class=" s5_1" v-if="form.visus_od_krishtalik">Кришталик: <span>{{form.visus_od_krishtalik}}</span></div>-->
            <!--<div id="t12_1" class=" s6_1" v-if="form.visus_os_krishtalik">Кришталик: <span>{{form.visus_os_krishtalik}}</span></div>-->
            <!--<div id="t13_1" class=" s5_1" v-if="form.visus_od_sklo">Скловидне тіло: <span>{{form.visus_od_sklo}}</span></div>-->
            <!--<div id="t14_1" class=" s6_1" v-if="form.visus_os_sklo">Скловидне тіло: <span>{{form.visus_os_sklo}}</span></div>-->
            <!--<div id="t15_1" class=" s5_1" v-if="form.visus_od_ochne">Очне дно: <span>{{form.visus_od_ochne}}</span></div>-->
            <!--<div id="t16_1" class=" s6_1" v-if="form.visus_os_ochne">Очне дно: <span>{{form.visus_os_ochne}}</span></div>-->


            <!--<div id="t17_1" class=" s6_1" v-if="form.visus_od_keratot">Кератотопографія: <span>{{form.visus_od_keratot}}</span></div>-->
            <!--<div id="t19_1" class=" s6_1" v-if="form.visus_os_keratot">Кератотопографія: <span>{{form.visus_os_keratot}}</span></div>-->
            <!--<div id="t1b_1" class=" s5_1" v-if="form.visus_od_refrakt">Рефрактометрія: <span>{{form.visus_od_refrakt}}</span></div>-->
            <!--<div id="t1c_1" class=" s6_1" v-if="form.visus_os_refrakt">Рефрактометрія: <span>{{form.visus_os_refrakt}}</span></div>-->
            <div id="t1d_1" class=" s4_1 mt-t-4" v-if="form.diagnoz">Діагноз</div>
            <div id="t1e_1" class=" s1_1" v-if="form.diagnoz">{{form.diagnoz}}</div>


            <!-- <div id="t1f_1" class=" s1_1">esse maiores saepe. Et eveniet ex, hic nemo nesciunt nisi oﬃcia voluptatum. Amet cupiditate ducimus error et nihil </div>
            <div id="t1g_1" class=" s1_1">perspicias quis quisquam velit vitae voluptatum</div> -->
            <div id="t1h_1" class=" s4_1 mt-t-4" v-if="form.priznan">Призначене лікування</div>
            <div id="t1i_1" class=" s1_1" v-if="form.priznan">{{form.priznan}}</div>
            <!-- <div id="t1j_1" class="t s1_1">esse maiores saepe. Et eveniet ex, hic nemo nesciunt nisi oﬃcia voluptatum. Amet cupiditate ducimus error et nihil </div>
            <div id="t1k_1" class=" s1_1">perspicias quis quisquam velit vitae voluptatum</div> -->
            <div id="t1l_1" class=" s4_1 mt-t-4" v-if="form.rekomend">Рекомендовано</div>
            <div id="t1m_1" class=" s1_1" v-if="form.rekomend">{{form.rekomend}}</div>
        </div>

        <div class="visnovoc-footer mt-t-4">

            <!-- <div id="t1n_1" class="t s1_1">esse maiores saepe. Et eveniet ex, hic nemo nesciunt nisi oﬃcia voluptatum. Amet cupiditate ducimus error et nihil </div>
            <div id="t1o_1" class="t s1_1">perspicias quis quisquam velit vitae voluptatum</div> -->

            <div class="" style="margin-top:30px;  ">
                <div id="t1p_1" class=" s1_1" style="text-align: right">Підпис лікаря: ________________ {{doctor}}</div>
            </div>
            <div>
                <div style="margin-top:10px;  ">
                    <div id="t1q_1" class=" s7_1">Лікар пояснив сутність мого захворювання, призначеного та проведеного лікування та</div>
                    <div id="t1r_1" class=" s7_1">необхідність його продовження та виконання рекомендацій</div>
                </div>
            </div>

            <div class="" style="margin-top:20px; float: none">
                <div id="t1s_1" class=" s1_1" style="float: left; ">Дата: ______________</div>
                <div id="t1t_1" class=" s1_1" style="float: right">Підпис пацієнта: _____________________________________</div>
            </div>
        </div>
        <div class="visnovoc-footer-last"></div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        toggleModal: this.showModal,
        clinic: {},
        doctor: '',
        form: new Form({
          patientId: '',
          pageNum: '',
          skargi: '',
          anamnez: '',
          visus_od: '',
          visus_od_kop: '',
          visus_od_cyl: '',
          visus_od_ax: '',
          visus_od_equal: '',
          visus_od_konyuktiv: '',
          visus_od_rogivka: '',
          visus_od_krishtalik: '',
          visus_od_sklo: '',
          visus_od_ochne: '',
          visus_od_keratot: '',
          visus_od_refrakt: '',
          visus_os: '',
          visus_os_sph: '',
          visus_os_cyl: '',
          visus_os_ax: '',
          visus_os_equal: '',
          visus_os_konyuktiv: '',
          visus_os_rogivka: '',
          visus_os_krishtalik: '',
          visus_os_sklo: '',
          visus_os_ochne: '',
          visus_os_keratot: '',
          visus_os_refrakt: '',
          diagnoz: '',
          priznan: '',
          rekomend: ''
        }),
        patient: {
          name: '',
          lastname: '',
          surname: ''
        },
        age: '',
      }
    },
    mounted() {
      // console.log(this.$route.params);
      this.fillData();
      this.getClinic();
      // this.getSelectedDoctors();
    },
    methods: {
      getClinic() {
        this.form.get('/clinic/info').then(({
                                              data
                                            }) => {
          this.clinic = data.clinic;
        })
          .catch(error => console.log(error))
          .then(() => {
          })
      },
      fillData() {
        let patientId = this.$route.params.id
        let pageNum = this.$route.params.pageNum
        axios.post('/patient/getConclution', {
          patientId: patientId,
          pageNum: pageNum,
          needPatient: 1
        }).then(res => {
          this.form.fill(res.data.conclution);
          console.log(this.patient);
          this.patient = Object.assign({}, this.patient, res.data.patient);
          this.age = res.data.age;
          this.doctor = res.data.doctor;
          // moment(this.patient.birthday).
        }).catch(error => {
          // Swal.fire(
          //     'Помилка при получение данних!',
          //     null,
          //     'error'
          // )
        })
      },
    },
  }
</script>
