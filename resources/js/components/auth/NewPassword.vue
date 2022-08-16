<template>
<div class="sauth">
    <div class="wr">
        <div class="auth">
            <div class="auth_head">
                <div class="title">Створення нового паролю</div>
            </div>
            <form @submit.prevent="login" @keydown="form.onKeydown($event)" style="width:100%">
                <div class="inputs">
                    <div class="input ">
                        <input name="email" required v-model="form.password" type="password" placeholder="Введіть новий пароль" value="" :class="{ 'is-invalid': form.errors.has('password') }">
                        <error-div :form="form" field="password" />

                    </div>
                    <div class="button">
                        <button :disabled="form.busy" type="button" class="btn-my" v-on:click="saveNewPassword">Змінити</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'pin-form',
    data() {
        return {
            // Create a new form instance
            form: new Form({
                password: '',
                email: '',
                token: ''
            }),
        }
    },
    mounted() {},
    methods: {
        saveNewPassword() {
            console.log(this.form, 'form');
            if (this.form.password == '')
                return;
            // console.log(this.$route,'this.$route');
            // return;
            this.form.email = this.$route.query.email;
            this.form.token = this.$route.params.token;
            // Submit the form via a POST request
            this.form.post('/save/new-password')
                .then(({
                    data
                }) => {
                    this.$router.push({
                        name: 'patients'
                    })
                }).catch(e => Toast.fire({
                    icon: 'error',
                    title: e.error_
                }));
        },
    }
}
</script>
