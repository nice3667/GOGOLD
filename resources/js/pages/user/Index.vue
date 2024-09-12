<template>
  <div class="color-info">
    <v-banner v-if="deferredPrompt" color="info" dark class="text-left">
      Get our free app. It won't take up space on your phone and also works offline!
      <template v-slot:actions>
        <v-btn text @click="dismiss">Dismiss</v-btn>
        <v-btn text @click="install">Install</v-btn>
      </template>
    </v-banner>

    <div class="navbar-title">
      <div class="">
        <div class="body-home-title sm:font-normal">Lorem ipsum dolor sit amet consectetur.</div>

        <div class="flex justify-center body-home">
          <div class="main-text-bodyhome">
            Lorem ipsum dolor sit amet consectetur. Eget netus feugiat bibendum vitae donec lectus sapien aliquet eu.
            Congue
            amet morbi sed dictum scelerisque
            fringilla amet. Eget aliquam sit pretium dolor. Sagittis laoreet eget vitae donec tincidunt adipiscing mi
            congue.
          </div>
        </div>
        <div class="flex justify-center">
          <v-btn href="/register" class="body-home-btn">สมัครเลย!</v-btn>
        </div>
      </div>
    </div>

    <TableHomepage />
    <CommentHomepage />
    <MainTableHomepage />
    <CommentGroupHomepage />
    <ImageHomepage />
  </div>
</template>
<script setup>
import TableHomepage from "@/components/homepage/TableHomepage.vue"
import CommentHomepage from "@/components/homepage/CommentHomepage.vue"
import MainTableHomepage from "@/components/homepage/MainTableHomepage.vue"
import CommentGroupHomepage from "@/components/homepage/CommentGroupHomepage.vue"
import ImageHomepage from "@/components/homepage/ImageHomepage.vue"
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
