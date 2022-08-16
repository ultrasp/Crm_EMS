<template>
<div class="modal modal-fields modal-themes modal-oft-conclusion" :class="{ 'active': showModal}">
    <div class="modal_container">
        <div class="close" v-on:click="close()">×</div>
        <h3> Консультативне заключення</h3>
        <div class="scroll-b">
            <div class="row">
                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Скарги </label>
                        <textarea placeholder="" class="form-control" v-model="form.skargi"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Короткий анамнез</label>
                        <textarea placeholder="" class="form-control" v-model="form.anamnez"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Дані обстеження</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="font-weight-bold">Праве око (OD)</label>
                                <div class="status-b form-group mb-0 d-flex align-items-center justify-content-start">
                                    <label class="form-label text-nowrap mr-3 mb-3" style="    min-width: 120px; width: 120px;">Visus OD = </label>
                                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_od]" v-model="form.visus_od" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">З кор.sph.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_od_sph]" v-model="form.visus_od_kop" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">cyl.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_od_cyl]" v-model="form.visus_od_cyl" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">ax.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_od_ax]" v-model="form.visus_od_ax" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">=</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_od_equal]" v-model="form.visus_od_equal" style="    max-width: 50px;">
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0" style="min-width: 120px; width: 120px;">Кон‘юнктива </label>
                                    <input type="text" class="form-control" name="properties[akt_conjunctiva_od]" v-model="form.visus_od_konyuktiv">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0" style="min-width: 120px; width: 120px;">Рогівка</label>
                                    <input type="text" class="form-control" name="properties[akt_cornea_od]" v-model="form.visus_od_rogivka">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Кришталик</label>
                                    <input type="text" class="form-control" name="properties[akt_crystal_od]" v-model="form.visus_od_krishtalik">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Скловидне тіло</label>
                                    <input type="text" class="form-control" name="properties[akt_glassy_od]" v-model="form.visus_od_sklo">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Очне дно</label>
                                    <input type="text" class="form-control" name="properties[akt_fundus_od]" v-model="form.visus_od_ochne">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Кератотопографія</label>
                                    <input type="text" class="form-control" name="properties[akt_keratoto_od]" v-model="form.visus_od_keratot">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Рефрактометрія</label>
                                    <input type="text" class="form-control" name="properties[akt_refractometry_od]" v-model="form.visus_od_refrakt">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <label class="font-weight-bold">Праве око (OS)</label>
                                <div class="status-b form-group mb-0 d-flex align-items-center justify-content-start">
                                    <label class="form-label text-nowrap mr-3 mb-3" style="    min-width: 120px; width: 120px;">Visus OS = </label>
                                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_os]" v-model="form.visus_os" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">З кор.sph.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_os_sph]" v-model="form.visus_os_sph" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">cyl.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_os_cyl]" v-model="form.visus_os_cyl" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">ax.</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_os_ax]" v-model="form.visus_os_ax" style="    max-width: 50px;">
                                        <label class="form-label text-nowrap mr-2 ml-2 mb-3">=</label>
                                        <input type="text" class="form-control p-1 text-center mb-3" name="properties[akt_visus_os_equal]" v-model="form.visus_os_equal" style="    max-width: 50px;">
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0" style="min-width: 120px; width: 120px;">Кон‘юнктива </label>
                                    <input type="text" class="form-control" name="properties[akt_conjunctiva_os]" v-model="form.visus_os_konyuktiv">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0" style="min-width: 120px; width: 120px;">Рогівка</label>
                                    <input type="text" class="form-control" name="properties[akt_cornea_os]" v-model="form.visus_os_rogivka">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Кришталик</label>
                                    <input type="text" class="form-control" name="properties[akt_crystal_os]" v-model="form.visus_os_krishtalik">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Скловидне тіло</label>
                                    <input type="text" class="form-control" name="properties[akt_glassy_os]" v-model="form.visus_os_sklo">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Очне дно</label>
                                    <input type="text" class="form-control" name="properties[akt_fundus_os]" v-model="form.visus_os_ochne">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Кератотопографія</label>
                                    <input type="text" class="form-control" name="properties[akt_keratoto_os]" v-model="form.visus_os_keratot">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label class="form-label text-nowrap mr-3 mb-0 " style="min-width: 120px; width: 120px;">Рефрактометрія</label>
                                    <input type="text" class="form-control" name="properties[akt_refractometry_os]" v-model="form.visus_os_refrakt">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Діагноз</label>
                        <textarea placeholder="" class="form-control" v-model="form.diagnoz"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Призначене лікування</label>
                        <textarea placeholder="" class="form-control" v-model="form.priznan"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-left">
                        <label class="font-weight-bold">Рекомендовано</label>
                        <textarea placeholder="" class="form-control" v-model="form.rekomend"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons d-flex align-items-end justify-content-end">
            <button type="submit" class="btn-my mr-2 ml-0 mt-0" v-on:click="onPrint()">Друк</button>
            <button type="submit" class="btn-my mr-0 ml-0 mt-0 bg-success" v-on:click="save()">Зберегти</button>
        </div>
    </div>
    <iframe id="consultFrame" v-if="this.patientId > 0"  style="position: absolute; top: -1000px; left: -1000px;"></iframe>
</div>
</template>

<script>
export default {
    props: ["patientId", "showModal", "pageNum", "info"],
    data() {
        return {
            toggleModal: this.showModal,
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
            })
        }
    },
    mounted() {
        // this.getDoctors();
        // this.getSelectedDoctors();
    },
    methods: {
        fillData() {
            axios.post('/patient/getConclution', {
                patientId: this.patientId,
                pageNum: this.pageNum
            }).then(res => {
                if (res.data.conclution != null)
                    this.form.fill(res.data.conclution);
                $("#consultFrame").attr('src','/patients/consult/print/'+this.patientId +'/'+ this.pageNum);
            }).catch(error => {
                Swal.fire(
                    'Помилка при отримані даних!',
                    null,
                    'error'
                )
            })
        },
        isHasData(data) {
            var found = Object.keys(data).filter(function (key) {
                if (!['patientId', 'pageNum'].includes(key)){
                    // console.log(key,data[key],'data[key]');
                    return (data[key] != null && data[key] != '');
                }
            });
            return found.length > 0;
        },
        save() {
            console.log(this.info, this.info);
            if (this.patientId == 0) {
                Toast.fire({
                    icon: 'success',
                    title: 'Дані будуть збережені після збереження пацієнта'
                });
                let data = this.form.data();
                data.pageNum = this.pageNum;
                this.$emit('concSaved', {
                    data: data,
                    pageNum: this.pageNum,
                    hasData: this.isHasData(this.form.data())
                });
                this.form.reset();
                return;
            } else {
                this.form.patientId = this.patientId;
                this.form.pageNum = this.pageNum;
                this.form.post('/patient/storeConclution')
                    .then(({
                        data
                    }) => {
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                        this.$emit('concSaved', {
                            data: null,
                            pageNum: this.pageNum,
                            hasData: this.isHasData(this.form.data())
                        });
                        $("#consultFrame").attr('src','');
                        this.form.reset();
                    })

            }

        },
        close() {
            this.$emit('concSaved', {
                data: null,
                pageNum: this.pageNum,
                hasData: this.isHasData(this.form.data())
            });
            this.form.reset();
        },
        onPrint() {
            if (this.patientId > 0) {
                // let loader = this.$loading.show();
                $("#consultFrame").get(0).contentWindow.print();
                // document.getElementById('consultFrame').contentDocument.location.reload(true);
                // setTimeout(() => {
                //     loader.hide();
                //     $("#consultFrame").get(0).contentWindow.print();
                //     console.log("this is the first message")
                // }, 5000);
                
            } else
                Toast.fire({
                    icon: 'warning',
                    title: 'Потрібно зберегти пацієнта, після цього можна друкувати консультацію'
                });

        }
    },
    watch: {
        showModal: function (newVal, oldVal) { // watch it
            if (newVal) {
                // console.log(this.info,'info');
                if (this.patientId == 0 && this.info != undefined) {
                    this.form.fill(this.info.data);
                }
                if (this.patientId != 0) {
                    this.fillData();
                }
                $('body').addClass('modal-open');
                //   console.log(this.info,'this.info')
            } else {
                $('body').removeClass('modal-open');
            }
        }
    }
}
</script>
