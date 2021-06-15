<template>
  <div class="post">
    <h2>Collapsible Sidebar Using Bootstrap 4</h2>
    <p class="text-muted h6">-- criado por: Junior Falcão || Em 13/06/2021</p>

    <p class="content_post" v-html="post_content"></p>
    
    <div class="butons d-flex justify-content-end">
      <a :href="url" class="btn btn-primary btn-sm">Ver/Editar</a>
      <button class="btn btn-danger btn-sm ml-2 post_delete" :data-post_id="post_id">Excluir</button>
    </div>
    <div class="line"></div>
  </div>
</template>

<script>
  export default {
    data: () => ({
      url: `post_edit/${this.post.id}`,
      post_id: this.post.id,
      post_content: this.post.content
    }),
    name: "Post",
    props: {
      post: String,
    },
    methods: {
      getAuthor(id) {
        return axios.post('/getAuthor', { user_id: this.post.user_id }, (data) => {
          return data.name
        })
      },
    },
    mounted() {
      this.post = JSON.parse(this.post)
    }
  };
</script>
