<template>
    <header><h1>{{ titleHeader }}</h1><br>
    <button v-on:click="changeTitleHeader">Change Title from CompHeader</button>
    </header>
</template>

<script>
export default {
    name: 'comp-header',
  props: {
      titleHeader: String,
    title: String
  },
    data() {
        return {

        }
    },
  methods: {
      changeTitleHeader(e) {
        // Không được phép thay đổi trực tiếp props từ Compnent Cha
        // Truyền sự kiên thông báo ra bên ngoài
        // Kích hoạt sự kiện 'changeTitleEvent' trong CompHeader.vue
        // Khi kích hoạt function bên ngoài app.vue nó sẽ chạy
        // Khi function đó được chạy , nó sẽ thay đổi dữ liệu
      var data = {
          title: 'Data truyền thông qua biến event'
        }
        this.$emit('changeTitleEvent', data)
      }
  }
}
</script>

<style>

</style>
