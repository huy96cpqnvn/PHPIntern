///Cách 1
import ShowView from "./components/ShowView";
import Create from "./components/CreateTodo";
import Edit from "./components/EditTodo";

const routes = [
    { path: '/', component: ShowView },
    { path: '/todo/create', component: Create },
    { path: '/todo/create/{id}', component: Edit },
];



export  default routes;


