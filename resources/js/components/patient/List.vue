<template>
    <div>
        <div class="container">

            <div class="container_title d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    База пацієнтів
                </div>
                <div class="custom-buttons d-flex flex-column flex-sm-row ml-md-auto" v-if="this.$gate.isOwner()">
                    <button type="button" class="btn-my bg-primary btn-sm mb-2 mb-sm-0 mr-sm-2" v-on:click="saveDownloadZip(null)">Завантажити всі</button>
                    <button type="button" class="btn-my bg-primary btn-sm" v-on:click="showModalDownloadZip(true)">Завантажити вибрані</button>
                </div>
            </div>
            <!-- <div class="container_filter">
                <div class="search"><input placeholder="Пошук по ПІБ..." type="text"></div>
            </div> -->
            <div class="table-responsive-lg">
                <table id="patient-table" class="table table-striped- table-bordered table-hover table-checkable table  "></table>
            </div>
            <doctor-select2 :patientId="patientId" :showModal="showModal" v-on:attached="attachedDoctor"></doctor-select2>
            <card-range-modal :showModal="showCardModal" v-on:closed="cardModalClosed"></card-range-modal>
            <iframe id="printWindow" style="position: absolute; top: -1000px; left: -1000px;"></iframe>
        </div>
    </div>
</template>



<style>
    .custom-buttons {
        float: right;
    }
</style>
<script>
  export default {
    computed: {
      bindings() {
        return {
          columns: [{
            key: 'id',
            title: 'ID'
          }, {
            key: 'fullname',
            title: 'Fullname'
          }, {
            key: 'birthday',
            title: 'Birthday'
          }, {
            key: 'phone',
            title: 'Phone'
          }],
          data: patients
          /* other props...*/
        }
      }
    },
    data() {
      return {
        patients: [],
        patientId: 0,
        showModal: false,
        showCardModal: false
      }

    },
    mounted() {
      this.getPatients();
    },
    methods: {
      cardModalClosed(range) {
        this.showCardModal = false;
        if(range)
        this.saveDownloadZip(range);
      },
      attachedDoctor() {
        this.showModal = false;
      },
      saveDownloadZip(range) {
        axios.post('/patient/addDownloadJob', {
          card_range: range,
        })
          .then(response => {
            Toast.fire({
              icon: 'success',
              title: response.data.message
            });
          })
          .catch(err => alert(err));
      },
      showModalDownloadZip() {
        this.showCardModal = true;
      },
      getPatients() {
        var table = $('#patient-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '/patients/list',
          rowId: 'id',
          columns: [{
            data: 'card_number',
            'title': '№ карти'
          },
            {
              data: 'fullname',
              'title': 'ПІБ'
            },
            {
              data: 'birthday',
              'title': 'День народження'
            },
            {
              data: 'phone',
              'title': 'Телефон'
            },
            {
              data: 'action',
              title: ''
            },
          ],
          // language: 'uk',
          "order": [
            [0, "desc"]
          ],
          // "drawCallback": function () {
          //     $('.dataTables_paginate > .pagination').addClass('d-pagination pagination-sm');
          // },
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
          }
        });

        var component = this;
        $('#patient-table').on('click', 'tbody tr[id]', function ($event) {
          // console.log($event.target,'$event.target');
          var target = $($event.target)
          var id = $(this).prop('id');
          if (target.hasClass('btndelete') || target.hasClass('fa-trash')) {
            Swal.fire({
              // title: 'Are you sure?',
              text: "Ви дійсно хочете видалити пацієнта ?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Так, видалити',
              cancelButtonText: 'Скасувати'
            }).then((result) => {
              if (result.isConfirmed) {
                axios.post('/patient/delete', {
                  id: id,
                })
                  .then(response => {
                    $('#patient-table').DataTable().ajax.reload();
                    Swal.fire(
                      'Видалено!',
                      // 'Your file has been deleted.',
                      // 'success'
                    )
                  })
                  .catch(err => alert(err));

              }
            })
            return;
          }
          if (target.hasClass('btnaccess')) {
            console.log(component, 'show access')
            component.patientId = id;
            component.showModal = true;
            return;
          }
          if (target.hasClass('btnPrint')) {
            var url = target.hasClass('fas') ? target.parent().data('url') : target.data('url');
            console.log(target, url, 'url');
            var iframe = $("#printWindow");
            let loader = component.$loading.show();
            iframe.attr('src', url);
            setTimeout(function () {
              iframe.get(0).contentWindow.print();
              loader.hide()
            }, 4000);
            return
          }
          // console.log(target);
          window.location.href = 'patients/card/' + id;
        })
      },
    }
  }
</script>
