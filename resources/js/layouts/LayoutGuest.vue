<template>
  <v-layout>
    <NavbarGuest />
    <v-main>
      <slot />
      <FooterGuest />
    </v-main>
  </v-layout>
</template>

<script setup>
import NavbarGuest from "@/components/navbar/NavbarGuest.vue"
import FooterGuest from "@/components/footer/FooterGuest.vue"
</script>
