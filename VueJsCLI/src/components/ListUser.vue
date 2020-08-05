<template>
  <div class="list-user">
    <user v-for="user in listUser"
    v-bind:key="user.id"
    v-bind:user="user"
    v-on:listDelete="lsUserDelete"/>

  </div>
</template>

<script>
import User from "./User";
export default {
  name: 'list-user',
  props: {
    listUser: {
      type: Array,
      default: []
    }
  },
  components: {User},
  data() {
    return {

    }
  },
  methods: {
    lsUserDelete(data) {
      this.$emit('appDelete', data)
    }
  }
}
</script>
<style>
  .list-user {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .list-user .user {
    padding: 30px;
    margin-bottom: 30px;
    border:  1px solid #333;
    width: calc(33.3333% - 20px);
  }
</style>