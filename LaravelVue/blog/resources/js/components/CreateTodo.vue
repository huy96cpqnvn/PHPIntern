<template>
    <div>
        <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>THÊM CÔNG VIỆC</h3>
                </div>
                <div class="panel-body">
                    <form class="m-5">
                        <div class="form-group">
                            <label for="title">Tên Công Việc</label>
                            <input type="text" class="form-control" id="title" placeholder="Mời nhập công việc" required>
                            <!-- <span>{{ errors.first('title') }}</span> -->
                        </div>
                        <div class="form-group">
                            <label for="description">Ghi chú</label>
                            <input type="text"  class="form-control" id="description" placeholder="Mời nhập ghi chú" required>
                            <!-- <span>{{ errors.first('description') }}</span> -->
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng Thái</label>
                            <select class="form-control" id="status">
                                <option disable value="0">Please, Choose an option</option>
                                <option>ACTIVE</option>
                                <option>DONE</option>
                                <option>DELETED</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <button type="submit" class="btn btn-danger">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateTodo"
}
</script>

<style scoped>

</style>
