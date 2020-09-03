///Cách 1
import ShowView from "./components/ShowView";
import Create from "./components/CreateTodo";
import Edit from "./components/EditTodo";

const routes = [
    { path: '/',name: 'todo', component: ShowView },
    { path: '/todo/create', name: 'create', component: Create },
    { path: '/todo/edit/:id', name: 'edit', component: Edit },
];



export  default routes;


