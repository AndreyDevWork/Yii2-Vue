<template>
  <div id="default-layout">
    <navbar :user="user"/>
    <router-view/>

  </div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
  name: "DefaultLayouts",
  components: {Navbar},
  data() {
    return {
      user: {}
    }
  }
}
</script>

<style lang="scss" scoped>

</style>