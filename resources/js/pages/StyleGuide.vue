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
            <div>
              <Text />
            </div>
          </v-tabs-window-item>

          <v-tabs-window-item value="2">
            <div>
              <ColorShowcase />
            </div>
          </v-tabs-window-item>

          <v-tabs-window-item value="3">
            <div>
              <Button />
            </div>
          </v-tabs-window-item>

          <v-tabs-window-item value="4">
            <div>
              <Form />
            </div>
          </v-tabs-window-item>

          <v-tabs-window-item value="5">
            <div>
              <Table />
            </div>
          </v-tabs-window-item>

          <v-tabs-window-item value="6">
            <div>
              <UserStatsMain />
            </div>
          </v-tabs-window-item>
        </v-tabs-window>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
import Text from "@/components/Text.vue";
import Table from "@/components/TableTest.vue";
import ColorShowcase from "@/components/ColorShowcase.vue";
import UserStatsMain from "@/components/UserStatsMain.vue";
import Form from "@/components/Form.vue";
import Button from "@/components/Button.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});
export default {
  name: "Dashboard",
  components: {
    Text,
    Table,
    ColorShowcase,
    UserStatsMain,
    Form,
    Button,
  },

  data() {
    return {
      tab: null,
    };
  },
};
</script>


