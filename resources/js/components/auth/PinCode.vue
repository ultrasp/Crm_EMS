<template>
<div>
    <div class="cab">
        <div class="cab_containers">
            <div class="container container-activation   container-settings container-payments">
                <div class="title">Введіть код активації</div>
                <div class="input  ">
                    <input type="text" required v-model="form.pincode" placeholder="Код з email" value="" :class="{ 'is-invalid': form.errors.has('pincode') }">
                    <error-div :form="form" field="pincode" />
                </div>
                <div class="button">
                    <button :disabled="form.busy" type="button" class="btn-my" v-on:click="checkPincode">Відправити</button>
                </div>
            </div>
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
                pincode: '',
            }),
        }
    },
    mounted() {},
    methods: {
        checkPincode() {
            console.log(this.form,'form');
            if (this.form.pincode == '')
                return;
            // Submit the form via a POST request
            this.form.post('/check-pincode')
                .then(({
                    data
                }) => {
                    this.$router.push({ name: 'payment' })
                }).catch(e => Toast.fire({
                    icon: 'error',
                    title: e.error_
                }));
        },
    }
}
</script>
