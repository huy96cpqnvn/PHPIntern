<template>
<div>
    <div class="container">
        <div class="row m-2">
            <label class="col-sm-2 col-form-label font-weight-bold pull-right">Phân Loại:</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="status">
                    <option disable value="TẤT CẢ">--All--</option>
                    <option>Publish</option>
                    <option>Draff</option>
                </select>
            </div>
            <div class="col-sm-4">
                <router-link to="/todos/create"><button class="btn-primary btn-sm">Add News</button></router-link>
            </div>

        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Author</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Arsenal
                </td>
                <td>Sport</td>
                <td>Very Good</td>
                <td>ME</td>
                <td>Publish</td>
                <td class="text-center">
                    <button class=" btn-danger btn-sm">Xóa</button>
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
    name: "ShowNews"
}
</script>

<style scoped>

</style>
