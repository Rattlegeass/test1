<template>
    <div class="card"  style="width: 40vw; position: absolute; left: 30vw;">
        <div class="card-header fw-bolder">REGISTER</div>
        <div class="card-body" style="width: auto; padding: 1em;">
            <form @submit.prevent="saveData"  class="text-start">
                <label class="py-1">Name</label>
            <input type="text" v-model="user.name" name="name" id="name" class="form-control" placeholder="Input Name"/>
            
            <label class="py-2">Email</label>
            <input type="email" v-model="user.email" name="email" id="email" class="form-control" placeholder="Input Email"/>
            
            <label class="py-2">Password</label>
            <input type="password" v-model="user.password" name="password" id="password" class="form-control" placeholder="Input Password"/>
  
            
            <p class="pt-4">Already have an account? <router-link :to="{name: 'Login'}">Login Now!</router-link></p>
            <input type="submit" value="Register" class="btn btn-success position-relative" style="margin-top: 0.6em; margin-left: 43%;">
  
        </form>
    </div>
  </div>
  </template>
  
  <script>
    import Vue from 'vue';
    import axios from 'axios';
  
    Vue.use(axios)
    export default {
        name : 'Register',
        data(){
            return {
                result: {},
                user:{
                    name:  '',
                    email:  '',
                    password:  ''
                }
  
            }
        },
        created(){
        },
        mounted(){
            console.log("mounted() called......");
        },
        methods: {
            saveData(){
                axios.post("http://127.0.0.1:8000/api/regis", this.user)
                .then(
                    ({data})=>{
                        console.log(data);
                        try{
                            alert("User Successfully Registered!")
                            this.$router.push({ name: 'UserDash'})
                        }catch(err){
                            alert('User Failed Registered!')
                        }
                    }
                )
            }
        }
    }
  </script>