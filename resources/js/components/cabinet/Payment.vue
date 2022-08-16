<template>
<div class="container container-settings">
    <div class="container_title">Оплати</div>

    <div class="main">
        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <td>#</td>
                    <td>Сума</td>
                    <td>Час</td>
                    <td>Коментар</td>
                </thead>
                <tbody>
                    <tr v-for="payment in payments">
                        <td>{{payment.id}}</td>
                        <td>{{parseFloat(payment.price) * payment.doctor_count}} грн</td>
                        <td>{{payment.updated_at | myDate}}</td>
                        <td>
                            Оплачено за {{payment.doctor_count}} користувача(ів) на {{payment.payed_days == 0 ? payment.pay_days : payment.payed_days }} день/днів
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--        <div class="buttons">-->
        <!-- <div class="btn-my">Зберегти</div> -->
        <!--        </div>-->
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            payments: []
        }
    },
    mounted() {
        this.getPayments();
    },
    methods: {
        getPayments() {
            return axios.get('/sub/payments').then(res => {
                this.payments = res.data.payments;
            });
        },
    }
}
</script>
