<template>
  <div v-if="is_desktop">
    <v-app-bar color="black" flat class="text-white">
      <v-spacer></v-spacer>

      <!-- โปรไฟล์ผู้ใช้งาน -->
      <v-avatar size="45" class="mr-5">
        <img
          src="@/assets/icon/testteeruk.png"
          alt=""
          class="hidden md:block"
        />
      </v-avatar>
      <div class="flex-col justify-center hidden mr-20 md:flex">
        <span class="flex justify-center mr-4 text-[#FFD700]">Wife Nicezy</span>
        <span class="mr-4 text-[#737373]">Thitikorncs@gmail.com</span>
      </div>
    </v-app-bar>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";

// Reactive variables for screen width and checking if desktop
const width = ref(window.innerWidth);
const is_desktop = ref(width.value > 1279);

// Check on page load
onMounted(() => {
  is_desktop.value = width.value > 1279;

  // Listen for window resize events
  window.addEventListener("resize", () => {
    width.value = window.innerWidth;
  });
});

// Watch for changes in width to update `is_desktop`
watch(
  () => width.value,
  (newWidth) => {
    is_desktop.value = newWidth > 1279;
  }
);
</script>

<style scoped>
.text-dashboard {
  color: #ffd700;
  font-size: 15px;
}
.text-yellow-500 {
  color: #ffd700;
}
.bg-yellow-500 {
  background-color: #ffd700;
}
.text-white {
  color: #ffffff;
}
.bg-black {
  background-color: #000000;
}
.btn-signout {
  color: #000000;
  background-color: #ffd700;
  border-radius: 30px;
}
</style>
