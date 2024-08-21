<template>
  <v-container>
    <!-- Header with Search Field -->
    <v-row>
      <v-col>
        <v-card-title class="testhead"> รายชื่อลูกค้า </v-card-title>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-text-field
          v-model="startDate"
          variant="outlined"
          label="เริ่มต้น"
          type="date"
          prepend-inner-icon="mdi-calendar"
          class="v-start"
          rounded="100"
        ></v-text-field>
      </v-col>

      <v-col>
        <v-text-field
          v-model="endDate"
          variant="outlined"
          label="สิ้นสุด"
          type="date"
          prepend-inner-icon="mdi-calendar"
          class="v-end"
          rounded="100"
        ></v-text-field>
      </v-col>
      <v-col>
        <div class="select-wrapper">
          <label for="status" class="select-label">สถานะ</label>
          <select v-model="selectedStatus" id="status" class="custom-select">
            <option :value="null">ทั้งหมด</option>
            <option :value="true">เปิดใช้งาน</option>
            <option :value="false">ปิดใช้งาน</option>
          </select>
        </div>
      </v-col>
      <v-col>
        <v-btn class="move-left" dark @click="searchItems"> ค้นหา </v-btn>
      </v-col>
      <v-spacer></v-spacer>
      <v-col>
        <v-card-title class="n-search">
          <v-text-field
            v-model="search"
            density="compact"
            label="ค้นหา"
            prepend-inner-icon="mdi-magnify"
            variant="solo"
            hide-details
            flat
            color="white"
            class="search-field"
          ></v-text-field>
        </v-card-title>
      </v-col>
    </v-row>
    <v-data-table
      :headers="headers"
      :items="filteredItems"
      class="elevation-1 black-table"
      :footer-props="{ 'items-per-page-options': [10] }"
    >
      <template v-slot:[`item.name`]="{ item }">
        <v-avatar size="36px" class="mr-2">
          <img :src="item.avatar" alt="Avatar" />
        </v-avatar>
        <span>{{ item.name }}</span>
      </template>

      <template v-slot:[`item.status`]="{ item }">
        <v-chip
          :color="item.status ? 'green' : 'red'"
          :text="item.status ? 'เปิดใช้งาน' : 'ปิดใช้งาน'"
          class="bg-black text-uppercase"
          size="small"
          label
        ></v-chip>
      </template>

      <template v-slot:[`item.actions`]="{ item }">
        <v-btn icon class="custom-btn yellow-btn" @click="ViewItems(item)">
          <v-icon small class="custom-icon">mdi-magnify</v-icon>
        </v-btn>
        <v-btn icon class="custom-btn yellow-btn ma-2" @click="editItem(item)">
          <v-icon small class="custom-icon">mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon class="custom-btn yellow-btn1" @click="deleteItem(item)">
          <v-icon small class="custom-icon">mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>

    <!-- Dialog for Editing Items -->
    <v-dialog v-model="dialog" max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline"
            >{{ editedIndex === -1 ? "Add" : "Edit" }} Item</span
          >
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="editedItem.name"
                  label="Name"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="editedItem.email"
                  label="Email"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="editedItem.phone"
                  label="Phone"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="editedItem.package"
                  label="Package"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="editedItem.registration_date"
                  label="Registration Date"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <label for="status">Status</label>
                <select
                  v-model="editedItem.status"
                  id="status"
                  class="custom-select"
                >
                  <option :value="true">เปิดใช้งาน</option>
                  <option :value="false">ปิดใช้งาน</option>
                </select>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDialog">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="saveItem">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      startDate: "",
      endDate: "",
      selectedStatus: null, // เพิ่มค่า selectedStatus
      statuses: [
        { text: "ทั้งหมด", value: null },
        { text: "เปิดใช้งาน", value: true },
        { text: "ปิดใช้งาน", value: false },
      ],
      dialog: false,
      headers: [
        { text: "ไอดี", value: "id" },
        { text: "ชื่อ-นามสกุล", value: "name" },
        { text: "อีเมล", value: "email" },
        { text: "เบอร์โทรศัพท์", value: "phone" },
        { text: "แพ็กเกจ", value: "package" },
        { text: "วันที่และเวลาที่สมัคร", value: "registration_date" },
        { text: "สถานะ", value: "status" },
        { text: "จัดการ", value: "actions", sortable: false },
      ],
      items: [
        {
          id: "001",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "002",
          name: "เจมส์ คาราเต้",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: false,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "003",
          name: "เจมส์ ฟิตเนต",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "004",
          name: "เจมส์ ลูกค้า",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: false,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "005",
          name: "เจมส์ มาม่า",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "006",
          name: "เจมส์ สาวสวย",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: false,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "007",
          name: "เจมส์ ชั้น5",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "008",
          name: "เจมส์ มาม่าปลากระป๋อง",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "009",
          name: "เจมส์ ห้องสาว",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: false,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
        {
          id: "010",
          name: "เจมส์ ลาวเต้อะ",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "2024-04-22T15:59:00",
          status: true,
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        },
      ],
      editedIndex: -1,
      editedItem: {},
    };
  },
  computed: {
    filteredItems() {
      let filtered = this.items;

      // ค้นหาจากชื่อ
      if (this.search) {
        filtered = filtered.filter((item) => item.name.includes(this.search));
      }

      // วันที่เริ่มต้น
      if (this.startDate) {
        filtered = filtered.filter(
          (item) => new Date(item.registration_date) >= new Date(this.startDate)
        );
      }

      // วันที่สิ้นสุด
      if (this.endDate) {
        filtered = filtered.filter(
          (item) => new Date(item.registration_date) <= new Date(this.endDate)
        );
      }

      // สถานะที่เลือก
      if (this.selectedStatus !== null) {
        filtered = filtered.filter(
          (item) => item.status === this.selectedStatus
        );
      }

      return filtered;
    },
  },
  methods: {
    ViewItem(item) {
      console.log("View Item:", item);
    },
    searchItems() {
      console.log("Searching...");
    },
    editItem(item) {
      this.editedIndex = this.items.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.items.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.items.splice(index, 1);
    },
    saveItem() {
      if (this.editedIndex > -1) {
        Object.assign(this.items[this.editedIndex], this.editedItem);
      } else {
        this.items.push(this.editedItem);
      }
      this.closeDialog();
    },
    closeDialog() {
      this.dialog = false;
      this.editedItem = {};
      this.editedIndex = -1;
    },
  },
};
</script>


<style scoped>
.testhead {
  font-size: 100px;
  color: white;
}
.black-table {
  background-color: #1f1f1f;
  color: white;
}

.yellow-btn1 {
  background-color: #f56565 !important;
  color: #333 !important;
}

.yellow-btn {
  background-color: #ffd700 !important;
  color: #333 !important;
}

.v-avatar img {
  border-radius: 50%;
}

.custom-icon {
  margin-top: -6px;
}

.custom-btn {
  height: 26px;
  width: 26px;
  border-radius: 5px;
  padding: 8px;
}

.v-data-table__wrapper {
  background-color: #1f1f1f;
}

.v-dialog .v-card {
  background-color: #333;
  color: white;
}
.search-field .v-card-title {
  border-radius: 30px;

  margin-top: 7%;
}

.move-left {
  margin-right: 40%;
  margin-top: 11%;
  background-color: yellow;
  height: 40px;
  min-width: 100px;
  border-radius: 90px;
  font-size: x-large;
}
.n-search .v-input {
  margin-right: 40%;
  margin-top: 10%;
  height: 40px;
  min-width: 100%;
}

.custom-select {
  margin-top: 11%;
  background-color: #2c2c2c;
  color: #e5e7eb;
  padding: 10px;
  border-radius: 30px;
  border: 1px solid #e5e7eb;
}

.custom-select option {
  background-color: #2c2c2c;
  color: white;
}
</style>
