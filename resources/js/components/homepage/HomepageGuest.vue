<template>
  <div>
    <div class="bg-black image-container">
      <img
        src="@/assets/icon/img-bg-gogold.jpg"
        class="w-full h-full img-homepage"
        alt=""
      />
      <div class="text-overlay">
        <p class="text-6xl">
          Unlock the power of <br />
          gold trading with
          <span class="highlight text-8xl">GoGold.</span>
        </p>
        <button class="text-2xl cta-button">ดูแพ็กเกจแนะนำ</button>
      </div>
      <div class="text-overlay-guide">
        <div
          class="grid items-center justify-center grid-rows-2 headline-container"
        >
          <div class="grid justify-center">
            <button class="guide-trade-button">เครื่องมือช่วยเทรด</button>
          </div>
          <div class="mt-8">
            <span class="px-1 text-4xl highlighted-text"><b>GoGold</b></span>
            <span class="text-4xl normal-text">
              ผู้ช่วยเทรดทอง ของคนชอบกำไร</span
            >
          </div>
        </div>
      </div>
    </div>
    <div class="p-6 text-white bg-black image-container">
      <div class="flex flex-col items-center md:flex-row md:justify-evenly">
        <!-- Left Section: Feature Descriptions -->
        <div class="space-y-6 md:w-1/3">
          <p class="text-6xl">
            Unlock the power of <br />
            gold trading with
            <span class="highlight text-8xl">GoGold.</span>
          </p>
        </div>

        <!-- Center Section: Mobile Image -->
        <div class="my-6">
          <img
            src="@/assets/icon/img-iphone-Photoroom.png"
            alt="GoGold Mobile Trading"
            class="w-full h-full"
          />
        </div>

        <!-- Right Section: Additional Features -->
        <div class="space-y-6 md:w-1/3">
          <FeatureItem
            icon="mdi-sleep"
            title="ลดความเหนื่อยล้า"
            description="ลดความเหนื่อยล้าจากการเทรดแบบแมนนวล ด้วยการตั้งค่าอัตโนมัติ"
          />
          <FeatureItem
            icon="mdi-clock-outline"
            title="การติดตามตลอด 24 ชั่วโมง"
            description="ทำงานได้ไม่ต้องเฝ้าหน้าจอ ให้คุณพักผ่อนได้สบาย จากการเทรดอัตโนมัติ"
          />
          <FeatureItem
            icon="mdi-chart-line"
            title="การทดสอบย้อนหลัง (Backtesting)"
            description="ทดสอบกลยุทธ์โดยอ้างอิงข้อมูลย้อนหลัง เพื่อประเมินผลกำไรและปรับปรุง"
          />
        </div>
      </div>
    </div>
  </div>
</template>
