<template>
    <div class="container p-4 mb-4">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                    Профіль
                </router-link>
            </li>
            <li class="nav-item" v-if="!$gate.isDoctor()">
                <router-link to="/clinic" class="nav-link">
                    Клініка
                </router-link>
            </li>
            <li class="nav-item" v-if="!$gate.isDoctor()">
                <router-link to="/worker" class="nav-link">
                    Працівники
                </router-link>
            </li>
            <li class="nav-item" v-if="!$gate.isDoctor()">
                <router-link to="/payment" class="nav-link">
                    Оплати
                </router-link>
            </li>

            <li class="nav-item" v-if="!$gate.isDoctor()">
                <router-link to="/field-template" class="nav-link">
                    Збережені поля
                </router-link>
            </li>


            <li class="nav-item">
                <router-link to="/ticket/form" class="nav-link">
                    Зворотній зв'язок
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/faq" class="nav-link">
                    FAQ
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/video/list" class="nav-link">
                    Відео
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
    }
</script>
