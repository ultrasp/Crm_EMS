<template>
<div class="container container-settings video-faq">
    <div class="container_title">Відео інструкції</div>


        <div class="row ">
            <div class="col-md-12">
                <div class="list-group">
                    <a v-for="item in items" :class="{'active': selId == item.id}" class="list-group-item list-group-item-action flex-column align-items-start" v-on:click="selTab(item)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{item.title}}</h5>
                        </div>
                        <div class="mb-1" :class="{'d-none':selId != item.id}" v-html="item.description"></div>
                        <div :class="{'d-none':selId != item.id}">
                            <video width="320" height="240" controls v-if="item.type == 1">
                                <source :src="item.video">
                                Ваш браузер не підтримує відеотег.
                            </video>
                            <div v-if="item.type == 2" v-html="item.video_url">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

</div>
</template>

<script>
export default {
    data() {
        return {
            items: [],
            selId: 0,
        }
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems() {
            return axios.get('/video-list').then(res => {
                this.items = res.data.videos;
                if (this.items.length > 0)
                    this.selId = this.items[0].id;
            });
        },
        selTab(item) {
            this.selId = item.id;
        }
    }
}
</script>
