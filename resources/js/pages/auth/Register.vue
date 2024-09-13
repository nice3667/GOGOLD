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

<template>
  <div class="">
    <div class="flex justify-evenly items-center min-h-screen bg-[#27272A]">
      <div class="flex flex-col">
        <div class="flex justify-evenly">
          <p class="text-register-main">Welcome to GO GOLD !</p>
        </div>
        <div>
          <LogoPage></LogoPage>
        </div>
      </div>

      <div class="register-main">
        <LogoLogin></LogoLogin>
        <h1 class="text-center text-register">สมัครสมาชิก</h1>
        <!-- <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div> -->
        <form @submit.prevent="submit">
          <div>
            <InputLabel for="phone" value="เบอร์โทรศัพท์" class="text-register" />
            <TextInput id="phone" type="tel" class="block w-full mt-1 text-input-register" v-model="form.phone" required
              autofocus autocomplete="username" />
            <InputError class="mt-2" :message="form.errors.phone" />
          </div>
          <div class="mt-4">
            <InputLabel for="password" value="รหัสผ่าน" class="text-register" />
            <TextInput id="password" type="password" class="block w-full mt-1 text-input-register"
              v-model="form.password" required autocomplete="current-password" />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>
          <div class="mt-4">
            <InputLabel for="password_confirmation" value="ยืนยันรหัสผ่าน" class="text-register" />
            <TextInput id="password_confirmation" type="password" class="block w-full mt-1 text-input-register"
              v-model="form.password_confirmation" required autocomplete="current-password" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div>

          <div class="flex items-center justify-center w-full mt-4">
            <button type="submit" :disabled="form.processing" :class="{ 'opacity-25': form.processing }"
              class="items-center rounded-full block w-full px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              สมัครสมาชิก
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<style scoped>
.register-main {
  background-color: #000000;
  border-radius: 30px;
  width: 560px;
  padding: 30px;
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
</style>
