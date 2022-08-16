<template>
<patient-form043 v-if="$gate.isSpecStom()" ref="form043"></patient-form043>
<patient-form025 v-else ref="form025"></patient-form025>
</template>

<script>
export default {
    data() {
        return {
        }
    },
    beforeRouteLeave (to, from, next) {
        console.log(this.$refs,'this.$refs');
        if(this.$gate.isSpecStom()){
            this.$refs.form043.onRouteChange(to, from, next);
        }else{
            this.$refs.form025.onRouteChange(to, from, next);
        }
        console.log(to,from,'to,from');
    }
}
</script>
