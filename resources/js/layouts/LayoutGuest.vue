<template>
  <v-app>
    <v-layout>
      <NavbarGuest />
      <slot />
      <FooterGuest />
    </v-layout>
  </v-app>

</template>

<script setup>
import NavbarGuest from "@/components/navbar/NavbarGuest.vue"
import FooterGuest from "@/components/footer/FooterGuest.vue"
</script>
