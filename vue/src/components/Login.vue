<template>
    <div class="card" style="width: 40vw; position: absolute; left: 30vw;">
        <div class="col-sm-4" style="width: auto;">
            <div class="card-header fw-bolder">LOGIN</div>
  
            <form @submit.prevent="loginData">
  
                <div class="card-body" align="left" style="padding: 2em;">
                    <label class="py-2">Email</label>
                    <input type="email" v-model="user.email" class="form-control" placeholder="Input Email" required autocomplete="off">
                    <label class="py-2">Password</label>
                    <input type="password" v-model="user.password" class="form-control" placeholder="Input Password" required autocomplete="off">
                </div>
  
                <p>Don't have any account yet? <router-link :to="{name: 'Register'}">Register Now!</router-link></p>
                <button type="submit" class="btn btn-success position-relative" style="margin-bottom: 0.6em;">Login</button>
  
            </form>
        </div>
    </div>
  </template>
  
  <script>
    import Vue from 'vue';
    import axios from 'axios';
  
    Vue.use(axios)
    export default{
        name: 'Login',
        data(){
            return {
                result: {},
                user:{
                    email: '',
                    password: ''
                }
            }
        },
        created(){
        },
        mounted(){
            console.log("mounted() called.....");
        },
        methods: {
            loginData() {
      axios.post("http://127.0.0.1:8000/api/login", this.user)
        .then(response => {
            const data = response.data; // Ambil data dari respons
            // const role = response.data.role_id; // Ambil data dari respons
            // Cek apakah respons memiliki token
            const role = data.role
            console.log("Role ID =", data.role)
            if (data.token) {
                // Simpan token di localStorage
                localStorage.setItem('jwt', data.token);
                if(role === 1){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'AdminPage' });
                    // alert("Login Success as Admin");
                }else if(role === 2){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'UserPage' });
                    // alert("Login Success as User!");
                }else{
                    alert('User is Not Registered!')
                }
            } else {
                // Jika respons tidak memiliki token, tampilkan pesan kesalahan
                alert("Login Failed!");
            }
        })
        .catch(error => {
            // Tangani kesalahan ketika mengirim permintaan
            console.error('Login failed:', error);
            alert('Login failed! Please try again');
        });
        }
                
        }
        
    }
  
</script>