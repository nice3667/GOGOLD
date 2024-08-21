<template>
  <v-container fluid class="pa-0">
    <v-card class="pa-8" color="#2c2c2c" dark>
      <v-card-title class="mb-5">
        <h2 class="header">ตั้งค่า</h2>
      </v-card-title>
      <v-card-text>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
              class="border-box"
              label="ชื่อแพ็กเกจ"
              placeholder="กรุณากรอกชื่อ"
              variant="outlined"
              rounded=""
              dense
              hide-details
              color="grey"
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              class="border-box"
              label="ราคา"
              placeholder="กรุณากรอกราคา"
              variant="outlined"
              rounded=""
              dense
              hide-details
              color="grey"
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              class="border-box"
              label="อายุแพ็กเกจ (วัน)"
              placeholder="กรุณากรอกอายุแพ็กเกจ"
              variant="outlined"
              rounded=""
              dense
              hide-details
              color="grey"
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              class="border-box"
              label="หมายเลขโทรศัพท์"
              placeholder="กรุณากรอกหมายเลขโทรศัพท์"
              variant="outlined"
              rounded=""
              dense
              hide-details
              color="grey"
            ></v-text-field>
          </v-col>
        </v-row>

        <h2 class="mt-6 mb-4 text-2xl">คำอธิบาย</h2>
        <v-row v-for="(detail, index) in details" :key="index" align="center">
          <v-col>
            <v-text-field
              class="border2-box"
              v-model="detail.detail"
              placeholder="กรุณากรอกรายละเอียด"
              variant="outlined"
              rounded=""
              dense
              hide-details
              color="grey"
            ></v-text-field>
          </v-col>
          <v-col cols="auto">
            <v-btn
              icon
              @click="removeDetail(index)"
              class="btn"
              height="35"
              width="35"
            >
              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </v-col>
        </v-row>

        <v-btn
          class="mt-4 text-capitalize"
          color="yellow darken-2"
          @click="addDetail"
          outlined
        >
          + เพิ่มรายละเอียด
        </v-btn>

        <v-row class="mt-6" align="center">
          <v-col cols="auto">
            <v-checkbox
              v-model="note"
              label="แพ็กเกจยอดนิยม"
              hide-details
            ></v-checkbox>
          </v-col>
        </v-row>
      </v-card-text>

      <v-card-actions class="justify-between">
        <v-btn color="grey darken-2" outlined @click="cancel">ยกเลิก</v-btn>
        <v-btn color="yellow darken-2" outlined @click="save">บันทึก</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

  <script>
export default {
  name: "Form",
  data() {
    return {
      tab: null,
      details: [{ detail: "" }, { detail: "" }, { detail: "" }],
      note: false,
    };
  },
  methods: {
    addDetail() {
      this.details.push({ detail: "" });
    },
    removeDetail(index) {
      this.details.splice(index, 1);
    },
    cancel() {
      // Cancel action
    },
    save() {
      // Save action
    },
  },
};
</script>

  <style>
.border-box .v-field__loader {
  border-color: rgba(192, 0, 250, 0.986);
}
.text-2xl {
  font-size: 1.5rem;
  font-weight: 700;
}
.pa-0 {
  padding: 0;
}
.pa-8 {
  padding: 2rem;
}
.mt-6 {
  margin-top: 1.5rem;
}
.mb-4 {
  margin-bottom: 1rem;
}
.header {
  margin: 10px;
}

.btn {
  border-radius: 6px;
  background-color: #f56565;
}
</style>
