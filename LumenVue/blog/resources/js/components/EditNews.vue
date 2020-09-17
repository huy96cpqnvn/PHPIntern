<template>
    <div>
        <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add News</h3>
                </div>
                <div class="panel-body">
                    <form class="m-5" @submit.prevent="updateNews">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" v-model="news.title" class="form-control" id="title"
                                   required>

                        </div>

                        <!--                        <div class="form-group">-->
                        <!--                            <label for="cover" >Cover Image</label>-->
                        <!--                            <input type="file" class="form-control" name="file" id="cover" @change="onFileChange"-->
                        <!--                                   placeholder="Enter Image" multiple>-->
                        <!--                        </div>-->

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" v-model="news.description" id="description"
                                   required>

                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" cols="150" rows="6" id="content" v-model="news.content"
                                      required/>


                        </div>

                        <!--                        <div class="form-group">-->
                        <!--                            <label for="category">Category</label>-->
                        <!--                            <input type="text" v-model="news.category_id" class="form-control" id="category"-->
                        <!--                                   placeholder="Mời nhập công việc" required>-->

                        <!--                        </div>-->

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" v-model="news.author" class="form-control" id="author"
                                   required>

                        </div>

                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" v-model="news.user_id" class="form-control" id="user"
                                   required>

                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" v-model="news.category_id">

                                <option v-for="(data, index) in categories" v-bind:key="index" v-bind:value="data.id">
                                    {{ data.title }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Trạng Thái</label>
                            <select class="form-control" v-model="news.status" id="status">
                                <option disabled value="">Please, Choose an option</option>
                                <option value="1">Publish</option>
                                <option value="2">Draff</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <button type="button" class="btn btn-danger" v-on:click="cancel">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditNews",
    data() {
        return {
            newsId: null,
            news: {
                title: null,
                // cover: null,
                description: null,
                content: null,
                category_id: null,
                user_id: null,
                author: null,
                status: null,
            }
        }
    },
    computed: {
        categories(){
            return this.$store.getters.cateAdd;
        }
    },
    created() {
        return this.$store.getters.cateAdd;
    },
    mounted() {
        var id = this.$route.params.id
        this.newsId = id
        this.$store.dispatch('editNews', {id: id}).then(res => {
            this.news = res.data
        })
    },
    methods: {
        updateNews() {
            this.$store.dispatch('updateNews', this.news).then(res => {
                if (res.status == 200) {
                    swal({
                        title: "Edit successfully",
                        icon: "success"
                    })
                    this.$router.push("/news")
                }
            })
        },
        cancel() {
            this.$router.push("/news")
        }
    }
}

</script>

<style scoped>

</style>
