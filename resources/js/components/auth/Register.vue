<template>
    <div>
        <div class="sauth">
            <div class="wr">
                <div class="auth auth-signup" v-if="!isSaved">
                    <div class="auth_head">
                        <div class="title">Реєстрація</div>
                    </div>
                    <div class="inputs">
                        <form @submit.prevent="register" @keydown="form.onKeydown($event)" style="width:100%">
                            <div class="input  ">
                                <input type="text" v-model="form.surname" placeholder="Прізвище" value="" :class="{ 'is-invalid': form.errors.has('surname') }">
                                <error-div :form="form" field="surname"/>
                            </div>
                            <div class="input  ">
                                <input type="text" name="" v-model="form.name" placeholder="Ім’я" value="" :class="{ 'is-invalid': form.errors.has('name') }">
                                <error-div :form="form" field="name"/>
                            </div>
                            <div class="input  ">
                                <input type="text" name="" v-model="form.nickname" placeholder="По-батькові" value="" :class="{ 'is-invalid': form.errors.has('nickname') }">
                                <error-div :form="form" field="nickname"/>
                            </div>
                            <div class="input  ">
                                <input type="tel" name="" v-model="form.phone" placeholder="Телефон" value="" :class="{ 'is-invalid': form.errors.has('phone') }">
                                <error-div :form="form" field="phone"/>
                            </div>
                            <div class="input  full">
                                <input type="email" v-model="form.email" name="email" placeholder="Email" value="i.bionic.office@gmail.com" :class="{ 'is-invalid': form.errors.has('email') }">
                                <error-div :form="form" field="email"/>
                            </div>
                            <div class="input  full">
                                <input type="password" v-model="form.password" name="" placeholder="Пароль" value="i.bionic.office@gmail.com" :class="{ 'is-invalid': form.errors.has('password') }">
                                <error-div :form="form" field="password"/>
                            </div>
                            <div class="input  full" v-if="this.$route.query.invite == undefined">
                                <select v-model="form.specialization" :class="{ 'is-invalid': form.errors.has('specialization') }">
                                    <option value="">Оберіть спеціалізацію</option>
                                    <option v-for="item in specList" :value="item.id">{{item.value}}</option>
                                </select>
                                <error-div :form="form" field="specialization"/>

                            </div>
                            <div class="button">
                                <button :disabled="form.busy" type="submit" class="btn-my btn-blue">Створити профіль</button>
                            </div>
                        </form>
                        <div class="links"><a href="/login">Вже заєстровані?</a></div>
                    </div>
                </div>
                <div v-else class="cab">
                    <div class="cab_containers">
                        <div class="container container-settings container-payments">
                            <div class="payments">
                                <div class="container_title">Ви успішно зареєструвались. <br> Перевірте пошту та активуйте аккаунт</div>
                            </div>
                        </div>
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
                form: new Form({
                    nickname: '',
                    name: '',
                    surname: '',
                    phone: '',
                    email: '',
                    password: '',
                    specialization: '',
                    invite_code: ''
                }),
                specList: [],
                isSaved: false
            }
        },
        mounted() {
            console.log(this.$route.query.invite,'Register mounted.');
            this.setSpecList();
        },
        methods: {
            register() {
                
                this.form.invite_code = (this.$route.query.invite == undefined) ? '' : this.$route.query.invite;
                // Submit the form via a POST request
                let loader = this.$loading.show();

            this.form.post('/register')
                .then(({
                    data
                }) => {
                    // console.log(data);
                    if( data.success == 1 ){
                        this.isSaved = true;
                        // console.log('asas');
                        // window.location.href = data.url;
                        if(data.url != '')
                            window.location.href = data.url;
                    }
                    // console.log(data)
                })
                .catch(error => {
                    if(error.response.status == 500){
                        Swal.fire(
                            'Помилка!',
                            'Файл: ' +error.response.data.file + ' рядок : '+ error.response.data.line + ' Помилка: ' +error.response.data.message,
                            'error'
                        );

                    }
                    })
                .then(()=>{
                    loader.hide()
                })
        },
        setSpecList() {
            this.specList = [{
                id: 1,
                value: 'Стоматологія'
            }, {
                id: 2,
                value: 'Офтальмологія'
            }];
        }
    }
}
</script>
