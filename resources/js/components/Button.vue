<template>
  <section class="overflow-auto">
    <h1>Buttons</h1>
    <div class="flex items-center space-x-2">
      <button class="btn btn-Button1 btn-button1">text</button>
      <button class="btn btn-Button2 btn-button1">text</button>
      <button class="btn btn-Button3 btn-button1">text</button>
      <button class="btn1 btn-Button4 btn-button1">text</button>
    </div>
    s

    <h2 class="mt-3">Table Buttons</h2>
    <div class="flex items-center mt-3 space-x-2">
      <button class="btn-tb btn-table btn-paid">text</button>
      <button class="bg-yellow-500 icon-button">
        <img src="@/assets/icon/edit-icon.svg" alt="" />
      </button>
      <button class="bg-yellow-500 icon-button">
        <img src="@/assets/icon/search-icon.svg" alt="" />
      </button>
      <button class="bg-red-500 icon-button">
        <img src="@/assets/icon/bin-icon.svg" alt="" />
      </button>
    </div>
    <div>
      <h2 class="mt-3">Vuetify Button</h2>
      <v-container class="bt-color" fluid>
        <v-row class="bt-colorrow">
          <v-col cols="12" sm="6" md="4">
            <v-btn
              color="#FFD700"
              variant="elevated"
              text="text"
              size="large"
              min-width="300"
              rounded="xl"
              class="bt1"
            >
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </section>
</template>

<script>
export default {
  name: "Button",
};
</script>
