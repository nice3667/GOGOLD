<template>
  <div class="w-screen">
    <div class="grid items-center min-h-screen xl:grid-cols-2">
      <div class="flex items-center justify-center flex-column">
        <h5 class="text-3xl text-center md:text-5xl">Welcome to GO GOLD !</h5>
        <LogoPage></LogoPage>
      </div>

      <div class="flex justify-center">
        <div class="card-login">
          <LogoLogin></LogoLogin>
          <h1 class="my-3 text-center">เข้าสู่ระบบ</h1>
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
            <div class="flex justify-between mb-4">
              <label class="flex items-center">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="text-sm ms-2 text-[#FFD700]">จำรหัสผ่าน</span>
              </label>
              <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="text-sm text-[#FFD700] underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-text-[#FFD700]"
              >
                ลืมรหัสผ่าน?
              </Link>
            </div>
            <div class="flex items-center justify-center w-full mt-4">
              <Button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                class="items-center rounded-full block w-full px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                เข้าสู่ระบบ
              </Button>
            </div>
            <div class="flex items-center justify-center w-full mt-4">
              <Link
                href="/register"
                class="items-center rounded-full block w-full px-4 py-2 text-center text-white uppercase transition duration-150 ease-in-out bg-[#252525] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                ยังไม่มีบัญชี
              </Link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Checkbox from "@/components/Checkbox.vue";
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

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  phone: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<style scoped>
.card-login {
  background-color: #000000;
  border-radius: 30px;
  width: 60%;
  padding: 25px;
}

.text-input-login {
  /* background-color: #2c2c2c; */
  border-radius: 30px;
}

.text-login-main {
  font-size: 40px;
  color: #ffff;
}
@media (max-width: 640px) {
  .card-login {
    padding: 25px;
    width: 95%;
  }
}
</style>
