<template>
  <div id="default-layout">
    <navbar :user="user"/>
    <router-view/>

  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import authService from "../services/auth_service.js";

export default {
  name: "DefaultLayouts",
  components: {Navbar},
  data() {
    return {
      user: {}
    }
  },
  async beforeMount() {
    this.user = await authService.getCurrentUser();
  }
}
</script>

<style lang="scss" scoped>

</style>