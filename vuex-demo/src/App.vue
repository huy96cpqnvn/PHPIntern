<template>
  <div id="app" class="container">
    <img src="../dist/grooo.jpg" alt="" width="100"><span class="logo-title">What do the Interns need to do?</span>
    <br>
    <div class="row">
      <div class="col-md-6"><ListTask></ListTask></div>
      <div class="col-md-6"><CompletedTask></CompletedTask></div>
    </div>
    <GetTask></GetTask>

  </div>
</template>

<script>
import GetTask from './components/GetTask.vue'
import ListTask from './components/ListTask.vue'
import CompletedTask from './components/CompletedTask.vue'
export default {
  name: 'app',
  components: {
    GetTask,
    ListTask,
    CompletedTask
  }
}
</script>

<style>
body {
  font-family: Helvetica, sans-serif;
}

ul li {
  list-style-type: none;
}

.logo-title {
  font-weight: bold;
  font-size: 20px;
  margin-left: 20px;
}

.my-task {
  color: #f4f7f9!important;
  background-color: #656c7a!important;
}

.my-completed {
  color: #f4f7f9!important;
  background-color: #656c7a!important;
}
.task-length {
  float: right!important;
}

.completed-length {
  float: right!important;
}

.list-group-item {
  background-color: #99FFFF;
}

.complete-list {
  background-color: #FF99FF!important;
}

.remove-completed {
  float: right!important;
}

.slide-fade-enter-active {
  transition: all .3s ease;
}

.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter, .slide-fade-leave-to
  /* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
