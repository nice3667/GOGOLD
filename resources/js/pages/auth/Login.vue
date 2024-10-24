<template>
  <body>
    <div class="grid justify-center grid-cols-2 ml-20">
      <!-- Login -->
      <section v-if="step === 'Login'">
        <div class="grid items-center justify-center min-h-screen">
          <div class="grid">
            <div>
              <button
                class="btn-login-list"
                :class="{ 'bg-[#FFD700] text-black': step === 'Login' }"
                @click="changeStep('Login')"
              >
                <b>เข้าสู่ระบบ</b>
              </button>
              <button class="btn-register-list" @click="changeStep('Register')">
                <b>สมัครสมาชิก </b>
              </button>
            </div>
            <div class="card-login">
              <LogoLogin></LogoLogin>
              <p class="mt-3 text-4xl text-center">Welcome back</p>
              <div class="flex justify-center gap-2">
                <div>
                  <h2 class="text-center">to</h2>
                </div>
                <div>
                  <h2 class="text-center text-[#FFD700]">
                    Expert Advisor for Profit Lovers !
                  </h2>
                </div>
              </div>
              <form @submit.prevent="submit">
                <div class="mb-4 mt-7">
                  <div class="flex">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <p class="ml-2 text-red">*</p>
                  </div>
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
                <div class="mb-4 mt-7">
                  <div class="flex">
                    <label for="password">รหัสผ่าน</label>
                    <p class="ml-2 text-red">*</p>
                  </div>
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
                <div class="flex justify-between mb-4 mt-7">
                  <label class="flex items-center">
                    <Checkbox
                      class="checkbox-cuttom"
                      name="remember"
                      v-model:checked="form.remember"
                    />
                    <span class="text-sm ms-2 text-[#FFD700]">จดจำฉัน</span>
                  </label>
                  <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-sm text-[#FFD700] underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-text-[#FFD700]"
                  >
                    ลืมรหัสผ่าน?
                  </Link>
                </div>
                <div class="flex items-center justify-center w-full mt-12">
                  <Button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="items-center rounded-full block w-full text-2xl h-[60px] px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                  >
                    เข้าสู่ระบบ
                  </Button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Register -->
      <section v-if="step === 'Register'">
        <div class="grid items-center justify-center min-h-screen">
          <div class="grid">
            <div>
              <button class="btn-login-list" @click="changeStep('Login')">
                <b>เข้าสู่ระบบ</b>
              </button>
              <button
                class="btn-register-list"
                :class="{ 'bg-[#FFD700] text-black': step === 'Register' }"
                @click="changeStep('Register')"
              >
                <b>สมัครสมาชิก</b>
              </button>
            </div>
            <div class="register-main">
              <LogoLogin></LogoLogin>
              <p class="mt-3 text-4xl text-center">Welcome back</p>
              <div class="flex justify-center gap-2">
                <div>
                  <h2 class="text-center">to</h2>
                </div>
                <div>
                  <h2 class="text-center text-[#FFD700]">
                    Expert Advisor for Profit Lovers !
                  </h2>
                </div>
              </div>
              <form @submit.prevent="submit">
                <div class="mb-4 mt-7">
                  <div class="flex">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <p class="ml-2 text-red">*</p>
                  </div>
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
                <div class="mb-4 mt-7">
                  <div class="flex">
                    <label for="password">รหัสผ่าน</label>
                    <p class="ml-2 text-red">*</p>
                  </div>
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
                <div class="mb-4 mt-7">
                  <div class="flex">
                    <label for="password">ยืนยันรหัสผ่าน</label>
                    <p class="ml-2 text-red">*</p>
                  </div>
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

                <div class="flex items-center justify-center w-full mt-12">
                  <button
                    type="submit"
                    :disabled="form.processing"
                    :class="{ 'opacity-25': form.processing }"
                    class="items-center rounded-full block w-full text-2xl h-[60px] px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                  >
                    สมัครสมาชิก
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
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
import { ref, computed } from "vue";

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
const step = ref("Login");

const changeStep = (newStep) => {
  step.value = newStep;
};
</script>

<style scoped>
body {
  background: linear-gradient(
      205deg,
      rgba(0, 0, 0, 0) 31.43%,
      rgba(0, 0, 0, 0.6) 53.13%,
      #000 66.77%
    ),
    linear-gradient(270deg, rgba(0, 0, 0, 0) 74.9%, rgba(0, 0, 0, 0.8) 89.9%),
    radial-gradient(
      50% 50% at 50% 50%,
      rgba(0, 0, 0, 0.08) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),
    url("@/assets/icon/img-background-gogold.png") lightgray 50% / cover
      no-repeat !important;
  height: 100%;
  background-image: url("@/assets/icon/img-background-gogold.png"); /* ใส่ภาพพื้นหลัง */
}
</style>
