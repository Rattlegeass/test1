<template>
  <div>
    <Layouts />
    <div class="p-5 mb-4 rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">WELCOME TO USER PAGE</h1>
      </div>
    </div>
  </div>
</template>

<script>
import Layouts from '@/components/LayoutsUser.vue'
export default {
  name: 'UserPage',
  components:{
    Layouts
  },
  data () {
    return {
      
    }
  }
}
</script>