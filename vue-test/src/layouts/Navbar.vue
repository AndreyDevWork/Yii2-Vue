<template>
  <div class="navbar">
    Welcome {{user.username}}
    <div class="link" href="" @click="logout">Logout</div>
  </div>
</template>

<script>
import authService from "../services/auth_service.js";
import router from "../router/router.js";

export default {
  name: "Navbar",
  props: {
    user: Object
  },
  methods: {
    logout() {
      authService.logout();
      router.push({name: 'login'})
    }
  }
}
</script>

<style lang="scss" scoped>
  .navbar {
    height: 50px;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    line-height: 50px;
    background-color: #1f5d6b;
    color: #FFF;
    padding: 0 15px;
    text-align: right;
    transition: font-weight 0.3s;
    .link{
      color: #FFF;
      cursor: pointer;
      display: inline;
      &:hover{
        font-weight: bold;
      }
    }
  }
</style>