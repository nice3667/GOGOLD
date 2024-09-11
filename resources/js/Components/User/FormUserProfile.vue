<template>
  <v-container class="max-w-2xl px-5 text-white bg-[#1D1D1D] rounded-xl">
    <h2 class="mb-4 text-lg font-bold">แก้ไขบัญชี</h2>
    <hr />
    <v-row class="mt-5">
      <!-- Profile Image Section -->
      <v-col cols="12" class="flex justify-center">
        <v-avatar size="127" class="mr-2">
          <img src="@/assets/icon/teeruk.jpg" alt="" />
        </v-avatar>
      </v-col>

      <!-- Name Section -->
      <v-col cols="6">
        <div>
          <p>ชื่อ</p>
        </div>
        <v-text-field
          v-model="firstname"
          placeholder="กรุณากรอกชื่อ"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <div>
          <p>นามสกุล</p>
        </div>
        <v-text-field
          v-model="lastname"
          placeholder="กรุณากรอกนามสกุล"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <!-- Email and Phone Section -->
      <v-col cols="6">
        <div>
          <p>อีเมล</p>
        </div>
        <v-text-field
          v-model="email"
          placeholder="กรุณากรอกอีเมล"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <div>
          <p>เบอร์โทรศัพท์</p>
        </div>
        <v-text-field
          v-model="phone"
          model-value="0970787580"
          variant="outlined"
          disabled
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <!-- Bank Account Section -->
      <v-col cols="12" class="mb-2">
        <h2 class="font-bold text-md">ตั้งค่าบัญชีธนาคาร</h2>
      </v-col>
      <v-col cols="6">
        <div>
          <p>ชื่อบัญชีธนาคาร</p>
        </div>
        <v-text-field
          v-model="back_account_name"
          placeholder="กรุณากรอกชื่อใหม่"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <div>
          <p>ธนาคาร</p>
        </div>
        <v-text-field
          v-model="back_name"
          placeholder="กรุณายืนยันธนาคาร"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <div>
          <p>เลขที่บัญชีธนาคาร</p>
        </div>
        <v-text-field
          v-model="back_number_name"
          placeholder="กรุณากรอกเลขบัญชีใหม่"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <!-- Password Section -->
      <v-col cols="12" class="mb-2">
        <h2 class="font-bold text-md">ตั้งค่ารหัสผ่าน</h2>
      </v-col>
      <v-col cols="6">
        <div>
          <p>ตั้งค่ารหัสผ่านใหม่</p>
        </div>
        <v-text-field
          v-model="password"
          placeholder="กรุณากรอกรหัสผ่านใหม่"
          type="password"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <div>
          <p>ยืนยันรหัสผ่าน</p>
        </div>
        <v-text-field
          v-model="password_confirmation"
          placeholder="กรุณายืนยันรหัสผ่านใหม่"
          type="password"
          variant="outlined"
          class="profile-form"
          rounded=""
        ></v-text-field>
      </v-col>

      <!-- Buttons Section -->
    </v-row>
    <div class="flex justify-center">
      <div class="flex justify-center mr-5">
        <v-btn
          href="/account"
          class="btn-form-user text-white !bg-[#8C8C8C]"
          outlined
          >ยกเลิก</v-btn
        >
      </div>
      <div class="flex justify-center ml-5">
        <v-btn class="btn-form-user text-black !bg-[#FFD700]" outlined
          >บันทึก</v-btn
        >
      </div>
    </div>
  </v-container>
</template>
<style scoped>
hr {
  border-top: 2px;
  color: #ffffff;
}
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
      bank_account: bankAccount.value,
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

