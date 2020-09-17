<template>
<div>
    <div class="container">
        <div class="row m-2">
            <label class="col-sm-2 col-form-label font-weight-bold pull-right">Phân Loại:</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="status" v-model="status" @change="showNewsByStatus">
                    <option disabled value="All">--All--</option>
                    <option value="1">Publish</option>
                    <option value="2">Draff</option>
                </select>
            </div>
            <div class="col-sm-4">
                <router-link to="/news/create"><button class="btn-primary btn-sm">Add News</button></router-link>
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
<!--                <th>Cover</th>-->
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(news, index) in news" v-bind:key="index">
                <td>
                    {{ news.title }}
                </td>
                <td>{{ news.category}}</td>
                <td>{{ news.description }}</td>
                <td>{{ news.author }}</td>
                <td>
                    <span>
                        {{ news.status == 1 ? 'Publish' : 'Draff'}}
                    </span>
                </td>
<!--                <td>{{ news.cover }}</td>-->
                <td class="text-center">
                    <button class="btn-danger btn-sm" v-on:click="deleteNews(news.id)">Delete</button>
                    <router-link :to="{name:'editNews', params:{id:news.id}}"><button class="btn-primary btn-sm">Edit</button></router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    name: "ShowNews",
    data() {
        return {
            status: "All"
            }
        },
    created() {
        this.getList();
    },
    computed: {
        news() {
            return this.$store.getters.newsAdd;
        }
},
    methods:
        {
            getList() {
                this.$store.dispatch('getNews')
            },
            showNewsByStatus() {
              this.$store.dispatch('showNewsByStatus', {status: this.status}).then(res => {
                  this.$store.commit('News_Add', res.data)
              })
            },
            deleteNews(id) {
                swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    buttons: {
                        confirm: true,
                        cancel: true
                    },
                    dangerMode: true
                }).then((willDelete) =>
                {
                    if(willDelete) {
                        this.$store.dispatch('deleteNews', {
                            id: id
                        }).then(res => {
                            if(res.status == 200) {
                                this.getList();
                                swal({
                                    title: "Delete News Successfully",
                                    icon: "success"
                                })
                            } else{
                                swal({
                                    title: "error",
                                    icon: "warning"
                                })
                            }
                        })
                    }
                })
            }
        }
}
</script>

<style scoped>

</style>
