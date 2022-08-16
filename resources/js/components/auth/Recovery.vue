<template>
<div class="sauth">
    <div class="wr">
        <div class="auth">
            <div class="auth_head">
                <div class="title">Відновлення паролю</div>
            </div>
            <form @submit.prevent="recovery" @keydown="form.onKeydown($event)" style="width:100%">
                <div class="inputs">
                    <div class="input "><input name="email" required v-model="form.email" type="email" placeholder="Введіть Email" value=""></div>
                    <div class="button">
                        <button :disabled="form.busy" type="submit" class="btn-my btn-blue">Відновити</button>
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
            }),
        }
    },
    mounted() {},
    methods: {
        recovery() {
            let loader = this.$loading.show();
            this.form.post('/recovery')
                .then(({
                    data
                }) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    })
                    console.log(data)
                }).catch(error => {
                    console.log(error.response.data.error_);
                    Toast.fire({
                        icon: 'error',
                        title: error.response.data.error_
                    })
                })
                .then(() => {
                    loader.hide()
                });
        },
    }
}
</script>
