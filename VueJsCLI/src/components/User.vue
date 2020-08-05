<template>
  <div class="user">
    <p>{{ user.email }}</p>
    <button class="delete" v-on:click="userDelete">Delete</button>
  </div>
</template>
<script>
export default {
  name: 'user',
  props: {
    user: {
      type: Object,
      default: null
    }
  },
  data() {
    return {}
  },
  methods: {
    userDelete(e) {
      var data = {
        id: this.user.id
      }
      this.$emit('listDelete', data)
    }
  }
}
</script>
<style>
.user {
  position: relative;
}

.user .delete {
  position: absolute;
  top: 0;
  right: 0;
}
</style>