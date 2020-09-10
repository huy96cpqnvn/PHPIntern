import ShowCategory from "./components/ShowCategory";
import ShowNews from "./components/ShowNews";


const routes = [
    {path: '/category', name: 'showcate', component: ShowCategory},
    {path: '/news', name: 'shownews', component: ShowNews}
];

export default routes;
