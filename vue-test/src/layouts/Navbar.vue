<template>
  <div class="navbar">
    Welcome {{user.username}}
    <a href="" @click="logout">Logout</a>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  props: {
    user: Object
  },
  methods: {
    logout() {
      console.log("logout")
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
    a{
      color: #FFF;
      &:hover{
        font-weight: bold;
      }
    }
  }
</style>