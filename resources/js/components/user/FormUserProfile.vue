<template>
  <v-container class="max-w-2xl px-8 text-white bg-[#1D1D1D] rounded-xl">
    <h2 class="mb-4 text-lg font-bold">แก้ไขบัญชี</h2>
    <hr />

    <v-row class="mt-5">
      <v-col cols="12" class="flex justify-center">
        <v-avatar size="127" class="mr-2">
          <img src="@/assets/icon/teeruk.jpg" alt="" />
        </v-avatar>
      </v-col>

      <v-col cols="12" sm="6">
        <p>ชื่อ</p>
        <v-text-field
          v-model="data_user.first_name"
          placeholder="กรุณากรอกชื่อ"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>นามสกุล</p>
        <v-text-field
          v-model="data_user.last_name"
          placeholder="กรุณากรอกนามสกุล"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>อีเมล</p>
        <v-text-field
          v-model="data_user.email"
          placeholder="กรุณากรอกอีเมล"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>เบอร์โทรศัพท์</p>
        <v-text-field
          v-model="data_user.phone"
          placeholder="0970787580"
          variant="outlined"
          disabled
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
          @click="saveProfile"
          class="btn-form-user text-black !bg-[#FFD700] mx-2"
          outlined
        >
          บันทึก
        </v-btn>
      </v-col>

      <v-col cols="12" class="mt-8 mb-2">
        <h2 class="font-bold text-md">ตั้งค่ารหัสผ่าน</h2>
      </v-col>

      <v-col cols="12" sm="6">
        <p>ตั้งค่ารหัสผ่านใหม่</p>
        <v-text-field
          v-model="data_user.password"
          placeholder="กรุณากรอกรหัสผ่านใหม่"
          type="password"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <v-col cols="12" sm="6">
        <p>ยืนยันรหัสผ่าน</p>
        <v-text-field
          v-model="data_user.password_confirm"
          placeholder="กรุณายืนยันรหัสผ่านใหม่"
          type="password"
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
          @click="saveProfile"
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
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAttrs } from "vue"; // To access attributes passed from the parent

const attrs = useAttrs(); // Access attributes like auth data

// State for form fields
const data_user = ref({
  first_name: "",
  last_name: "",
  email: "",
  phone: "",
  bank_name: "",
  bank_account_number: "",
  bank_account_name: "",
  password: "",
  password_confirm: "",
});

// Populate data on mount
onMounted(async () => {
  // Populate user data
  data_user.value.phone = attrs.auth.user.phone;
  data_user.value.first_name = attrs.auth.user.first_name;
  data_user.value.last_name = attrs.auth.user.last_name;
  data_user.value.email = attrs.auth.user.email;
  data_user.value.password = attrs.auth.user.password;
  data_user.value.password_confirm = attrs.auth.user.password_confirm;

  // Populate bank info
  data_user.value.bank_name = attrs.auth.user.bank_name;
  data_user.value.bank_account_number = attrs.auth.user.bank_account_number;
  data_user.value.bank_account_name = attrs.auth.user.bank_account_name;
});

// Function to handle form submission
const saveProfile = async () => {
  try {
    const response = await axios.post("/api/update-profile", {
      first_name: data_user.value.first_name,
      last_name: data_user.value.last_name,
      email: data_user.value.email,
      bank_name: data_user.value.bank_name,
      bank_account_name: data_user.value.bank_account_name,
      bank_account_number: data_user.value.bank_account_number,
      password: data_user.value.password,
      confirm_password: data_user.value.password_confirm,
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
