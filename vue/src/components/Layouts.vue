<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
      <div class="container">
        <router-link class="navbar-brand" to="/admin">ADMIN</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link to="/admin/data-user" class="nav-link active" aria-current="page">DATA USER</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/admin/add-user">ADD USER</router-link>
            </li>
          </ul>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            <button class="btn btn-success" v-on:click="logout" to="/login">Log Out</button>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
    export default{
        name: 'Layouts',
        methods:{
        logout(){
            localStorage.removeItem('jwt')
            this.$router.push({name : 'Login'})
            // alert('Logout Success!')
            }
        }
    }
</script>