<template>
  <div>
    <h1>Editar Tarefa</h1>
    <form @submit.prevent="updatePost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Título:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Status:</label>
            <select v-model="post.status">
              <option disabled value>Escolha um item</option>
              <option v-bind:key="item" v-for="item in items" :value="item.value">{{item.label}}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Descrição:</label>
            <textarea class="form-control" v-model="post.body" rows="5"></textarea>
          </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <button class="btn btn-primary">Gravar</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {},
      items: [
        {
          label: "Aberto",
          value: 1
        },
        {
          label: "Em Andamento",
          value: 2
        },
        {
          label: "Concluído",
          value: 3
        },
        {
          label: "Cancelado",
          value: 4
        }
      ]
    };
  },
  created() {
    let uri = `http://127.0.0.1:8000/api/task/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.post = response.data;
    });
  },
  methods: {
    updatePost() {
      let uri = `http://127.0.0.1:8000/api/task/update/${
        this.$route.params.id
      }`;
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "tasks" });
      });
    }
  }
};
</script>