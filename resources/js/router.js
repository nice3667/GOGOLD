import { createRouter, createWebHistory } from "vue-router";
import StyleGuide from "@/Pages/style-guide.vue";



const router = createRouter({
    history: createWebHistory(),
    routes: [

        {
            path: '/style-test',
            name: 'style-guide',
            component: StyleGuide
        },
        {
            path: '/style-test',
            name: 'style-guide',
            component: StyleGuide
        }
    ]
})

export default router
