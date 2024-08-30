<template>
  <v-layout>
    <v-app-bar class="flex justify-between color-dark align-center">
      <div class="flex w-full justify-evenly">
        <div class="flex items-center justify-evenly pl-md-7 pl-lg-15">
          <img class="img-toolbar" src="@/assets/icon/logo.jpg" alt="" />
          <div class="sm:flex main-text-toolbar">
            <p class="text-toolbar">{{ company.name }}</p>
            <a href="/home" class="ml-9 text-navbar">{{ company.home }}</a>
            <a href="/stats" class="ml-4 text-navbar">{{ company.stats }}</a>
            <a href="/learn" class="ml-4 text-navbar">{{ company.learn }}</a>
            <a href="/about" class="ml-4 text-navbar">{{ company.about }}</a>
          </div>
        </div>
        <div class="flex items-center pr-md-7 pr-lg-15">
          <v-btn flat href="/login" class="mr-2 btn-login">เข้าสู่ระบบ</v-btn>
          <v-btn flat href="/register" class="btn-register">สมัครสมาชิก</v-btn>
        </div>
      </div>
    </v-app-bar>
  </v-layout>
</template>

//justify-content: space-evenly

  <script setup>
import { ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import { createRouter, createMemoryHistory } from "vue-router";

import { useDisplay } from "vuetify";
import StyleGuide from "@/Pages/style-guide.vue";
import HomePage from "@/Pages/HomePage.vue";
import Form from "../Form.vue";

// const route = useRoute();
// const router = useRouter();
const { width } = useDisplay();
const is_desktop = ref(width.value > 769);

watch(width, (newWidth) => {
  is_desktop.value = newWidth > 769;
});

// const drawer = ref(false);
// const test = () => {
//   console.log("test");
//   router.push({ path: "/style-test" });
// };
const company = ref({
  name: "GOGOLD",
  home: "หน้าหลัก",
  stats: "สถิติ",
  learn: "เรียนรู้",
  about: "เกี่ยวกับเรา",
});
// const router = createRouter({
//   history: createMemoryHistory(),
//   routes,
// });

// const routes = [
//   { path: "/", name: "หน้าแรก", component: StyleGuide },
//   { path: "/about", name: "เกี่ยวกับเรา", component: StyleGuide },
//   { path: "/stats", name: "สถิติ", component: StyleGuide },
//   { path: "/learn", name: "เรียนรู้", component: StyleGuide },
// ];

// const notifications = ref(0);
// const notification_dialog = ref(false);
</script>
<style></style>
