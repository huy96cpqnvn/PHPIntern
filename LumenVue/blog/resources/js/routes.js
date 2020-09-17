import ShowCategory from "./components/ShowCategory";
import ShowNews from "./components/ShowNews";
import CreateCategory from "./components/CreateCategory";
import EditCategory from "./components/EditCategory";
import CreateNews from "./components/CreateNews";
import EditNews from "./components/EditNews";


const routes = [
    {path: '/news', name: 'showNews', component: ShowNews},
    {path: '/news/create', name: 'createNews', component: CreateNews},
    {path: '/news/edit/:id', name: 'editNews', component: EditNews},

    {path: '/category', name: 'showCate', component: ShowCategory},
    {path: '/category/create', name: 'createCate', component: CreateCategory},
    {path: '/category/edit/:id', name: 'editCate', component: EditCategory}

];

export default routes;
