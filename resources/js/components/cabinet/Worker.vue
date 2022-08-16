<template>
<div class="container container-settings">
    <div class="container_title">Працівники клініки</div>

    <div class="row">
        <div class="col-12 col-md-9">
            <div class="row" v-for="admin in admins">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Власник клініки</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" v-model="checked_users" :value="admin.id" v-tooltip="'Натисніть, щоб вибрати та продовжити підписку'">
                                </div>
                            </div>
                            <input type="text" class="form-control" disabled placeholder="Введіть Email" :value="admin.email">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 ">
                </div>
                <div class="col-12 col-md-4 pt-33">
                    <div v-bind:class="{'text-danger':isLessThenMonth(admin.end_date)}">
                        Доступ до <span>{{admin.end_date | myDate}}</span>
                    </div>
                </div>
            </div>
            <div class="row" v-for="(manager,index) in managers">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Адміністратор клініки {{index + 1}}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div style="width:10px"></div>
                                    <!-- <input type="checkbox" v-model="checked_users" :value="manager.id" v-tooltip="'Натисніть, щоб вибрати та продовжити підписку'"> -->
                                </div>
                            </div>
                            <input type="text" :disabled="manager.user_id > 0" class="form-control" :class="{ 'is-invalid': manager_errors[index] }" placeholder="Введіть Email" v-model="manager.email">
                        </div>
 <div class="warn">{{manager_errors[index]}}</div>

                    </div>
                </div>
                <div class="col-12 col-md-2 ">
                    <div class="d-flex align-items-center justify-content-start pt-33">
                        <button type="button" class="btn btn-primary mr-3" v-on:click="sendEmail(manager,index,false)" v-tooltip="'Відправити запрошення адміністратору на пошту'"><i class="fas fa-envelope"></i></button>
                        <button type="button" class="btn btn-danger" v-on:click="delUser(manager,index)" v-tooltip="'Очистити дані адміністратора, щоб додати іншого'"><i class="fas fa-user-times"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4 pt-33">
                    <div v-bind:class="{'text-danger':isLessThenMonth(manager.end_date)}">
                        Доступ до <span>{{ manager.end_date | myDate }}</span>
                    </div>
                </div>
            </div>
            <div class="row" v-for="(doctor,index) in doctors">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Лікар {{index + 1}}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" v-if="doctor.id > 0">
                                <div class="input-group-text">
                                    <input type="checkbox" v-model="checked_users" :value="doctor.id" v-tooltip="'Натисніть, щоб вибрати та продовжити підписку'">
                                </div>
                            </div>
                            <input type="text" class="form-control" :class="{ 'is-invalid': doc_errors[index] }" :disabled="doctor.user_id > 0" placeholder="Введіть Email" v-model="doctor.email">
                        </div>
                        <div class="warn">{{doc_errors[index]}}</div>

                    </div>
                </div>
                <div class="col-12 col-md-2 ">
                    <div class="d-flex align-items-center justify-content-start pt-33">
                        <button type="button" v-if="doctor.end_date != null" class="btn btn-primary mr-3" v-on:click="sendEmail(doctor,index,true)" v-tooltip="'Відправити запрошення лікарю на пошту'"><i class="fas fa-envelope"></i></button>
                        <button type="button" v-on:click="delUser(doctor,index)" class="btn btn-danger" v-tooltip="'Очистити дані лікаря, щоб додати іншого'"><i class="fas fa-user-times"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4 pt-33">
                    <div v-bind:class="{'text-danger':isLessThenMonth(doctor.end_date)}" v-if="doctor.end_date != null">
                        Доступ до <span>{{ doctor.end_date | myDate }}</span>
                    </div>
                    <div class="text-danger" v-else>
                        Неоплачений працівник
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="btn-my ml-0 mr-auto" v-on:click="addDoctor()">Додати працівника</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="buttons">
                <div class="btn-my  ml-auto" v-on:click="doPay()" v-tooltip="'Виберіть лікарів, яким хочете продовжити підписку'">Продовжити підписку</div>
                <div class="btn-my  ml-3 bg-success" v-on:click="saveChanges()">Зберегти</div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            sub: {},
            admins: [],
            managers: [],
            doctors: [],
            doc_invites: [],
            manage_invites: [],
            doc_errors: {},
            manager_errors: {},
            checked_users: []
        }
    },
    mounted() {
        this.getSubInfo();
    },
    methods: {
        sendEmail(invite,indx,isDoctor) {
            if (invite.email == null || invite.email == '') {
                Toast.fire({
                    icon: 'warning',
                    title: 'Заповніть поля та повторіть відправку'
                });
                return;
            }
            let loader = this.$loading.show();
            return axios.post('/invite/sendEmail', {
                    id: invite.id,
                    email:invite.email
                })
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    });
                })
                .catch(error => {
                    if (error.response.status == 500) {
                        Swal.fire(
                            'Помилка!',
                            'Файл: ' + error.response.data.file + ' рядок : ' + error.response.data.line + ' Помилка: ' + error.response.data.message,
                            'error'
                        );

                    }
                    if (error.response.status == 422) {
                        var errors = error.response.data.errors;
                        console.log(this.doc_errors, errors, 'error');
                        let keys = Object.keys(errors);
                        for (let index = 0; index < keys.length; index++) {
                            let value = errors.[keys[index]];
                            let errorString = value.join(". ");
                            if (isDoctor) {
                                this.doc_errors[indx] = errorString;
                            } else {
                                this.manager_errors[indx] = errorString;
                            }
                            this.doc_errors = Object.assign({}, this.doc_errors);
                            this.manager_errors = Object.assign({}, this.manager_errors);
                        }
                    }

                })
                .then(() => {
                    loader.hide()
                })
        },
        isLessThenMonth(end_date) {
            var monthAheadTime = new Date().getTime() + (30 * 24 * 60 * 60 * 1000);
            var endSubDate = new Date(end_date).getTime();
            return (endSubDate < monthAheadTime)
        },
        getSubInfo() {
            return axios.get('/sub/info').then(res => {
                this.sub = res.data.subscribe;
                this.admins = res.data.email_list.admins;
                this.managers = res.data.email_list.managers;
                this.doctors = res.data.email_list.doctors;
            });
        },
        addDoctor() {
            this.doctors.push({
                id: 0,
                email: '',
                user_id: 0,
                end_date: null
            });
        },
        delUser(doctor, index) {
            if (doctor.id == 0) {
                this.doctors.splice(index, 1);
            } else {
                axios.post('/invite/delete', {
                    id: doctor.id
                }).then(res => {
                    if (res.data.is_removed == 1) {
                        this.getSubInfo();
                        Toast.fire({
                            icon: 'success',
                            title: res.data.message
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: res.data.message
                        });
                    }
                });

            }
        },
        doPay() {
            console.log(this.checked_users, 'this.checked_users');
            if (this.checked_users.length == 0) {
                Toast.fire({
                    icon: 'error',
                    title: 'Лікар не вибраний'
                });
                return;
            }
            localStorage.setItem("pay_users", JSON.stringify(this.checked_users));
            this.$router.push({
                name: 'sub-payment'
            });
        },
        saveChanges() {
            console.log(this.doc_invites, 'doc_invites');
            this.doc_errors = [];
            this.manager_errors = [];
            return axios.post('/invite/store', {
                    doc_invites: this.doctors,
                    manage_invites: this.managers
                })
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    });
                    this.getSubInfo();
                    // console.log(res, 'res')
                })
                .catch(error => {
                    if (error.response.status == 500) {
                        Swal.fire(
                            'Помилка!',
                            'Файл: ' + error.response.data.file + ' рядок : ' + error.response.data.line + ' Помилка: ' + error.response.data.message,
                            'error'
                        );

                    }
                    if (error.response.status == 422) {
                        var errors = error.response.data.errors;
                        console.log(this.doc_errors, errors, 'error');
                        let keys = Object.keys(errors);
                        for (let index = 0; index < keys.length; index++) {
                            let value = errors. [keys[index]];
                            let k = keys[index].split(".");
                            console.log(this.doc_errors, 'this.doc_errors');
                            if (k[0] == 'doc_invites') {
                                this.doc_errors[k[1]] = value[0];
                            } else {
                                this.manager_errors[k[1]] = value[0];
                            }
                            this.doc_errors = Object.assign({}, this.doc_errors);
                            this.manager_errors = Object.assign({}, this.manager_errors);
                        }
                    }

                })
        }
    }
}
</script>
