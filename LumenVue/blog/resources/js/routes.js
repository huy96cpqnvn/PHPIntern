import ShowCategory from "./components/ShowCategory";
import ShowNews from "./components/ShowNews";
import CreateCategory from "./components/CreateCategory";
import EditCategory from "./components/EditCategory";
import CreateNews from "./components/CreateNews";
import EditNews from "./components/EditNews";
import Register from "./components/Register";
import Login from "./components/Login";
import Dashboard from "./components/Dashboard";


const routes = [
    {path: '/news', name: 'showNews', component: ShowNews, meta: {
            auth: true
        }},
    {path: '/news/create', name: 'createNews', component: CreateNews,meta: {
            auth: true
        }},
    {path: '/news/edit/:id', name: 'editNews', component: EditNews, meta: {
            auth: true
        }},

    {path: '/category', name: 'showCate', component: ShowCategory, meta: {
            auth: true
        }},
    {path: '/category/create', name: 'createCate', component: CreateCategory, meta: {
            auth: true
        }},
    {path: '/category/edit/:id', name: 'editCate', component: EditCategory, meta: {
            auth: true
        }},

    {path: '/login', name: 'login', component: Login, meta: {
            auth: false
        }},
    {path: '/register', name: 'register', component: Register, meta: {
            auth: false
        }},
    {path: '/dashboard', name: 'dashboard', component: Dashboard, meta: {
            auth: true
        }},

];

export default routes;
