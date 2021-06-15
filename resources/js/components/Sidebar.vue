<template>
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>Bootstrap Sidebar</h3>
    </div>

    <ul class="list-unstyled components">
      <p class="text-center text-muted">{{ page }}</p>
      <li v-for="item in JSON.parse(itens)" :key="item.value">
        <a :href="item.url">{{ item.value }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
  export default {
    name: "Sidebar",
    props: [ 'itens', 'page']
  }
</script>
<style>
  #sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
  }

  #sidebar.active {
    margin-left: -250px;
  }

  #sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
  }

  #sidebar ul.components {
    border-bottom: 1px solid #47748b;
    border-top: 1px solid #47748b;
  }

  #sidebar ul p {
    padding: 10px;
    background: #bac5f3;
  }

  #sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
  }

  #sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
  }

  #sidebar ul li.active>a,
  a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
  }
</style>
