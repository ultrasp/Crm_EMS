<template>
<div class="container container-settings ml-0 mr-0">

    <div class="container_title">
        Файли
        <div class="float-right">Доступно {{empty_space}}MB з {{total_space}} MB</div>
    </div>

    <div class="row">
        <div class="col-12">
            <form @submit.prevent="saveFile" @keydown="form.onKeydown($event)" class="w-100 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="file" class="form-control  form-control-file" ref="fileInput" v-on:change="handleFileUpload()" style="    padding: 3px;" />
                            <error-div :form="form" field="file" />
                            <small>Максимальний розмір файлу 10MB</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button :disabled="form.busy" type="submit" class="btn-my">
                            <i class="fas  fa-spinner fa-spin fa-fw " v-if="form.busy"></i>
                            Завантажити файл
                        </button>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style=" text-align: center">#</th>
                        <th scope="col">
                            Назва файлу
                        </th>
                        <th scope="col">Розмір</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in files">
                        <th scope="row" style="    width: 100px; text-align: center">
                            {{index + 1}}
                        </th>
                        <td>
                            <a :href="item.upload_url" target="_blank" v-tooltip="'Натисніть, щоб відкрити'">
                                {{item.name}}
                            </a>
                        </td>
                        <td>{{item.size}}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-danger btn-radius-ico mx-1" v-on:click="deleteFile(item.id)" v-tooltip="'Видалити файл'">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <!-- <div class="buttons">
        <div class="btn-my" v-on:click="downloadAll()">Друк всіх документів</div>
        <div class="btn-my" v-on:click="downloadFiles()">Друк вибраних документів</div>
    </div> -->
</div>
</template>

<script>
export default {
    data() {
        return {
            // Create a new form instance
            files: [],
            patientId: 0,
            form: new Form({
                file: '',
                patient_id: ''
            }),
            empty_space: 0,
            total_space: 0
        }
    },
    mounted() {
        this.patientId = this.$route.params.id;
        this.getSubQuotInfo();
        this.getFiles();
    },
    methods: {
        getSubQuotInfo() {
            return axios.get('/files/info').then(res => {
                this.empty_space = res.data.used_space;
                this.total_space = res.data.total_space;
            })
        },
        getFiles() {
            return axios.get('/files/list/' + this.patientId).then(res => {
                this.files = res.data.files;
            })
        },
        saveFile() {
            this.form.patient_id = this.patientId;
            this.form.submit('post', '/files/store', {
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
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });
                    this.form.reset();
                    this.$refs.fileInput.value = '';
                    // this.form.file = '';
                    this.getFiles();
                    this.getSubQuotInfo();
                })

        },
        handleFileUpload() {
            this.form.file = this.$refs.fileInput.files[0];
        },
        deleteFile(id) {
            axios.post('/files/delete', {
                id: id,
            }).then(res => {
                Toast.fire({
                    icon: 'success',
                    title: res.data.message
                });
                this.getFiles();
                this.getSubQuotInfo();
            }).catch(error => {
                console.log(error);
            })

        }
    }
}
</script>
