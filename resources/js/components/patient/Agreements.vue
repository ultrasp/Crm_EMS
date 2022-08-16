<template>
<div class="container container-settings ml-0 mr-0">

    <div class="container_title">Документи</div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style=" text-align: center">#</th>
                        <th scope="col">Назва документу</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(document,index) in documents">
                        <th scope="row" style="    width: 100px; text-align: center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" v-model="checked" :value="index">
                            </div>
                        </th>
                        <td>{{document.name}}</td>
                        <td style="    width: 100px; text-align: center">
                            <button type="button" class="btn btn-primary" v-on:click="downloadFromUrl(document)"><i class="fas fa-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons">
        <div class="btn-my" v-on:click="downloadAll()" >Друк всіх документів</div>
        <div class="btn-my" v-on:click="downloadFiles()">Друк вибраних документів</div>

    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            // Create a new form instance
            documents: [],
            checked: [],
            patientId: 0
        }
    },
    mounted() {
        this.patientId = this.$route.params.id;
        this.getDocuments();
    },
    methods: {
        getDocuments() {
            return axios.get('/documents/list').then(res => {
                this.documents = res.data.documents;
            })
        },
        downloadFiles() {
            for (let index = 0; index < this.checked.length; index++) {
                this.downloadFromUrl(this.documents[this.checked[index]]);
            }
        },
        downloadAll(){
            for (let index = 0; index < this.documents.length; index++) {
                this.downloadFromUrl(this.documents[index]);
            }
        },
        downloadFromUrl(doc) {
            axios.post('/documents/download', {
                    doc_id: doc.id,
                    patient_id: this.patientId
                }, {
                    responseType: "arraybuffer"
                })
                .then(response => {
                    this.downloadFile(response,doc);
                })
                .catch(err => alert(err));
        },
        downloadFile(response,doc) {
            var newBlob = new Blob([response.data], {
                type: "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
            });
            if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                window.navigator.msSaveOrOpenBlob(newBlob);
                return;
            }
            const data = window.URL.createObjectURL(newBlob);
            var link = document.createElement("a");
            link.href = data;
            link.download = doc.name;
            link.click();
            setTimeout(function () {
                window.URL.revokeObjectURL(data);
            }, 100);
        }
    }
}
</script>
