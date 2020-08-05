<template>
  <div id="app">
    <!-- <CompHeader></CompHeader> -->
    <!-- <CompHeader /> -->
    <div class="container">
      <button v-on:click="title = 'Learn VueJS in Grooo International'">Change title form component App.vue</button>
      <comp-header v-bind:titleHeader="title" v-on:changeTitleEvent="handleChangeTitle"/> <!-- changeTitleEvent là một sự kiện tự tạo, sẽ thực hiện hàm handleChangeTitle -->
      <img src="./assets/logo.png"   alt="images" />
      <ListUser v-bind:listUser="listUser"
      v-on:appDelete="handleDelete"/>
      <comp-footer/>

    </div>
  </div>
</template>

<!--prop là nhưngx data truyền từ Component cha vào Component con Cú pháp giống thuộc tính -> ràng buộc thuộc tính-->
<script>
import CompHeader from './components/CompHeader.vue';
import CompFooter from './components/CompFooter.vue';
import ListUser from "./components/ListUser";

export default {
  name: 'app',
  data() {
    return {
      title: 'Hello VueJS - Header ...',
      listUser: [
        {id: 100, email: 'test1@gmail.com', active: true},
        {id: 101, email: 'test2@gmail.com', active: true},
        {id: 102, email: 'test3@gmail.com', active: true},
        {id: 103, email: 'test4@gmail.com', active: true},
        {id: 104, email: 'test5@gmail.com', active: true},
        {id: 105, email: 'test6@gmail.com', active: true}
      ]
    }
  },
  components: {
    ListUser,
    CompHeader,
    CompFooter
  },
  methods: {
    handleChangeTitle(data) {

this.title = data.title;
    },
    handleDelete(data) {
      var indexUser = -1;
      this.listUser.forEach((u, index) => {
        if (u.id === data.id) {
          indexUser = index;
        }
      });
      if (indexUser != -1) {
        this.listUser.splice(indexUser, 1);
      }
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.container {
  max-width: 1170px;
  margin: 0 auto;
  padding: 0 15px;
  min-height: 3000px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
