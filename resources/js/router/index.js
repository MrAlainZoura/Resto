import { createRouter, createWebHistory } from "vue-router";
import Apropos from "../composant/Apropos.vue";
import Error404 from "../composant/Error404.vue";
import Home from "../composant/Home.vue";
import CreateRole from "../role/composant/Create.vue";
import EditeRole from "../role/composant/EditeRole.vue";
import CreateBureau from "../bureau/CreateBureau.vue";

const routes = [
    {
        path:'/',
        component: Home
    },
  
    {
        path:'/apropos',
        component: Apropos
    },
    {
        path:'/role',
        component: CreateRole
    },
    {
        path:'/role/:id',
        component: EditeRole,
        props :true,
        name: 'roleEdit'
    },
    {
        path:'/bureau',
        component: CreateBureau,
        name: 'bureauCreate'
    },
    {
        path:'/bureau/:id',
        component: CreateBureau,
        props :true,
        name: 'bureauCreate'
    },
    {
        path:'/:pathMatch(.*)*',
        component: Error404
    },
]

const router = createRouter({
    history:createWebHistory(),
    routes,
    linkExactActiveClass: 'active'
})

export default router;