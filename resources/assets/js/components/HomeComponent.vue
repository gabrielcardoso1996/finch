<template>
  <div class="row justify-content-center">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Código</th>
          <th>Título</th>
          <th>Descrição</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td>{{ post.id }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.body }}</td>
          <td>{{ post.status }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: []
    };
  },
  created() {
    let uri = "http://127.0.0.1:8000/api/tasks";
    this.axios.get(uri).then(response => {
      this.posts = response.data.data;
    });
  },
};
</script>