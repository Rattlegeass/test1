<template>
    <div class="container">
        <Layouts />
        <div class="position-absolute top-50 start-50 translate-middle">
            <h3>welcome to the user page</h3>
        </div>
    </div>

  </template>
  
  <script>
  import Layouts from '@/components/LayoutsUser.vue'
  export default {
    name: 'UserDash',
    components:{
      Layouts
    },
    data () {
      return {
        
      }
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  