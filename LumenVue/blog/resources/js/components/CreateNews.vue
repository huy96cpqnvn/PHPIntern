<template>
    <div class="d-flex" id="wrapper">

        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'dashboard'}">Dashboard</router-link>
                </a>
                <a class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'showCate'}">Category</router-link>
                </a>
                <a class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'showNews'}">News</router-link>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
                <div class="col-xl-9 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Add News</h3>
                        </div>
                        <div class="panel-body">
                            <form class="m-5" @submit.prevent="addNews">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" v-model="news.title" class="form-control" id="title"
                                           placeholder="Enter Title" required>

                                </div>

                                <!--                        <div class="form-group">-->
                                <!--                            <label for="cover" >Cover Image</label>-->
                                <!--                            <input type="file" class="form-control" name="file" id="cover" @change="onFileChange"-->
                                <!--                                   placeholder="Enter Image" multiple>-->
                                <!--                        </div>-->

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" v-model="news.description" id="description"
                                           placeholder="Enter Description" required>

                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" cols="150" rows="6" id="content"
                                              v-model="news.content"
                                              placeholder="Enter Content" required/>


                                </div>

                                <!--                        <div class="form-group">-->
                                <!--                            <label for="category">Category</label>-->
                                <!--                            <input type="text" v-model="news.category_id" class="form-control" id="category"-->
                                <!--                                   placeholder="Mời nhập công việc" required>-->

                                <!--                        </div>-->

                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" v-model="news.author" class="form-control" id="author"
                                           placeholder="Enter Author" required>

                                </div>

                                <div class="form-group">
                                    <label for="user">User</label>
                                    <input type="text" v-model="news.user_id" class="form-control" id="user"
                                           placeholder="Enter User" required>

                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" v-model="news.category_id">

                                        <option v-for="(data, index) in categories" v-bind:key="index"
                                                v-bind:value="data.id">
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
    </div>
</template>

<script>
export default {
    name: "CreateNews",
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
        categories() {
            return this.$store.getters.cateAdd;
        }
    },
    methods: {
        addNews() {

            this.$store.dispatch('addNews', this.news).then(res => {
                if (res.status == 201) {
                    swal({
                        title: "Create news successfully",
                        icon: "success"
                    })
                    this.$router.push("/news")
                }
            })
        },
        cancel() {
            this.$router.push("/news")
        },
        // onFileChange(e) {
        //     console.log(e);
        //
        // },
        // addImage(file) {
        //     if (!file.type.match('image.*')) {
        //         console.log(`${file.name} is not an image`);
        //         return;
        //     }
        //
        //     this.cover.push(file);
        //
        //     const img = new Image();
        //     const  reader = new FileReader();
        //
        //
        // }
    }
}
</script>

<style scoped>
#cover {
    padding: 40px 15px;
    text-align: center;
    border-radius: 10px;
}
</style>
