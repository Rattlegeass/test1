<template>
  <div class="container">
    <Layouts />
    <div class="position-absolute top-50 start-50 translate-middle">
      <h2>Welcome to admin page</h2>
    </div>
  </div>
</template>

<script>
import Layouts from '@/components/Layouts.vue'
export default {
  name: 'AdminPage',
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
