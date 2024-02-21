<template>
  <div class="card" style="width: 40vw; position: absolute; left: 30vw;">
    <div class="card-header fw-bolder">Edit User</div>
    <div class="card-body" style="width: auto; padding: 1em;">
      <form @submit.prevent="updateData" class="text-start">
        <label class="py-1">Name</label>
        <input type="text" v-model="user.name" name="name" id="name" class="form-control" required placeholder="Input Name" autocomplete="off"/>

        <label class="py-2">Email</label>
        <input type="email" v-model="user.email" name="email" id="email" class="form-control" required placeholder="Input Email" autocomplete="off"/>

        <input type="submit" value="Save" class="btn btn-success position-relative" style="margin-top: 0.6em; margin-left: 43%;" />
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'EditUser',
  data() {
    return {
      user: {
        name: '',
        email: '',
        errors: []
      }
    };
  },
  created() {
    this.getDataById();
  },
  methods: {
    async getDataById() {
      await axios.get(`http://127.0.0.1:8000/api/get/${this.$route.params.id}`)
      .then(response => {
          console.log(response)
          this.user = response.data
      })
    },
    async updateData() {
      this.user.errors = [];

      if (!this.user.name.trim()) {
        this.user.errors.push('Name is required');
      }
      if (!this.user.email.trim()) {
        this.user.errors.push('Email is required');
      }

      if (this.user.errors.length === 0) {
        try {
          const formData = new FormData();
          formData.append('name', this.user.name);
          formData.append('email', this.user.email);

          const url = `http://127.0.0.1:8000/api/update/${this.$route.params.id}`;
          const response = await axios.post(url, formData);
          this.$router.push({name: 'DataUser'})

          if (response.status === 200) {
            // alert(response.data.message);
          } else {
            alert('Error Edit Data!');
          }
        } catch (error) {
          console.error('Error Edit Data:', error);
          alert('Error Edit Data!');
        }
      }
    }
  }
}
</script>