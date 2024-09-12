<script setup>
import { defineProps, onMounted, ref } from "vue";
import Checkbox from "@/components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/components/InputError.vue";
import InputLabel from "@/components/InputLabel.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import TextInput from "@/components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import LogoMessage from "@/components/LogoMessage.vue";

const id = ref();
const form = useForm({
  id: "",
  phone: "",
});

const submit = () => {
  form.post(route("otp.store"));
};
const props = defineProps({
  data: {
    type: String,
    default: "",
  },
});

onMounted(() => {
  // Log ข้อมูลใน console เมื่อ component ถูก mount
  console.log("Data received:", props.data);
  form.id = props.data;
});
</script>

<template>
  <div>
    <div class="flex justify-evenly items-center min-h-screen bg-[#27272A]">
      <div class="flex flex-col space-y-2 text-center">
        <div class="otp-main">
          <h2 class="text-title-otp">Confirm OTP</h2>
          <LogoMessage></LogoMessage>
          <div class="text-main-otp">
            <p>Please enter the OTP send to you mobile number</p>
          </div>
          <form @submit.prevent="submit">
            <div class="flex flex-col items-center justify-center w-full">
              <v-otp-input
                type="text"
                placeholder="0"
                v-model="form.phone"
                required
                color=""
                rounded=""
                length="5"
                class="input-otp"
              />
              <div class="mt-3 text-[#737373]">
                <p>Don't receive an OTP?</p>
              </div>
              <div class="mt-3 text-[#FFD700]">
                <a href="">Resend OTP</a>
              </div>
              <button
                class="mt-5 items-center rounded-full block w-full px-4 py-2 text-center text-black uppercase transition duration-150 ease-in-out bg-[#FFD700] border focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                Confirm
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.otp-main {
  background-color: #252525;
  border-radius: 30px;
  width: 392px;
  padding: 30px;
  height: 552px;
}
.text-title-otp {
  color: #ffff;
  font-size: 28.44px;
}
.text-main-otp {
  font-size: 13px;
  color: #ffd700;
}
/* .input-otp {
  border-radius: 30px;
} */
.input-otp .v-otp-input__field {
  --tw-ring-color: transparent;
  border-radius: 12px;
  background-color: #252525;
  color: #737373;
}
.input-otp .v-field {
  border-radius: 12px;
  height: 61px;
  border: 1px solid #ffd700;
}
</style>
