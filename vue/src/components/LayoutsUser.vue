<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
      <div class="container">
        <router-link class="navbar-brand" to="/user">USER</router-link>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            <button class="btn btn-success" v-on:click="logout" to="/login">Log Out</button>
          </div>
      </div>
    </nav>
  </div>
</template>

<script>
    export default{
        name: 'LayoutsUser',
        methods:{
        logout(){
            localStorage.removeItem('jwt')
            this.$router.push({name : 'Login'})
            confirm('Are you sure you want to logout?')
            // alert('Logout Success!')
            }
        }
    }
</script>