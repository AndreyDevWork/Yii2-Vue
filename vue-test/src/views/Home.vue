<template>
  <div class="home">
    <notes />
  </div>
</template>

<script>
// @ is an alias to /src
import Notes from "../components/Notes.vue";
export default {
  name: 'Home',
  components: {
    Notes
  },
}
</script>