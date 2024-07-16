<script setup>
import { defineProps, onMounted, ref } from "vue";
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
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
  <div
    class="flex flex-col justify-center flex-1 max-w-md mx-auto mt-24 space-y-5"
  >
    <div class="flex flex-col space-y-2 text-center">
      <h2 class="text-3xl font-bold md:text-4xl">Confirm OTP</h2>
      <p class="text-md md:text-xl">Enter the OTP we just sent you.</p>
    </div>
    <form @submit.prevent="submit">
      <div class="flex flex-col max-w-md space-y-5">
        <!-- <input
          type="hidden"
          placeholder="otp"
          v-model="id.value"
          required
          class="flex px-3 py-2 font-medium border-2 border-black rounded-lg md:px-4 md:py-3 placeholder:font-normal"
        /> -->
        <input
          type="text"
          placeholder="otp"
          v-model="form.phone"
          required
          class="flex px-3 py-2 font-medium border-2 border-black rounded-lg md:px-4 md:py-3 placeholder:font-normal"
        />
        <button
          class="flex items-center justify-center flex-none px-3 py-2 font-medium text-white bg-black border-2 border-black rounded-lg md:px-4 md:py-3"
        >
          Confirm
        </button>
      </div>
    </form>
  </div>
</template>
