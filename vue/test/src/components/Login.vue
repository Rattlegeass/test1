<template>
    <div class="card" style="width: 40vw; position: absolute; left: 30vw;">
        <div class="col-sm-4" style="width: auto;">
            <div class="card-header fw-bolder">Login Form</div>
  
            <form @submit.prevent="loginData">
  
                <div class="card-body" align="left" style="padding: 2em;">
                    <label class="py-2">Email</label>
                    <input type="email" v-model="student.email" class="form-control" placeholder="input email" >
                    <label class="py-2">Password</label>
                    <input type="password" v-model="student.password" class="form-control" placeholder="input password" >
                </div>
  
                <p>Don't have an account yet? <router-link :to="{name: 'Register'}">Register Now</router-link></p>
                <button type="submit" class="btn btn-primary mb-4 mt-2">Login</button>
  
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
                student:{
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
            loginData(){
                axios.post("http://127.0.0.1:8000/api/login", this.student)
                .then(
                    ({data})=>{
                        console.log(data);
                        try{
                            alert("Login Success")
                            this.$router.push({ name: 'HelloWorld'})
                        }catch(err){
                            alert('Login failed')
                        }
                    }
                )
            }
        }
    }
  
  </script>