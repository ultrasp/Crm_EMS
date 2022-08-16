<template>
    <div class="cab">
        <div class="cab_containers">
            <div class="container container-settings container-payments">
                <div class="payments">
                    <div class="container_title">Дякуємо ваша оплата прийнята. Ви будете автоматично перенаправлені на сторінку оплат.</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {}
    },
    mounted() {
        this.redirectToPayments()
    },
    methods: {
        redirectToPayments() {
            const  app = this;
            setTimeout(function () {
                app.$router.push({
                    name: 'payment'
                });
            }, 7000);

        },
    }
}
</script>
