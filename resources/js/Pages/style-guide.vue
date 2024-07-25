<template>
  <div class="card">
    <h1 class="mb-3 font-bold sg">Style Guide</h1>

    <v-card>
      <v-tabs v-model="tab" bg-color="primary">
        <v-tab value="1">Typography</v-tab>
        <v-tab value="2">Color</v-tab>
        <v-tab value="3">Buttons</v-tab>
        <v-tab value="4">Forms</v-tab>
        <v-tab value="5">Table</v-tab>
        <v-tab value="6">Misc.</v-tab>
      </v-tabs>

      <v-card-text>
        <v-tabs-window v-model="tab">
          <v-tabs-window-item value="1">
            <section class="overflow-auto">
              <h1 class="mb-3 font-bold">Typography</h1>
              <h1>Heading h1 - 28px</h1>
              <h2>Heading h2 - 22px</h2>
              <h3>Heading h3 - 20px</h3>
              <h4>Heading h4 - 18px</h4>
              <h5>Heading h5 - 16px</h5>
              <h6>Heading h6 - 14px</h6>
              <label>Label label - 18px</label>
              <p>Paragraph p - 16px</p>

              <h2 class="mt-5 mb-3 font-bold">Font Weight</h2>
              <p class="font-light">Font Weight Light - 300</p>
              <p class="font-normal">Font Weight Regular - 400</p>
              <p class="font-medium">Font Weight Medium - 500</p>
              <p class="font-semibold">Font Weight Semi Bold - 600</p>
              <p class="font-bold">Font Weight Bold - 700</p>
            </section>
          </v-tabs-window-item>

          <v-tabs-window-item value="2"> </v-tabs-window-item>

          <v-tabs-window-item value="3">
            <section class="overflow-auto">
              <h1>Buttons</h1>
              <div class="flex items-center space-x-2">
                <button class="btn btn-Button1 btn-button1">text</button>
                <button class="btn btn-Button2 btn-button1">text</button>
                <button class="btn btn-Button3 btn-button1">text</button>
                <button class="btn1 btn-Button4 btn-button1">text</button>
              </div>

              <h2>Table Buttons</h2>
              <div class="flex items-center space-x-2">
                <button class="btn-tb btn-table btn-paid">ชำระแล้ว</button>
                <button class="btn-tb btn-table btn-waiting">
                  รอการชำระเงิน
                </button>
                <button class="btn-tb btn-table btn-search btn-icon">
                  search
                </button>
                <button class="btn-tb btn-table btn-edit btn-icon">edit</button>
                <button class="btn-tb btn-table btn-unknow btn-icon">
                  unknow
                </button>
              </div>
            </section>
          </v-tabs-window-item>

          <v-tabs-window-item value="4"> 4 </v-tabs-window-item>

          <v-tabs-window-item value="5"> 5 </v-tabs-window-item>

          <v-tabs-window-item value="6"> 6 </v-tabs-window-item>
        </v-tabs-window>
      </v-card-text>
    </v-card>
  </div>
</template>
<script>
export default {
  data: () => ({
    tab: null,
  }),
};
</script>

<style>
.overflow-auto {
  overflow: auto !important;
}

.overflow-auto {
  overflow: auto;
}
.items-center {
  align-items: center;
}
.flex {
  display: flex;
}
/* .btn {
  border-radius: 20px;
  cursor: pointer;
  font-weight: 500;
  padding: 10px 50px;
  text-overflow: ellipsis;
}
.btn.btn-button1 {
  align-items: center;
  display: flex;
  justify-content: center;
}
.btn-Button1 {
  background-color: #ffd700;
  color: #000000;
}
.btn-Button2 {
  background-color: #8c8c8c;
  color: #ffffff;
}
.btn-Button3 {
  background-color: #3d3d3d;
  color: #000000;
} */
</style>
