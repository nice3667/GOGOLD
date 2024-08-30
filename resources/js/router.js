import { createRouter, createWebHistory } from "vue-router";
import StyleGuide from "@/Pages/style-guide.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/about",
      name: "style-guide",
      component: StyleGuide,
    },
    {
      path: "/style-test",
      name: "style-guide",
      component: StyleGuide,
    },
    { path: "/", name: "หน้าแรก", component: StyleGuide },
    { path: "/about", name: "เกี่ยวกับเรา", component: StyleGuide },
    { path: "/stats", name: "สถิติ", component: StyleGuide },
    { path: "/learn", name: "เรียนรู้", component: StyleGuide },
  ],
});

export default router;
