<template>
    <div>
        <Layouts />
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="card border-0 rounded shadow">
                    <br>
                    <h4><b>DATA USER</b></h4>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role ID</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="users in user" :key="users.id">
                                    <td>{{users.name}}</td>
                                    <td>{{users.email}}</td>
                                    <td>{{ users.role_id}}</td>
                                    <td class="text-center">
                                        <router-link :to="{name:  'EditUser', params: {id: users.id}}" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button type="button" class="btn btn-sm btn-danger rounded-sm shadow border-0" @click.prevent="deleteUser(users.id)">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <b>Role ID</b>
                        <p>1 = Admin  ||  2 = User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layouts from '@/components/Layouts.vue'
import axios from 'axios' 

    export default{
        name: 'Admin',
        components:{
            Layouts
        },
        data(){
            return{
                user:Array
            }
        },
        created(){
            this.getUser()
        },
        methods: {
            async getUser(){
                let url = 'http://127.0.0.1:8000/api/show'
                await axios.get(url).then(response => {
                    this.user = response.data.user
                    console.log(this.user)
                }).catch(error => {
                    console.log(error)
                })
            },
            async deleteUser(id){
                let url = `http://127.0.0.1:8000/api/delete/${id}`
                await axios.delete(url).then(response => {
                    if(response.data.code == 200){
                        // alert(response.data.message)
                        this.getUser()
                    }
                }).catch(error => {
                    console.log(error)
                })
            }
        },
        mounted(){
            console.log('User List Mounted...')
        }
    }
</script>