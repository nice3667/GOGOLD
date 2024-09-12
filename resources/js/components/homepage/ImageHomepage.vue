<template>
  <div class="flex justify-between p-10 mt-10 space-x-10">
    <div class="flex flex-col">
      <div class="text-image-home">
        <p>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat b</p>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="ma-4">
        <v-img :aspect-ratio="1" class="bg-white" src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
          width="400" cover></v-img>
      </div>
    </div>
  </div>
  <div class="flex justify-between p-10 mt-10 space-x-10">
    <div class="flex flex-col">
      <div class="ma-4">
        <v-img :aspect-ratio="1" class="bg-white" src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
          width="400" cover></v-img>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="text-image-home">
        <p>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat b</p>
      </div>
      <div class="flex justify-center">
        <v-btn href="/register" class="body-home-btn">สมัครเลย!</v-btn>
      </div>
    </div>
  </div>
</template>
