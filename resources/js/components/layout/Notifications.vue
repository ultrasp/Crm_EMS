<template>
    <!--<div class="container container-settings" v-if="!$gate.isDoctor() && total >0">-->
    <div class="container container-settings">

        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning d-flex" role="alert" v-for="(notify,index) in notifications">
                    <div v-if="notify.ds ='App\\Notifications\\ZipFileReady'">
                        {{ notify.created_at | myDate}} Процес формування архіву може заняти певний час.
                        <a :href="notify.data['link']" target="_blank" style="color:red">Натисніть щоб завантажити</a>.
                        <br>
                        Після завантаження файл буде видалено.
                    </div>

                    <div v-else>
                        {{ notify.created_at | myDate}} В користувача {{ notify.data['name'] }} ({{ notify.data['email'] }}) доступ закінчується через {{notify.data['days']}} днів.
                    </div>
                    <div class=" mark-as-read pl-3 ml-auto" v-on:click="markRead(notify,index)" style="cursor:pointer;    color: #3d5c9f;">
                        Помітити, як прочитане
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        // Create a new form instance
        notifications: [],
        total: 0
      }
    },
    mounted() {
      if (!this.$gate.isDoctor())
        setInterval(() => {
          this.getNotifications();
        }, 60000);
      // this.getNotifications();
    },
    methods: {
      getNotifications() {
        return axios.get('/notifications').then(res => {
          this.notifications = res.data.notifications;
          this.total = res.data.total;
        })
      },
      markRead(notify, index) {
        return axios.post('/notification/read', {
          id: notify.id
        }).then(res => {
          this.notifications.splice(index, 1);
          Toast.fire({
            icon: 'success',
            title: res.data.message
          });
        })
      }
    }
  }
</script>
