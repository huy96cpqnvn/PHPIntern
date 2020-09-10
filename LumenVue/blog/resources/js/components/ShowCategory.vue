<template>
<div>
    <div class="container">
        <div class="row m-2">
            <div class="col-sm-4">
                <router-link to="/todos/create"><button class="btn-primary btn-sm">Add Category</button></router-link>
            </div>

        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Create_At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Sport
                </td>
                <td>1/1/2020</td>
                <td class="text-center">
                    <button class=" btn-danger btn-sm">Delete</button>
<!--                    <router-link :to="{name:'edit', params:{id:todo.id}}"><button class="btn-primary btn-sm">Sửa </button></router-link>-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
name: "ShowCategory"
}
</script>

<style scoped>

</style>
