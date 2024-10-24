<template>
  <div class="w-full" style="margin-top: 64px">
    <v-banner v-if="deferredPrompt" dark class="text-left !bg-slate-500">
      คุณสามารถติดตั้งแอพลิเคชั่นของเว็บไซค์นี้ได้
      <template v-slot:actions>
        <v-btn class="!text-secondary" text @click="dismiss">ไม่สนใจ</v-btn>
        <v-btn class="!text-primary" text @click="install">ติดตั้งเลย</v-btn>
      </template>
    </v-banner>

    <HomepageGuest />
  </div>
</template>
<script setup>
import HomepageGuest from "@/components/homepage/HomepageGuest.vue";
import { ref, onBeforeMount } from "vue";
// import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

// defineOptions({
//   layout: LayoutAuthenticate,
// });

const deferredPrompt = ref(null);
onBeforeMount(() => {
  window.addEventListener("beforeinstallprompt", (e) => {
    console.log("e ", e);
    e.preventDefault();
    deferredPrompt.value = e;
  });
});

const dismiss = async () => {
  deferredPrompt.value = null;
};
const install = async () => {
  deferredPrompt.value.prompt();
  const { outcome } = await deferredPrompt.value.userChoice;
  if (outcome === "accepted") {
    deferredPrompt.value = null;
  }
};
</script>
<style></style>
