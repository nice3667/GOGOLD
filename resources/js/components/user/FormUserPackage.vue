<template>
  <v-container class="max-w-2xl px-8 text-white bg-[#1D1D1D] rounded-xl">
    <h2 class="mb-4 text-lg font-bold">แก้ไขบัญชี</h2>
    <hr />

    <v-row class="mt-5">
      <v-col cols="12" class="mt-8 mb-2">
        <h2 class="font-bold text-md">ตั้งค่าบัญชีธนาคาร</h2>
      </v-col>

      <v-col cols="12" sm="6">
        <p>ชื่อบัญชีธนาคาร</p>
        <v-text-field
          v-model="bank_account_name"
          placeholder="กรุณากรอกชื่อบัญชีใหม่"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>ธนาคาร</p>
        <v-text-field
          v-model="bank_name"
          placeholder="กรุณายืนยันธนาคาร"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>เลขที่บัญชีธนาคาร</p>
        <v-text-field
          v-model="bank_account_number"
          placeholder="กรุณากรอกเลขบัญชีใหม่"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" class="flex justify-center mt-4">
        <v-btn
          href="/account"
          class="btn-form-user text-white !bg-[#8C8C8C] mx-2"
          outlined
        >
          ยกเลิก
        </v-btn>
        <v-btn
          @click="saveBankInfo"
          class="btn-form-user text-black !bg-[#FFD700] mx-2"
          outlined
        >
          บันทึก
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>
<style scoped>
hr {
  border-top: 1px solid #27272a;
}

p {
  font-size: 15px;
}

h2 {
  font-size: 24px;
}

.btn-form-user {
  width: 130px !important;
  height: 40px !important;
  border-radius: 20px !important;
}
</style>



<script setup>
import { ref } from "vue";
import axios from "axios";

// State for form fields
const firstName = ref("");
const lastName = ref("");
const email = ref("");
const bankName = ref("");
const bankAccount = ref("");
const newPassword = ref("");
const confirmPassword = ref("");

// Function to handle form submission
const saveProfile = async () => {
  try {
    const response = await axios.post("/api/update-profile", {
      first_name: firstName.value,
      last_name: lastName.value,
      email: email.value,
      bank_name: bankName.value,
      bank_account_name: bankAccount.value,
      bank_account_number: bankAccount.value,
      password: newPassword.value,
      confirm_password: confirmPassword.value,
    });

    if (response.data.success) {
      alert("ข้อมูลถูกบันทึกเรียบร้อยแล้ว");
    } else {
      alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
    }
  } catch (error) {
    console.error("Error updating profile:", error);
    alert("เกิดข้อผิดพลาดในการเชื่อมต่อกับเซิร์ฟเวอร์");
  }
};
</script>
