<template>
  <v-toolbar v-if="is_desktop" class="justify-center toolbar-nav">
    <v-row class="toolbar-layout">
      <!-- Logo Title -->
      <div class="container justify-center hidden md:flex">
        <v-col>
          <v-sheet class="text-navbar">
            <span class="text-navbarHeder">GOGOLD</span>
            <a href="/" class="text-navbar">หน้าแรก</a>
            <a href="/" class="text-navbar">สถิติ</a>
            <a href="/" class="text-navbar">เรียนรู้</a>
            <a href="/" class="text-navbar">เกี่ยวกับเรา</a>
          </v-sheet>
        </v-col>

        <v-col class="flex justify-start">
          <v-sheet class="text-navbar">
            <v-btn flat href="/" class="ml-10 btn-login">เข้าสู่ระบบ</v-btn>
            <v-btn flat href="/" class="btn-register">สมัครสมาชิก</v-btn>
          </v-sheet>
        </v-col>
      </div>
    </v-row>
  </v-toolbar>
  <div class="nav-title">
    <v-layout v-if="!is_desktop">
      <v-navigation-drawer
        v-model="drawer"
        :location="$vuetify.display.mobile ? 'left' : undefined"
        temporary
      >
        <v-list class="list-toolbar" :items="items"></v-list>
      </v-navigation-drawer>
    </v-layout>
    <v-layout v-if="!is_desktop" class="toolbar-layout">
      <v-app-bar-nav-icon
        class="nav-toolbar"
        variant="text"
        @click.stop="drawer = !drawer"
      ></v-app-bar-nav-icon>

      <p class="text-title">GOGOLD</p>

      <v-spacer></v-spacer>

      <v-btn icon variant="text">
        <v-icon class="toolbar-icon">mdi-bell</v-icon>
      </v-btn>
    </v-layout>
  </div>
</template>
<script setup>
import { ref, watch } from "vue";
import { createRouter, createMemoryHistory } from "vue-router";
import StyleGuide from "@/Pages/style-guide.vue";
import Form from "../Form.vue";
import { useDisplay } from "vuetify";

const { width } = useDisplay();
const is_desktop = ref(width.value > 769);
watch(width, (newWidth) => {
  is_desktop.value = newWidth > 769;
});
const routes = [
  { path: "/", name: "Home", component: StyleGuide },
  { path: "/about", name: "เกี่ยวกับเรา", component: Form },
  { path: "/stats", name: "สถิติ", component: Form },
  { path: "/learn", name: "เรียนรู้", component: Form },
];

const router = createRouter({
  history: createMemoryHistory(),
  routes,
});
const drawer = ref(false);

const items = [
  {
    title: "Foo",
    value: "foo",
  },
  {
    title: "Bar",
    value: "bar",
  },
  {
    title: "Fizz",
    value: "fizz",
  },
  {
    title: "Buzz",
    value: "buzz",
  },
];
</script>
<style scoped>
.toolbar-layout {
  width: 100%;
  height: 64px;
}
.toolbar-icon {
  color: #ffd700;
}
.nav-title {
  background-color: #000000;
  /* width: 100%;
  height: 64px; */
}

.text-title {
  color: #ffd700;
  font-size: 20px;
}
.nav-toolbar {
  color: #ffd700;
}
.btn-login {
  background-color: #252525;
  border-radius: 30px;
  color: #ffffff;
  font-size: 15px;
  width: 130px;
  height: 40px;
  margin-right: 10px;
}

.btn-register {
  background-color: #ffd700;
  border-radius: 30px;
  color: #000000;
  font-size: 15px;
  width: 130px;
  height: 40px;
}
.toolbar-nav {
  background-color: #000000;
}
.span-title {
  /* background-color: #ffffff; */
  color: #ffd700;
  font-size: 35px;
}
.text-navbarHeder {
  background-color: #000000;
  color: #ffd700;
  font-size: 25px;
}
.text-navbar {
  background-color: #000000;
  margin-left: 20px;
  margin-right: 20px;
  color: #ffd700;
}
.v-toolbar__content {
  display: flex;
  justify-content: center;
}
@media screen and (min-width: 200px) and (max-width: 375px) {
  .text-navbarHeder {
    font-size: 7px;
  }
  .text-navbar {
    font-size: 7px;
  }
}

@media screen and (max-width: 600px) {
  .text-navbarHeder {
    font-size: 18px;
  }
  .btn-login,
  .btn-register {
    width: 100px;
    font-size: 14px;
  }
}
</style>
