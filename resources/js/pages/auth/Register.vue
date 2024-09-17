<template>
  <div class="w-screen">
    <div class="grid items-center min-h-screen xl:grid-cols-2">
      <div class="flex items-center justify-center flex-column">
        <h5 class="text-3xl text-center md:text-5xl">Welcome to GO GOLD !</h5>
        <LogoPage></LogoPage>
      </div>
      <div class="flex justify-center">
        <div class="register-main">
          <LogoLogin></LogoLogin>
          <h1 class="my-3 text-center">สมัครสมาชิก</h1>
          <form @submit.prevent="submit">
            <div class="mb-4">
              <label for="phone">เบอร์โทรศัพท์</label>
              <input
                placeholder="กรอกเบอร์โทรศัพท์ เช่น 0812345678"
                class="w-full mt-1 input-rounded"
                type="tel"
                v-model="form.phone"
                required
                autofocus
                autocomplete="username"
              />
              <InputError class="mt-1" :message="form.errors.phone" />
            </div>
            <div class="mb-4">
              <label for="password">รหัสผ่าน</label>
              <input
                placeholder="กรอกเบอร์โทรศัพท์ เช่น 0812345678"
                class="w-full mt-1 input-rounded"
                id="password"
                type="password"
                v-model="form.password"
                required
                autofocus
                autocomplete="current-password"
              />
              <InputError class="mt-1" :message="form.errors.password" />
            </div>
            <div class="mb-4">
              <label for="password">ยืนยันรหัสผ่าน</label>
              <input
                placeholder="กรอกเบอร์โทรศัพท์ เช่น 0812345678"
                class="w-full mt-1 input-rounded"
                id="password_confirmation"
                type="password"
                v-model="form.password_confirmation"
                required
                autofocus
                autocomplete="current-password"
              />
              <InputError class="mt-1" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-center w-full mt-4">
              <button
                type="submit"
                :disabled="form.processing"
                :class="{ 'opacity-25': form.processing }"
                class="items-center rounded-full block w-full px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                สมัครสมาชิก
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Checkbox from "@/components/Checkbox.vue";
import GuestLayout from "@/layouts/LayoutGuest.vue";
import InputError from "@/components/InputError.vue";
import InputLabel from "@/components/InputLabel.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import LogoLogin from "@/components/LogoLogin.vue";
import TextInput from "@/components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import LogoPage from "@/components/LogoPage.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});

const form = useForm({
  phone: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
console.log("test2");
</script>

<style scoped>
.register-main {
  background-color: #000000;
  border-radius: 30px;
  width: 60%;
  padding: 25px;
}

.text-input-register {
  border-radius: 30px;
}

.text-register {
  color: #ffff;
}

.text-register-main {
  font-size: 40px;
  color: #ffff;
}
@media (max-width: 640px) {
  .register-main {
    padding: 25px;
    width: 95%;
  }
}
</style>
