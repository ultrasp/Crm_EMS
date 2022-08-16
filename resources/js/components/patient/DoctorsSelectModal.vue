<template>
<div class="modal modal-fields modal-themes" :class="{ 'active': showModal}">
    <div class="modal_container">
        <div class="close" v-on:click="save(true)">×</div>
        <h3>{{title}}</h3>
        <div>
            <div class="form-group" lang="uk">
                <v-select v-model="selDoctors" multiple  :options="doctors" :reduce="doctor => doctor.id" :placeholder="'Виберіть лікаря'">
	                <div slot="no-options">Лікаря не знайдено</div>
                </v-select>
                <!-- <Select2 v-model="selDoctors" :options="doctors" :placeholder="'Виберіть лікаря'" :settings="{multiple:true,language: 'uk'}" /> -->
            </div>
        </div>
        <div class="btn btn-blur mt-2" v-on:click="save()">Зберегти</div>
    </div>
</div>
</template>

<style>
.select2-container {
    min-width: 200px;
}
</style>

<script>
export default {
    props: ["patientId", "showModal"],
    data() {
        return {
            doctors: [],
            selDoctors: [],
            toggleModal: this.showModal,
            title: 'Надати доступ до пацієнта'
        }
    },
    mounted() {
        this.getDoctors();
        // this.getSelectedDoctors();
    },
    methods: {
        getDoctors() {
            return axios.get('/sub/doctors').then(res => {
                this.doctors = res.data.doctors;
            })
        },
        getSelectedDoctors() {
            return axios.get('/patient/doctors/' + this.patientId).then(res => {
                this.selDoctors = res.data.selDoctors;
            })
        },
        save(force = false) {
            if (force) {
                this.$emit('attached');
                return;
            }
            axios.post('/patient/attach-doctor', {
                    patientId: this.patientId,
                    doctors_id: this.selDoctors
                })
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                    this.$emit('attached');
                    this.selDoctors = [];
                })
                .catch(err => alert(err));
        },
    },
    watch: {
        patientId: function (newVal, oldVal) { // watch it
            this.getSelectedDoctors();
            console.log('Prop changed: ', newVal, ' | was: ', oldVal)
        }
    }
}
</script>
