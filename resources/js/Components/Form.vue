<template>
  <section class="overflow-auto">
    <h2 class="mb-3">Forms</h2>
    <div class="p-8 text-white bg-gray-900 rounded-lg">
      <h2 class="mb-6 text-2xl">ตั้งค่า</h2>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
          <label>ชื่อแพ็กเกจ</label>
          <input class="form-control" placeholder="กรุณากรอกชื่อ" />
        </div>
        <div>
          <label>ราคา</label>
          <input class="form-control" placeholder="กรุณากรอกราคาสกุล" />
        </div>
        <div>
          <label>อายุแพ็กเกจ (วัน)</label>
          <input class="form-control" placeholder="กรุณากรอกอีเมล" />
        </div>
        <div>
          <label>หมายเลขโทรศัพท์</label>
          <input class="form-control" placeholder="กรุณากรอกหมายเลขโทรศัพท์" />
        </div>
      </div>

      <h2 class="mt-6 mb-4 text-2xl">คำอธิบาย</h2>
      <div
        v-for="(detail, index) in details"
        :key="index"
        class="flex items-center mb-4"
      >
        <input
          class="flex-grow form-control"
          placeholder="กรุณากรอกรายละเอียด"
        />

        <button
          @click="removeDetail(index)"
          class="mx-4 bg-red-500 icon-button"
        >
          <img src="@/assets/icon/bin2.svg" alt="" />
        </button>
      </div>
      <button
        @click="addDetail"
        class="px-4 py-2 mt-4 text-gray-900 bg-yellow-500 rounded-full"
      >
        + เพิ่มรายละเอียด
      </button>

      <div class="flex items-center mt-6">
        <label class="mr-2">หมายเหตุ</label>
        <input type="checkbox" class="form-checkbox" />
        <span class="ml-2">แพ็กเกจยอดนิยม</span>
      </div>

      <div class="flex justify-between mt-6">
        <button class="px-4 py-2 text-white bg-gray-700 rounded-lg">
          ยกเลิก
        </button>
        <button class="px-4 py-2 text-gray-900 bg-yellow-500 rounded-lg">
          บันทึก
        </button>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "Form",
  data() {
    return {
      tab: null,
      details: [{ detail: "" }, { detail: "" }, { detail: "" }],
    };
  },
  methods: {
    addDetail() {
      this.details.push({ detail: "" });
    },
    removeDetail(index) {
      this.details.splice(index, 1);
    },
  },
};
</script>
