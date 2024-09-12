<template>
  <div>
    <div class="w-full mt-5">
      <v-card class="main-table-user h-100">
        <div class="w-full">
          <div class="px-5">
            <div class="mt-5 text-main-table">
              <span>รายการรายชื่อเพื่อนแนะนำ</span>
            </div>
            <v-card class="px-0 py-2 mt-2 p no-border">
              <v-row class="bg-[#1D1D1D] align-center">
                <v-col cols="12" md="2">
                  <v-text-field
                    :placeholder="'เริ่มต้น'"
                    variant="outlined"
                    type="date"
                    class="start-date"
                    rounded="100"
                    hide-details
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    :placeholder="'สิ้นสุด'"
                    variant="outlined"
                    type="date"
                    class="pb-0 last-date"
                    rounded="100"
                    hide-details
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="12" md="1">
                  <v-btn class="btn-search" text="ค้นหา"><b>ค้นหา</b></v-btn>
                </v-col>
                <v-spacer></v-spacer>
                <v-col cols="2">
                  <v-text-field
                    hide-details
                    v-model="search"
                    density="compact"
                    label="ค้นหา"
                    prepend-inner-icon="mdi-magnify"
                    variant="solo"
                    color="bg-white"
                    class="search-field"
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-card>
          </div>
          <v-data-table
            class="table mt-4 table-primary"
            v-model:page="page"
            :headers="headers"
            :items="desserts"
            :items-per-page="itemsPerPage"
          >
            <template v-slot:item="{ item }">
              <tr>
                <!-- <td>{{ item.id }}</td> -->
                <td>{{ item.date }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.order }}</td>
                <td>{{ item.commission }}</td>
                <td class="flex justify-center">
                  <button class="bg-[#B5B2B2] icon-button">
                    <img src="@/assets/icon/search-icon.svg" alt="" />
                  </button>
                </td>
                <!-- <td>{{ item.update_date }}</td> -->
                <!-- <td>
                  <template v-if="item.status == 'wait_payment'">
                    <v-chip class="chip chip-primary">รอชำระเงิน</v-chip>
                  </template>
                  <template v-if="item.status == 'pending'">
                    <v-chip class="chip chip-warning">รอตรวจสอบ</v-chip>
                  </template>
                  <template v-if="item.status == 'success'">
                    <v-chip class="chip chip-success">ชำระเงินแล้ว</v-chip>
                  </template>
                  <template v-if="item.status == 'cancel'">
                    <v-chip class="chip chip-danger">ยกเลิก</v-chip>
                  </template>
                </td>
                <td> -->
                <!-- <template v-if="item.manage == 'report'">
                    <v-btn variant="">
                      <CoreButton-icon
                        class_btn_manage="btn-find"
                        text=""
                        icon="report"
                      />
                    </v-btn>
                  </template>
                  <template v-if="item.manage == 'search'">
                    <v-btn variant="">
                      <CoreButton-icon
                        class_btn_manage="btn-find"
                        text=""
                        icon="find"
                      />
                    </v-btn>
                  </template> -->
                <!-- </td> -->
              </tr>
            </template>

            <template v-slot:bottom>
              <div class="pt-4 pb-6 bg-[#1D1D1D]">
                <v-pagination
                  v-model="page"
                  :length="pageCount"
                  class="pagination"
                ></v-pagination>
              </div>
            </template>
          </v-data-table>
        </div>
      </v-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      page: 1,
      itemsPerPage: 7,
      test_start: "11/11/1111",
      headers: [
        {
          align: "start",
          sortable: false,
          title: "วันที่และเวลา",
          key: "date",
          // title: "ลำดับ",
          // key: "id",
        },
        // { title: "วันที่และเวลา", key: "date" },
        { title: "ชื่อลูกค้า", key: "name" },
        { title: "รายการสั่งซื้อ", key: "order" },
        { title: "ค่าคอมมิชชั่น", key: "commission" },
        { title: "จัดการ", key: "admin" },
        // { title: "อัพเดตล่าสุด", key: "update_date" },
        // { title: "สถานะ", key: "status" },
        // { title: "จัดการ", key: "manage" },
      ],
      desserts: [
        {
          // id: "1",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Starter",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "wait_payment",
          // manage: "report",
        },
        {
          // id: "2",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Business",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "pending",
          // manage: "report",
        },
        {
          // id: "3",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Business",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "success",
          // manage: "report",
        },
        {
          // id: "4",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "CMS",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "cancel",
          // manage: "search",
        },
        {
          // id: "5",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Business",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "pending",
          // manage: "report",
        },
        {
          // id: "6",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "CMS",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "success",
          // manage: "search",
        },
        {
          // id: "7",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "CMS",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "wait_payment",
          // manage: "report",
        },
        {
          // id: "8",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Business",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "success",
          // manage: "search",
        },
        {
          // id: "9",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Enterprise",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "wait_payment",
          // manage: "report",
        },
        {
          // id: "10",
          date: "20 Feb 2022 15.59น.",
          name: "พักผ่อน หย่อนใจ",
          order: "16,395.00 บาท",
          commission: "Starter",
          admin: "Admin_01",
          // update_date: "20 Feb 2022 16.00น.",
          // status: "wait_payment",
          // manage: "report",
        },
      ],
    };
  },
  computed: {
    pageCount() {
      return Math.ceil(this.desserts.length / this.itemsPerPage);
    },
  },
};
</script>
<style scoped lang="scss">
.no-border {
  border: none !important;
  box-shadow: none !important;
}
</style>
