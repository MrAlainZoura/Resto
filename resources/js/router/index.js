import { createRouter, createWebHistory } from "vue-router";
import Apropos from "../composant/Apropos.vue";
import Error404 from "../composant/Error404.vue";
import Home from "../composant/Home.vue";

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