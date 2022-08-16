<template>
<div class="container p-3 mb-4 patient-menu">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <router-link :to="{name:'patient-card',params:{id:id}}" class="nav-link">
                Карта пацієнта
            </router-link>
        </li>
        <li class="nav-item" v-if="$gate.isSpecStom()">
            <router-link :to="{name:'patient-form_043',params:{id:id}}" class="nav-link">
                Форма 043
            </router-link>
        </li>
        <li class="nav-item" v-if="!$gate.isSpecStom()">
            <router-link :to="{name:'patient-form_oftol',params:{id:id}}" class="nav-link">
                Форма 025
            </router-link>
        </li>
        <!-- <li class="nav-item">
            <router-link to="/patients/form_043" class="nav-link">
                Форма 043.1
            </router-link>
        </li> -->

        <li class="nav-item">
            <router-link :to="{name:'patient-agreements',params:{id:id}}" class="nav-link">
                Друк документів
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{name:'patient-files',params:{id:id}}" class="nav-link">
                Файли
            </router-link>
        </li>
    </ul>
</div>
</template>

<script>
export default {
    data() {
        return {
            id:''
            }
    },
    created(){
        this.id = this.$route.params.id
    }
}
</script>
