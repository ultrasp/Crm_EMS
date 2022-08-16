<template>
<div>
    <div class="cab">
        <div class="cab_containers">
            <div class="container container-settings container-payments">
                <div class="payments">

                    <div class="container_title">Продовження підписки</div>
                    Кількість вибранних користувачів {{this.users_ids.length}}
                    <div class="paymentsList" v-if="this.users_ids.length > 0">
                        <template v-for="item in ratePlans">
                            <div class="payment" v-if="item.has_coupon_code == 0">

                                <div class="price">{{getAmountText(item)}}<span>/{{item.name}}</span>
                                </div>
                                <div class="main mt-3 d-flex align-items-center justify-content-center">
                                    <div type="button" v-on:click="pay(item)">
                                        <img src="https://static.liqpay.ua/buttons/p1ru.radius.png" alt="">
                                    </div>
                                </div>
                                <p class="small mt-3 mb-0">{{item.description}}</p>
                            </div>
                        </template>
                        <div class="small text-secondary mt-3 mb-0">
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
            ratePlans: [],
            doctor_count: 1,
            promo_doctor_count: 1,
            user_email: '',
            promo_code: '',
            users_ids:[],
            invalid_promo_code: false
        }
    },
    mounted() {
        this.users_ids = JSON.parse(localStorage.getItem('pay_users'));
        this.getRatePlans();
        console.log(this.$route.query, 'this.$router')
    },
    methods: {
        promo_changed() {
            this.invalid_promo_code = false;
        },
        pay(item) {
            if (item.has_coupon_code == 1 && this.promo_code == '') {
                this.invalid_promo_code = true;
                return;
            }
            axios.post('/sub/payment', {
                    users_ids: this.users_ids,
                    rate_plane_id: item.id,
                })
                .then(({
                    data
                }) => {
                    if (data.redirect_url != undefined)
                        window.location.href = data.redirect_url;
                }).catch(e => {
                    Toast.fire({
                        icon: 'error',
                        title: e.response.data.error_
                    })
                });

        },
        getAmountText(item) {
            return parseFloat(this.users_ids.length * item.amount) + item.currency.symbol;
        },
        getRatePlans() {
            axios.get('/plan-list').then((response) => {
                this.ratePlans = response.data;
            });
        },

    }
}
</script>
