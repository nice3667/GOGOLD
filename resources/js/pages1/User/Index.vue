<template>
  <div class="color-info">
    <NavbarHomepage />
    <v-banner v-if="deferredPrompt" color="info" dark class="text-left">
      Get our free app. It won't take up space on your phone and also works offline!
      <template v-slot:actions>
        <v-btn text @click="dismiss">Dismiss</v-btn>
        <v-btn text @click="install">Install</v-btn>
      </template>
    </v-banner>
    <BodyHomepage />

    <div class="flex justify-center">
      <TableHomepage />
    </div>
    <div class="flex justify-center">
      <CommentHomepage />
    </div>
    <div class="flex justify-center">
      <MainTableHomepage />
    </div>
    <div class="flex justify-center">
      <CommentGroupHomepage />
    </div>
    <div class="flex justify-center">
      <ImageHomepage />
    </div>
    <div class="flex justify-center">
      <FooterHomepage />
    </div>
  </div>
</template>
<script setup>
import NavbarHomepage from "@/components/navbar/NavbarHomepage.vue"
import BodyHomepage from "@/components/Homepage/BodyHomepage.vue"
import TableHomepage from "@/components/Homepage/TableHomepage.vue"
import CommentHomepage from "@/components/Homepage/CommentHomepage.vue"
import MainTableHomepage from "@/components/Homepage/MainTableHomepage.vue"
import CommentGroupHomepage from "@/components/Homepage/CommentGroupHomepage.vue"
import ImageHomepage from "@/components/Homepage/ImageHomepage.vue"
import FooterHomepage from "@/components/Homepage/FooterHomepage.vue"
import { ref, onBeforeMount } from "vue"

const deferredPrompt = ref(null)
onBeforeMount(() => {
  window.addEventListener("beforeinstallprompt", (e) => {
    console.log("e ", e)
    e.preventDefault()
    deferredPrompt.value = e
  })
})

const dismiss = async () => {
  deferredPrompt.value = null
}
const install = async () => {
  deferredPrompt.value.prompt()
  const { outcome } = await deferredPrompt.value.userChoice
  if (outcome === "accepted") {
    deferredPrompt.value = null
  }
}
</script>
<style></style>
