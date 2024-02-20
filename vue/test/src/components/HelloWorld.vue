<template>
  <div class="hello">
    <h2>Welcome to home page</h2>
    <button v-on:click="logout" class="btn btn-info mb-4 mt-2">log out</button>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  methods:{
    logout(){
      localStorage.clear()
      this.$router.push({name : 'Login'})
      alert('log out success')
    }
  },
  data () {
    return {
      
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
