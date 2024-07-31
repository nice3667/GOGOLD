<template>
  <v-container>
    <v-row>
      <v-col>
        <v-card-title class="text-white d-flex align-center pe-2">
          &nbsp; ข้อมูลสมาชิก

          <v-spacer></v-spacer>
          <v-spacer></v-spacer>
          <v-spacer></v-spacer>

          <v-text-field
            v-model="search"
            density="compact"
            label="Search"
            prepend-inner-icon="mdi-magnify"
            variant="solo-filled"
            flat
            hide-details
            single-line
          ></v-text-field>
          <template v-slot:header.status>
            <div class="text-end">Status</div>
          </template>
        </v-card-title>
      </v-col>
    </v-row>
    <v-data-table
      :headers="headers"
      :items="filteredItems"
      class="elevation-1 black-table"
    >
      <template v-slot:[`item.actions`]="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
      </template>
    </v-data-table>

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
                <v-select
                  v-model="editedItem.status"
                  :items="['เปิดใช้งาน', 'ปิดใช้งาน']"
                  label="Status"
                ></v-select>
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
      dialog: false,
      headers: [
        { text: "ID", value: "id" },
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
          id: "00754745671",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: true,
        },
        {
          id: "00345657381",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "005679581",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0076981",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "004561",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "00-0987651",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "00456781",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "009876501",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0034571",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "000987651",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "045701",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0567801",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "9678001",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0678901",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0034561",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        {
          id: "0073451",
          name: "เจมส์ ฟราวด์สท์",
          email: "Jame01@gmail.com",
          phone: "087-8778-875",
          package: "Diamond",
          registration_date: "22/04/2567 15:59น.",
          status: "เปิดใช้งาน",
        },
        // Add more items here
      ],
      editedIndex: -1,
      editedItem: {
        id: "",
        name: "",
        email: "",
        phone: "",
        package: "",
        registration_date: "",
        status: "",
      },
      defaultItem: {
        id: "",
        name: "",
        email: "",
        phone: "",
        package: "",
        registration_date: "",
        status: "",
      },
    };
  },
  computed: {
    filteredItems() {
      if (!this.search) {
        return this.items;
      }
      const searchLower = this.search.toLowerCase();
      return this.items.filter((item) => {
        return Object.keys(item).some((key) =>
          String(item[key]).toLowerCase().includes(searchLower)
        );
      });
    },
  },
  methods: {
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
    closeDialog() {
      this.dialog = false;
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    },
    saveItem() {
      if (this.editedIndex > -1) {
        Object.assign(this.items[this.editedIndex], this.editedItem);
      } else {
        this.items.push(Object.assign({}, this.editedItem));
      }
      this.closeDialog();
    },
  },
};
</script>
<style scoped>
.v-data-table {
  background-color: #2c2c2c;
  color: white;
}
.v-data-table .v-data-table__wrapper {
  background-color: #2c2c2c;
}
.v-data-table-header th,
.v-data-table__tbody td {
  color: white;
}
.black-table {
  background-color: #2c2c2c;
}
</style>
