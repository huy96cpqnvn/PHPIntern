<template>
        <div>
            <div class="row m-2">
                <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold pull-right">Phân Loại:</label>
                <div class="col-sm-3">
                    <select class="form-control form-control-sm" id="status">
                        <option disable value="TẤT CẢ">--TẤT CẢ--</option>
                        <option>ACTIVE</option>
                        <option>DONE</option>
                        <option>DELETED</option>
                    </select>
                </div>
                <div class="col-sm-4">
                </div>

            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tên công việc</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Chi Tiết</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Nộp bài tập UML
                    </td>
                    <td>Nhớ nộp đúng hạn 1/1/2020</td>
                    <td> DONE</td>
                    <td class="text-center">
                        <button class=" btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
export default {
    name: "ShowView"
}
</script>

<style scoped>

</style>
