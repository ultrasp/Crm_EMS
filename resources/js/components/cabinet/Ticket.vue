<template>
    <div class="container container-settings">
        <div class="container_title">Форма зворотної зв'язку</div>
        <form @submit.prevent="saveTicket" @keydown="form.onKeydown($event)" style="width:100%">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Тема</label>
                                <input type="text" v-model="form.title"
                                       :class="{ 'is-invalid': form.errors.has('title') }" class="form-control"
                                       placeholder="Тема">
                                <error-div :form="form" field="title"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Опис</label>
                                <textarea v-model="form.question" :class="{ 'is-invalid': form.errors.has('question') }"
                                          class="form-control" placeholder="Опис питання"></textarea>
                                <error-div :form="form" field="question"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Файл</label>
                                <input style="padding: 3px;" class="form-control" type="file" id="file" ref="logoImage"
                                       v-on:change="handleFileUpload($event)"/>
                                <error-div :form="form" field="file"/>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="buttons">
                        <button :disabled="form.busy" type="submit" class="btn-my">Відправити</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            logoImageUrl: '',
            form: new Form({
                title: '',
                question: '',
                file: ''
            }),
        }
    },
    mounted() {
    },
    methods: {
        saveTicket() {
            let loader = this.$loading.show();
            this.form.submit('post', '/ticket/add', {
                // Transform form data to FormData
                transformRequest: [function (data, headers) {
                    return objectToFormData.serialize(data)
                }],

                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    // console.log(e)
                }
            })
                .then(data => {
                    console.log(data);
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });
                    this.form.reset();
                    this.$refs.logoImage.value = null;
                })
                .catch(error => console.log(error))
                .then(() => {
                    loader.hide()
                })
            // console.log(response,'response');
        },
        handleFileUpload($event) {
            this.form.file = $event.target.files[0];
        },

    }
}
</script>
