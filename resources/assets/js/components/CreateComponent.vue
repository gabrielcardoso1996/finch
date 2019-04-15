<template>
  <div>
    <h1>Inserir Tarefa</h1>
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>Título:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>Status:</label>
            <select v-model="post.status">
              <option disabled value>Escolha um item</option>
              <option v-for="item in items" :key="item.value" :value="item.value">{{item.label}}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10">
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
  methods: {
    addPost() {
      let uri = "http://127.0.0.1:8000/api/task/create";
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "task" });
      });
    }
  }
};
</script>