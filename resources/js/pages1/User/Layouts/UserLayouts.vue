<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

onMounted(() => {
  initFlowbite();
});
</script>

<template>
  <!-- tap -->
  <Header></Header>
  <!--  -->
  <!-- main -->
  <hr />
  <slot />
  <!-- end -->

  <!-- footer -->
  <Footer></Footer>
  <!-- end -->
</template>

