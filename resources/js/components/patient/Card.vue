<template>
<div class="container container-settings ml-0 mr-0">

    <div class="container_title">Карта пацієнта</div>

    <form @submit.prevent="save" @keydown="form.onKeydown($event)" style="width:100%">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Прізвище</label>
                    <input type="text" v-model="form.lastname" :class="{ 'is-invalid': form.errors.has('lastname') }" class="form-control" placeholder="Введіть прізвище">
                    <error-div :form="form" field="lastname" />

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Ім'я</label>
                    <input type="text" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" placeholder="Введіть ім'я">
                    <error-div :form="form" field="name" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">По батькові</label>
                    <input type="text" v-model="form.surname" :class="{ 'is-invalid': form.errors.has('surname') }" class="form-control" placeholder="Введіть по батькові">
                    <error-div :form="form" field="surname" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Дата нарождення</label>
                    <date-pick v-model="form.birthday" :inputAttributes="{placeholder:'Вкажіть дату нарождення',class:'form-control'}"   :class="{ 'is-invalid': form.errors.has('birthday') }" :displayFormat="dateFormatDots" :weekdays="weekdays" :months="months"></date-pick>
                    <error-div :form="form" field="birthday" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Номер телефону</label>
                    <input type="text" v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }" class="form-control" placeholder="Вкажіть номер телефону">
                    <error-div :form="form" field="phone" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Адреса</label>
                    <input type="text" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }" class="form-control" placeholder="Вкажіть адресу">
                    <error-div :form="form" field="address" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="text" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" placeholder="Вкажіть email">
                    <error-div :form="form" field="email" />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Стать</label>

                    <div class="d-flex align-items-start justify-content-start">
                        <div class="form-check mr-3">
                            <input class="form-check-input" v-model="form.gender" type="radio" name="exampleRadios" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                Чоловік
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="form.gender" name="exampleRadios" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                Жінка
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Номер карти пацієнта</label>
                    <input type="text" v-model="form.card_number" :class="{ 'is-invalid': form.errors.has('card_number') }" class="form-control" placeholder="Вкажіть номер карти">
                    <error-div :form="form" field="card_number" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="font-weight-bold">Коментар</label>
                    <textarea class="form-control" v-model="form.comment" :class="{ 'is-invalid': form.errors.has('comment') }" name="" rows="5" placeholder="Введіть коментар"></textarea>
                    <error-div :form="form" field="comment" />
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
            patientId: '',
            // Create a new form instance
            form: new Form({
                id:'',
                lastname: '',
                name: '',
                surname: '',
                birthday: '',
                phone: '',
                address: '',
                email: '',
                gender: '1',
                card_number: '',
                comment: '',
            }),
            dateFormatDots: 'DD.MM.YY',
            weekdays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        }
    },
    mounted() {
        this.patientId = this.$route.params.id;
        if (this.patientId != '')
            this.getPatient();
    },
    methods: {
        save() {
            this.form.id = this.patientId;
            this.form.post('/patient-card/store')
                .then(({
                    data
                }) => {
                    console.log(data)
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });
                    // this.$router.push({
                    //     name: '/patients'
                    // })
                })
        },
        getPatient() {
            this.form.get('/patient/get/'+ this.patientId)
                .then(({
                    data
                }) => {
                    this.form.lastname = data.patient.lastname;
                    this.form.name = data.patient.name;
                    this.form.surname = data.patient.surname;
                    this.form.birthday = data.patient.birthday;
                    this.form.phone = data.patient.phone;
                    this.form.address = data.patient.address;
                    this.form.email = data.patient.email;
                    this.form.gender = data.patient.gender ?? '1';
                    this.form.card_number = data.patient.card_number;
                    this.form.comment = data.patient.comment;
                    console.log(data)
                })
        },
    }
}
</script>
