<template>
<div class="container container-settings">
    <div class="container_title">Клініка</div>
    <form @submit.prevent="saveClinic" @keydown="form.onKeydown($event)" style="width:100%">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Адреса клініки <span>*</span> </label>
                            <input type="text" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }" class="form-control" placeholder="Адреса клініки">
                            <error-div :form="form" field="address" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Назва клініки <span>*</span> </label>
                            <input type="text" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" placeholder="Назва клініки">
                            <error-div :form="form" field="name" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Код ЄДРПОУ <span>*</span> </label>
                            <input type="text" v-model="form.kod_edropu" :class="{ 'is-invalid': form.errors.has('kod_edropu') }" class="form-control" placeholder="Код ЄДРПОУ">
                            <error-div :form="form" field="kod_edropu" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Номер карти  <span>*</span> <span class="small">(З якого починати створення)</span></label>
                            <input type="text" v-model="form.start_card_number" :class="{ 'is-invalid': form.errors.has('start_card_number') }" class="form-control" placeholder="Номер карти">
                            <error-div :form="form" field="start_card_number" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <div class="hidden" style="display:none">
                        <input type="file" id="file" ref="logoImage" v-on:change="handleFileUpload()" accept="image/*" />
                    </div>
                    <label class="font-weight-bold">Логотип</label>
                    <error-div :form="form" field="logo" />
                    <div class="image image-sign w-100" v-bind:style="{ backgroundImage: 'url(' + logoImageUrl + ')' }" @click="$refs.logoImage.click()">
                        <div class="svg">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 390 390" xml:space="preserve">
                                <g id="XMLID_17_">
                                    <path id="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"></path>
                                    <path id="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"></path>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <small>Підтримуються формати png, jpeg</small>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button :disabled="form.busy" type="submit" class="btn-my bg-success">Зберегти</button>
        </div>
    </form>

</div>
</template>

<script>
export default {
    data() {
        return {
            logoImageUrl: '',
            form: new Form({
                address: '',
                name: '',
                kod_edropu: '',
                start_card_number: '',
                logo: '',
            }),
        }
    },
    mounted() {
        this.fillClinic();
    },
    methods: {
        fillClinic() {
            this.form.get('/clinic/info').then(({
                data
            }) => {
                this.form.address = data.clinic.address;
                this.form.name = data.clinic.name;
                this.form.kod_edropu = data.clinic.kod_edropu;
                this.form.start_card_number = data.clinic.start_card_number;
                this.logoImageUrl = data.clinic.logo != null ? 'uploads/' + data.clinic.logo : '';
            })
        },
        saveClinic() {
            this.form.submit('post', '/clinic/store', {
                    // Transform form data to FormData
                    transformRequest: [function (data, headers) {
                        return objectToFormData.serialize(data)
                    }],

                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        // console.log(e)
                    }
                })
                .then( data=>{
                    console.log(data);
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });

                })
            // console.log(response,'response');
        },
        handleFileUpload() {
            this.form.logo = this.$refs.logoImage.files[0];
            this.logoImageUrl = URL.createObjectURL(this.form.logo);
        },

    }
}
</script>
