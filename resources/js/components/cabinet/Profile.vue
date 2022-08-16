<template>
<div class="container container-settings">
    <form @submit.prevent="saveProfile" @keydown="form.onKeydown($event)" style="width:100%">
        <div class="container_title">Профіль</div>

        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Прізвище <span>*</span></label>
                            <input type="text" v-model="form.surname" :class="{ 'is-invalid': form.errors.has('surname') }" class="form-control" placeholder="Прізвище">
                            <error-div :form="form" field="surname" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Ім’я <span>*</span></label>
                            <input type="text" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" placeholder="Ім’я">
                            <error-div :form="form" field="name" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">По-батькові <span>*</span></label>
                            <input type="text" v-model="form.nickname" :class="{ 'is-invalid': form.errors.has('nickname') }" class="form-control" placeholder="По-батькові">
                            <error-div :form="form" field="nickname" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Телефон <span>*</span></label>
                            <input type="text" v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }" class="form-control" placeholder="Телефон">
                            <error-div :form="form" field="phone" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">E-mail <span>*</span></label>
                            <input type="text" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" placeholder="E-mail">
                            <error-div :form="form" field="email" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Пароль</label>
                            <input type="password" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" placeholder="">
                            <error-div :form="form" field="password" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <div class="hidden" style="display:none">
                                        <input type="file" id="file" ref="signImage" v-on:change="handleFileUpload()" accept="image/*" />
                                    </div>
                                    <label class="font-weight-bold">Підпис лікаря</label>
                                    <error-div :form="form" field="signImage" />

                                    <div class="image image-small" v-bind:style="{ backgroundImage: 'url(' + signImageUrl+ ')' }" @click="$refs.signImage.click()">
                                        <div class="svg">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 390 390" xml:space="preserve">
                                                <g id="XMLID_17_">
                                                    <path id="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"></path>
                                                    <path id="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"></path>
                                                </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="signInfo">
                                    <p>Для того щоб правильно відображався підпис на формі, потрібно його сфотографувати на білому фоні, та через серівс <a href="https://www.remove.bg/ru/upload">https://www.remove.bg/ru/upload</a> видалити фон. Після цього завантажити підпис без фону в систему</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <div class="hidden" style="display:none">
                        <input type="file" id="file" ref="avatarImage" v-on:change="changeAvatarImage()" accept="image/*" />
                    </div>
                    <label class="font-weight-bold">Аватар</label>
                    <error-div :form="form" field="avaImage" />
                    <div class="image image-sign w-100" v-bind:style="{ backgroundImage: 'url(' + avaImageUrl+ ')' }" @click="$refs.avatarImage.click()">
                        <div class="svg">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 390 390" xml:space="preserve">
                                <g id="XMLID_17_">
                                    <path id="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"></path>
                                    <path id="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"></path>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>
                        </div>
                    </div>
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
import Gate from "../../Gate";
export default {
    data() {
        return {
            signImageUrl: '',
            avaImageUrl:'',
            form: new Form({
                nickname: '',
                name: '',
                surname: '',
                phone: '',
                email: '',
                password: '',
                signImage: '',
                avaImage: ''
            }),
        }
    },
    mounted() {
        console.log(window.objectToFormData);
        this.fillProfile()
    },
    methods: {
        fillProfile() {
            this.form.get('/user/profile').then(({
                data
            }) => {
                console.log(data, 'data')
                this.form.nickname = data.user.nickname;
                this.form.name = data.user.name;
                this.form.surname = data.user.surname;
                this.form.phone = data.user.phone;
                this.form.email = data.user.email;
                this.signImageUrl = data.user.sign_image != null ? 'uploads/' + data.user.sign_image : '';
                this.avaImageUrl = data.user.avatar != null ? 'uploads/' + data.user.avatar : '';
            })

            // let user = this.$gate.getUser();
        },
        saveProfile() {
            this.form.submit('post', '/user/profile', {
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
                    console.log(data.data.user);
                    // this.$gate = new Gate(data.data.user);
                    this.$emit("update-header", data.data.user);
                    // this.$gate.update(data.data.user);
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });

                })
            // console.log(response,'response');
        },
        handleFileUpload() {
            this.form.signImage = this.$refs.signImage.files[0];
            this.signImageUrl = URL.createObjectURL(this.form.signImage);
        },
        changeAvatarImage(){
            this.form.avaImage = this.$refs.avatarImage.files[0];
            this.avaImageUrl = URL.createObjectURL(this.form.avaImage);
        }


    }
}
</script>
