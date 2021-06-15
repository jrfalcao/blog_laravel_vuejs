<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn ">
        <i class="fas fa-align-left"></i>
      </button>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item" v-for="item in JSON.parse(itens)" :key="item.value">
            <a class="nav-link" :href="item.url">{{ item.value }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">
              Sair <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
  export default {
    name: "Navbar",
    props: {
      itens: String,
    },
  };
</script>

<style>
  .navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
  }

  .navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
  }

  #sidebarCollapse {
    background: #7386D5;
    color: #fff;
  }
  
  #sidebarCollapse:hover {
    background: #566fd3;
  }
</style>
