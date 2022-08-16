<template>
    <div class="container container-settings video-faq">
        <div class="container_title">FAQ</div>


        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a v-for="faq in faqs" :class="{'active': selId == faq.id}" class="list-group-item list-group-item-action flex-column align-items-start"
                       v-on:click="selTab(faq)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{faq.title}}</h5>
                        </div>
                        <p class="mb-1" :class="{'d-none':selId != faq.id}" v-html="faq.description"></p>
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
                faqs: [],
                selId: 0,
            }
        },
        mounted() {
            this.getFaqs();
        },
        methods: {
            getFaqs() {
                return axios.get('/faqs/list').then(res => {
                    this.faqs = res.data.faqs;
                    if (this.faqs.length > 0)
                        this.selId = this.faqs[0].id;
                });
            },
            selTab(faq) {
                this.selId = faq.id;
            }
        }
    }
</script>
