<template>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Your Notes</h2>
      <router-link to="/notes/create" class="btn btn-success">Add Note</router-link>
    </div>
    <div class="row">
      <div class="col-md-4" v-for="note in notes" :key="note.id">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ note.title }}</h5>
            <p class="card-text">{{ note.description }}</p>
            <router-link :to="`/notes/edit/${note.id}`" class="btn btn-primary">Edit</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      notes: []
    };
  },
  mounted() {
    axios.get('/api/notes')
      .then(response => {
        this.notes = response.data;
      })
      .catch(error => {
        console.error('Error fetching notes:', error);
      });
  }
};
</script>
