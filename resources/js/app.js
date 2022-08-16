require('./bootstrap');
// require('jquery');
// global.jQuery = require('jquery');
// var $ = global.jQuery;
// window.$ = $;

import Vue from 'vue'
window.Vue = require('vue');
import moment from 'moment';

import objectToFormData from 'object-to-formdata';
window.objectToFormData = objectToFormData;
// Vue.use(ObjectToFD);
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
// Init plugin
Vue.use(Loading);

import VueNumberInput from '@chenfengyuan/vue-number-input';
import contenteditable from 'vue-contenteditable'
Vue.use(contenteditable)

import VTooltip from 'v-tooltip'
Vue.use(VTooltip)


import DatePick from 'vue-date-pick';
import 'vue-date-pick/dist/vueDatePick.css';
Vue.component('date-pick', DatePick);

import { Hooper, Slide } from 'hooper';
import 'hooper/dist/hooper.css';
Vue.component('hooper', Hooper);
Vue.component('slide', Slide);

// import Slick from 'vue-slick';
// import 'slick-carousel/slick/slick.css';
// Vue.component('slick', Slick);

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;


import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';

// import Select2 from 'v-select2-component';
// Vue.component('Select2', Select2);

import Swal from 'sweetalert2';


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
window.Swal = Swal;
window.Toast = Toast;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('vue-number-input', VueNumberInput);

/**
 * Routes imports and assigning
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import routes from './routes';

const router = new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: "active",
});

Vue.filter('myDate',function(created){
    return created == null ? '' : moment(created).format('DD.MM.YYYY');
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('register-form', require('./components/auth/Register.vue'));
Vue.component("error-div", () => import("./components/widgets/ErrorDiv"));
Vue.component("register-form", () => import("./components/auth/Register"));
Vue.component("pin-form", () => import("./components/auth/PinCode"));
Vue.component("login", () => import("./components/auth/Login"));
Vue.component("recovery", () => import("./components/auth/Recovery"));
Vue.component("new-password", () => import("./components/auth/NewPassword"));
Vue.component("first-payment", () => import("./components/payment/FirstPayment"));
Vue.component("patients", () => import("./components/patient/List"));
Vue.component("header-block", () => import("./components/layout/Header"));
Vue.component("header-mobile-block", () => import("./components/layout/HeaderMobile"));

Vue.component("patient-menu", () => import("./components/layout/PatientMenu"));
Vue.component("patient-card", () => import("./components/patient/Card"));
Vue.component("patient-form043", () => import("./components/patient/Form043"));
Vue.component("patient-agreements", () => import("./components/patient/Agreements"));
Vue.component("select-modal", () => import("./components/patient/SelectModal"));
Vue.component("patient-form043-print", () => import("./components/patient/Form043Print"));
Vue.component("patient-form025", () => import("./components/patient/FormOftalmolog"));
Vue.component("patient-form025-modal", () => import("./components/patient/Form025Modal"));
Vue.component("card-range-modal", () => import("./components/patient/CardRangeModal"));

Vue.component("new-patient", () => import("./components/patient/NewPatient"));

Vue.component("cabinet-menu", () => import("./components/layout/CabinetMenu"));
Vue.component("profile", () => import("./components/cabinet/Profile"));
Vue.component("clinic", () => import("./components/cabinet/Clinic"));
Vue.component("worker", () => import("./components/cabinet/Worker"));
Vue.component("payment", () => import("./components/cabinet/Payment"));
Vue.component("field-template", () => import("./components/cabinet/FieldTemplate"));

Vue.component("notification", () => import("./components/layout/Notifications"));
Vue.component("faq", () => import("./components/cabinet/Faq"));
Vue.component("video-list", () => import("./components/cabinet/Video"));

Vue.component("doctor-select2", () => import("./components/patient/DoctorsSelectModal"));
// Vue.component("profile", () => import("./components/cabinet/Profile"));

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            isPatientsPage: false,
            isCabinetsPage:false,
            user:{},
        }
    },
    mounted: function () {
    // `this` points to the vm instance
        this.user = this.$gate.getUser();
        this.checkPatientUrl();
        this.checkCabinetUrl();
    },
    methods: {
        checkPatientUrl() {
            if( ['patient-card','patient-form_043','patient-agreements','patient-form_oftol','patient-files'].includes(this.$route.name) ) {
                this.isPatientsPage = true
            } else {
                this.isPatientsPage = false
            }
        },
        checkCabinetUrl() {
            if(['profile','clinic','worker','payment','field-template','ticket-form','faq','video'].includes(this.$route.name) ) {
                this.isCabinetsPage = true
            } else {
                this.isCabinetsPage = false
            }
        },
        updateHeader(user){
            // this.user = user;
            this.user = Object.assign({}, this.user, user);
            console.log('asas',this.user);
        }
    },
    watch:{
        $route (to, from){
            this.checkPatientUrl();
            this.checkCabinetUrl();
            // this.show = false;
        }
    }

});
// app.component(VueNumberInput.name, VueNumberInput);
