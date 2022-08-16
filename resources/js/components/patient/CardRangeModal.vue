<template>
<div class="modal modal-fields modal-themes" :class="{ 'active': showModal}">
    <div class="modal_container">
        <div class="close" v-on:click="save(true)">×</div>
        <h3>Кількість\діапазон карток пацієнтів </h3>
        <div>
            <div class="form-group">
                <input class="form-control" v-model="range" />
                Повинен бути в форматі 1-30 або 1,2,5
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
    props: ["showModal"],
    data() {
        return {
            range: "",
            toggleModal: this.showModal,
        }
    },
    mounted() {},
    methods: {
        save(isClose = false) {
            if (isClose) {
                this.range = "";
            }
            if (this.range != '' || isClose) {
                this.$emit('closed', this.range);
                this.range = "";
            }
        }
    },
    watch: {}
}
</script>
