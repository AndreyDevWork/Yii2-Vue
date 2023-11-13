<template>
  <div class="tc-notes-wrapper">
    <add-new-button @addNote="addNote"/>
    <div class="ts-notes">
      <note v-for="(note, index) in notes" :key="index" :note="note" @deleteNote="deleteNote" @noteUpdated="noteUpdated"/>
    </div>
  </div>
</template>

<script>
import AddNewButton from "./AddNewButton.vue";
import Note from "./Note.vue";
import httpClient from "../services/http_service.js";

export default {
  components: {Note, AddNewButton},
  name: "Notes",
  methods: {
    deleteNote(note) {
      this.notes.splice(this.notes.indexOf(note), 1);
    },
    addNote() {
      this.notes.unshift({title: '', body: ''});
    },
    noteUpdated(note) {
      console.log(note);
    },
  },
  async mounted() {
    const {status, data} = await httpClient.get('note');
    if(status === 200) {
      this.notes = data;
    }
  },
  data() {
    return {
      notes: [
      ],
    }
  }
}
</script>

<style lang="scss" scoped>
  .tc-notes-wrapper {
    padding-top: 70px;
    .ts-notes {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin: 0 auto;
    }
  }
</style>