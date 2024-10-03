<template>
  <div class="container mt-5">
    <h2>{{ isEdit ? 'Edit Note' : 'Create Note' }}</h2>
    <form @submit.prevent="saveNote">
      <div class="form-group mb-3">
        <label for="title">Title</label>
        <input
          type="text"
          v-model="title"
          class="form-control"
          id="title"
          placeholder="Note title"
          required
        />
      </div>
      <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea
          v-model="description"
          class="form-control"
          id="description"
          rows="3"
          required
        ></textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ isEdit ? 'Update Note' : 'Create Note' }}</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: '',
      description: '',
      isEdit: false
    };
  },
  mounted() {
    if (this.$route.params.id) {
      this.isEdit = true;
      axios.get(`/api/notes/${this.$route.params.id}`)
        .then(response => {
          this.title = response.data.title;
          this.description = response.data.description;
        });
    }
  },
  methods: {
    saveNote() {
      const note = {
        title: this.title,
        description: this.description
      };
      const request = this.isEdit
        ? axios.put(`/api/notes/${this.$route.params.id}`, note)
        : axios.post('/api/notes', note);

      request
        .then(() => {
          this.$router.push('/notes');
        })
        .catch(error => {
          console.error('Error saving note:', error);
        });
    }
  }
};
</script>
