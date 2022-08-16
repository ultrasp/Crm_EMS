<template>
<div>
    <div class="cab" v-if="showPromoCodeForm">
        <div class="cab_containers">
            <div class="container container-activation   container-settings container-payments">
                <div class="title">Введіть промокод</div>
                <div class="input">
                    <!-- <div class="warn">Неправильний промокод</div> -->
                    <error-div :form="promoForm" field="code" />
                    <input type="text" v-model="promoForm.code" :class="{ 'is-invalid': promoForm.errors.has('code') }" class="form-control" placeholder="Промокод">
                </div>
                <a href="#" class="btn-my" v-on:click="checkPromo()">Відправити</a>

                <a v-on:click="noPromo()">Немає промокоду</a>
            </div>
        </div>
    </div>
    <div class="cab" v-if="!showPromoCodeForm && !hasPromo">
        <div class="cab_containers">
            <div class="container container-settings container-payments">
                <div class="payments">

                    <div class="container_title">Оформлення підписки</div>
                    <p class="text-muted">Профіль буде активований після оплати</p>

                    <div class="input  full mx-auto d-flex align-items-center justify-content-center" style="max-width: 200px; ">
                        Виберіть кількіть лікарів
                        <div class="input   text-center mt-2 mb-0" style="max-width: 150px; ">
                            <vue-number-input v-model="doctor_count" :min="1" :max="30" inline controls></vue-number-input>
                        </div>
                    </div>

                    <div class="paymentsList">
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
                            *Після закінчення тестової підписки, автоматично Ваш аккаунт буде переведено на щомісячну підписку.
                            <br>
                            *Щомісячна підписка автоматично подовжується кожен місяць, річна підписка автоматично подовжується кожен рік, до того часу,
                            поки не буде зроблена відміна мінімув за 24 години до закінчення поточного підписаного періоду
                            <br>
                            Проплата списується автоматичного з Вашого облікового аккаунту протягом 24годин до закінчення поточного періоду підписки.
                            <br>
                            Ви в будь-який час можете відключити автоматичне відновлення підписки в налаштування свого аккаунту.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="cab" v-if="!showPromoCodeForm && hasPromo">
        <div class="cab_containers">
            <div class="container container-settings container-payments">
                <div class="payments">
                    <div class="container_title">Оформлення підписки по промокоду</div>
                    <p class="text-muted">Профіль буде активований після оплати</p>

                    <div class="input  full mx-auto d-flex flex-column justify-content-center align-items-center">
                        <span class="mt-2">Виберіть кількіть лікарів</span>
                        <div class="input   text-center mt-0 mb-0" style="max-width: 150px; ">
                            <vue-number-input v-model="promo_doctor_count" :min="1" :max="30" inline controls></vue-number-input>
                        </div>
                    </div>

                    <div class="paymentsList">
                        <template v-for="item in ratePlans">
                            <div class="payment mx-auto" v-if="item.has_coupon_code == 1">
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
                            *Після закінчення тестової підписки, автоматично Ваш аккаунт буде переведено на щомісячну підписку.
                            <br>
                            *Щомісячна підписка автоматично подовжується кожен місяць, річна підписка автоматично подовжується кожен рік, до того часу,
                            поки не буде зроблена відміна мінімув за 24 години до закінчення поточного підписаного періоду
                            <br>
                            Проплата списується автоматичного з Вашого облікового аккаунту протягом 24годин до закінчення поточного періоду підписки.
                            <br>
                            Ви в будь-який час можете відключити автоматичне відновлення підписки в налаштування свого аккаунту.
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
            showPromoCodeForm: true,
            hasPromo: false,
            ratePlans: [],
            doctor_count: 1,
            promo_doctor_count: 1,
            promo_code: '',
            invalid_promo_code: false,
            promoForm: new Form({
                code: '',
            }),
        }
    },
    mounted() {
        this.getRatePlans();
    },
    methods: {
        noPromo() {
            this.showPromoCodeForm = false;
        },
        promo_changed() {
            this.invalid_promo_code = false;
        },
        checkPromo() {
            this.promoForm.submit('post', '/promo/check')
                .then(data => {
                    this.promo_code = this.promoForm.code;
                    this.showPromoCodeForm = false;
                    this.hasPromo = true;
                    // console.log(data);
                    // Toast.fire({
                    //     icon: 'success',
                    //     title: data.data.message
                    // });
                })

        },
        pay(item) {
            // if (item.has_coupon_code == 1 && this.promo_code == '') {
            //     this.invalid_promo_code = true;
            //     return;
            // }
            axios.post('/payment/start', {
                    doctor_count: item.has_coupon_code == 1 ? this.promo_doctor_count : this.doctor_count,
                    rate_plane_id: item.id,
                    promo_code: this.promo_code
                })
                .then(({
                    data
                }) => {
                    if (data.redirect_url != undefined)
                        window.location.href = data.redirect_url;
                }).catch(error => {
                    if (error.response.status == 500)
                        Swal.fire(
                            'Помилка!',
                            'Файл: ' + error.response.data.file + ' строка : ' + error.response.data.line + ' Помилка: ' + error.response.data.message,
                            'error'
                        )
                    else
                        Toast.fire({
                            icon: 'error',
                            title: e.response.data.message
                        })
                });

        },
        getAmountText(item) {
            return parseFloat((item.has_coupon_code ? this.promo_doctor_count : this.doctor_count) * item.amount) + item.currency.symbol;
        },
        getRatePlans() {
            axios.get('/plan-list').then((response) => {
                this.ratePlans = response.data;
            });
        },

    }
}
</script>
