<template>
<div class="sauth">
    <div class="wr">
        <div class="auth">
            <div class="auth_head">
                <div class="title">Вхід</div>
            </div>
            <form @submit.prevent="login" @keydown="form.onKeydown($event)" style="width:100%">
                <div class="inputs">
                    <div class="input ">
                        <span>Email</span>
                        <input type="email" required v-model="form.email" name="email" placeholder="Email" value="i.bionic.office@gmail.com" :class="{ 'is-invalid': form.errors.has('email') }">
                        <error-div :form="form" field="email" />
                    </div>
                    <div class="input ">
                        <span>Пароль</span>
                        <input type="password" required v-model="form.password" name="password" placeholder="Пароль" :class="{ 'is-invalid': form.errors.has('email') }">
                        <error-div :form="form" field="password" />
                    </div>
                    <div class="button">
                        <button :disabled="form.busy" type="submit" class="btn-my btn-blue">Вхід</button>
                    </div>
                    <div class="links">
                        <router-link to="/recovery">Забули пароль?</router-link>
                    </div>
                </div>
            </form>
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
                email: '',
                password: '',
            }),
        }
    },
    mounted() {},
    methods: {
        login() {
            // Submit the form via a POST request
            this.form.post('/login')
                .then(({
                    data
                }) => {
                    if(data.redirect != '')
                    window.location.href = data.redirect;
                    // console.log(data)
                }).catch(e => {
                    Toast.fire({
                        icon: 'error',
                        title: e.response.data.error_
                    })
                });

        },
    }
}
</script>
