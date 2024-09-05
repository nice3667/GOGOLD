<template>
  <div class="p-4 bg-[#1D1D1D] mt-5 main-content shadow-md">
    <v-container class="p-4 text-black main-content">
      <!-- Filter Section -->
      <v-row class="mb-4">
        <v-col cols="12" md="3">
          <v-text-field
            v-model="startDate"
            label="เริ่มต้น"
            prepend-icon="mdi-calendar"
            readonly
            rounded=""
            class="text-white bg-gray-800 rounded"
            @click:append="showStartPicker = true"
          ></v-text-field>
          <v-menu
            v-model="showStartPicker"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
          >
            <v-date-picker
              v-model="startDate"
              @input="showStartPicker = false"
              class="text-white bg-gray-800"
            ></v-date-picker>
          </v-menu>
        </v-col>

        <v-col cols="12" md="3">
          <v-text-field
            v-model="endDate"
            label="สิ้นสุด"
            prepend-icon="mdi-calendar"
            readonly
            rounded=""
            class="text-white bg-gray-800 rounded"
            @click:append="showEndPicker = true"
          ></v-text-field>
          <v-menu
            v-model="showEndPicker"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
          >
            <v-date-picker
              v-model="endDate"
              @input="showEndPicker = false"
              class="text-white bg-gray-800"
            ></v-date-picker>
          </v-menu>
        </v-col>

        <v-col cols="12" md="2">
          <v-btn class="text-white bg-gray-700" @click="search"> ค้นหา </v-btn>
        </v-col>

        <v-col cols="12" md="4" class="text-right">
          <v-text-field
            v-model="searchQuery"
            placeholder="ค้นหา"
            append-icon="mdi-magnify"
            class="text-white bg-gray-800 rounded"
          ></v-text-field>
        </v-col>
      </v-row>

      <!-- Data Table -->
      <v-data-table
        :headers="headers"
        :items="items"
        class="text-white bg-gray-800 rounded"
      >
        <template #item.actions="{ item }">
          <v-icon class="cursor-pointer" @click="viewItem(item)">
            mdi-magnify
          </v-icon>
        </template>
      </v-data-table>

      <!-- Pagination -->
      <v-pagination
        v-model="page"
        :length="10"
        class="flex justify-center mt-4 text-white"
      ></v-pagination>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      startDate: null,
      endDate: null,
      searchQuery: "",
      showStartPicker: false,
      showEndPicker: false,
      page: 1,
      headers: [
        { text: "วันที่และเวลา", value: "date" },
        { text: "ชื่อ-นามสกุล", value: "name" },
        { text: "รายการสั่งซื้อ", value: "order" },
        { text: "ค่าคอมมิชชั่น", value: "commission" },
        { text: "จัดการ", value: "actions", sortable: false },
      ],
      items: [
        // Sample data, replace with your data source
        {
          date: "22/04/2567 15:59น.",
          name: "เจมส์ ฟรอกซี่",
          order: "Gold",
          commission: "0.70%",
        },
        {
          date: "22/04/2567 15:59น.",
          name: "เจมส์ ฟรอกซี่",
          order: "Gold",
          commission: "0.70%",
        },
        {
          date: "22/04/2567 15:59น.",
          name: "เจมส์ ฟรอกซี่",
          order: "Gold",
          commission: "0.70%",
        },
        // Add more items as needed
      ],
    };
  },
  methods: {
    search() {
      // Implement search functionality
      console.log(
        "Searching with:",
        this.startDate,
        this.endDate,
        this.searchQuery
      );
    },
    viewItem(item) {
      // Implement action button functionality
      console.log("Viewing item:", item);
    },
  },
};
</script>

<style scoped>
.main-content {
  border-radius: 16px;
  background-color: #1d1d1d;
}
</style>
