<template>
    <div class="card"  style="width: 40vw; position: absolute; left: 30vw;">
        <div class="card-header fw-bolder">Register Form</div>
        <div class="card-body" style="width: auto; padding: 1em;">
            <form @submit.prevent="saveData"  class="text-start">
                <label class="py-1">Name</label>
            <input type="text" v-model="student.name" name="name" id="name" class="form-control"/>
            
            <label class="py-2">Email</label>
            <input type="email" v-model="student.email" name="email" id="email" class="form-control"/>
            
            <label class="py-2">Password</label>
            <input type="password" v-model="student.password" name="password" id="password" class="form-control"/>
  
            
            <p class="pt-4">Already have an account?<router-link :to="{name: 'Login'}"> Login Now</router-link></p>
            <input type="submit" value="Save" class="btn btn-success position-relative" style="margin-top: 0.6em; margin-left: 43%;">
  
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
                student:{
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
                axios.post("http://127.0.0.1:8000/api/regis", this.student)
                .then(
                    ({data})=>{
                        console.log(data);
                        try{
                            alert("Data successfully uploaded")
                            this.$router.push({ name: 'HelloWorld'})
                        }catch(err){
                            alert('failed upload data')
                        }
                    }
                )
            }
        }
    }
  </script>