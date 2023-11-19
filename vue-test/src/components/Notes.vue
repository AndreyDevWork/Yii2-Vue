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
    async deleteNote(note) {
      const {status, data} = await httpClient.delete(`note/${note.id}`);
      if(status === 204) {
        this.notes.splice(this.notes.indexOf(note), 1);
      }
    },
    async addNote() {
      const {status, data} = await httpClient.post('note', {});
      if(status === 201) {
        this.notes.unshift(data);
      }
    },
    async noteUpdated(note) {
      const {status, data} = await httpClient.put(`note/${note.id}`, note);
      if(status === 200) {

      }
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