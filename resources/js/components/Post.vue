<template>
  <div class="post">
    <h2>{{ this.post_item.title }}</h2>
    <p class="text-muted h6">-- criado por: {{ this.author.name }} || Em {{ this.created_at }}</p>

    <p maxlength="10" class="content_post" v-html="this.post_item.content">{{ this.post_item.content }}</p>
    
    <div class="butons d-flex justify-content-end">
      <a :href="url" class="btn btn-primary btn-sm">Ver/Editar</a>
      <button class="btn btn-danger btn-sm ml-2 post_delete" :data-post_id="this.post_item.id">Excluir</button>
    </div>
    <div class="line"></div>
  </div>
</template>

<script>
  export default {
    name: "Post",
    props: {
      post: String
    },
    data: () => ({
      post_item: '',
      url: '',
      author: '',
      created_at: ''
    }),
    methods: {
      async setAuthor() {
        const author = await axios.post('/getAuthor', { user_id: this.post_item.user_id })
        .then(function (response) {
          return response.data
        })
        this.author = author
        const created_at = this.post_item.created_at.split('T')
        this.created_at = created_at[0].split('-').reverse().join('/')
      }
    },
    mounted() {
      this.post_item = JSON.parse(this.post)
      this.url = `post_edit/${this.post_item.user_id}`
      this.setAuthor()
    }
  };
</script>
