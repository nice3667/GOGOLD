<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="p-5 lg:px-16 main-content-admin-dashboard">
        <v-app class="main-content-admin-dashboard">
          <v-main>
            <!-- Status -->
            <div
              class="grid grid-cols-1 gap-6 py-3 mx-0 mt-3 mb-0 lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3"
            >
              <div class="flex items-center justify-center card-status">
                <div class="flex items-center justify-center space-x-4">
                  <img
                    src="@/assets/icon/icon-wallet.png"
                    alt=""
                    class="icon"
                  />

                  <div class="text-left">
                    <div class="text-sm text-white">ยอดเงินคงเหลือ</div>
                    <div class="text-xl font-bold text-white">฿</div>
                  </div>
                </div>
              </div>

              <div class="flex items-center justify-center card-status">
                <div class="flex items-center justify-center space-x-4">
                  <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                  <div class="text-left">
                    <div class="text-sm text-white">ค่าคอมมิชชั่น</div>
                    <div class="mt-2 text-xl font-bold text-white">฿</div>
                    <div class="flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <div class="ml-2 text-[#34A853]">6.62%</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-center card-status">
                <div class="flex items-center justify-center space-x-4">
                  <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                  <div class="text-left">
                    <div class="text-sm text-white">ซื้อ</div>
                    <div class="mt-2 text-xl font-bold text-white">฿</div>
                    <div class="flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <div class="ml-2 text-[#34A853]">6.62%</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-center card-status">
                <div class="flex items-center justify-center space-x-4">
                  <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                  <div class="text-left">
                    <div class="text-sm text-white">ซื้อ</div>
                    <div class="mt-2 text-xl font-bold text-white">฿</div>
                    <div class="flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <div class="ml-2 text-[#34A853]">6.62%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- LineChart -->
            <div>
              <LineChart></LineChart>
            </div>
            <div
              class="grid grid-cols-1 gap-6 py-3 mx-0 mt-3 mb-0 lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3"
            >
              <!-- Card Status -->
              <v-card
                v-for="(currency, index) in currencies"
                :key="index"
                class="flex items-center justify-center card-status-crypto"
                outlined
              >
                <div class="grid grid-cols-2">
                  <div class="flex items-center space-x-/">
                    <v-avatar class="mr-2" size="26">
                      <img :src="currency.icon" alt="currency icon" />
                    </v-avatar>
                    <div>{{ currency.name }} : ฿{{ currency.price }}</div>
                  </div>
                  <div
                    :class="
                      currency.change > 0 ? 'text-green-500' : 'text-red-500'
                    "
                  >
                    <v-icon>{{
                      currency.change > 0
                        ? "mdi-arrow-up-bold"
                        : "mdi-arrow-down-bold"
                    }}</v-icon>
                    {{ currency.change }}%
                  </div>
                </div>
              </v-card>
            </div>
          </v-main>
        </v-app>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import LineChart from "@/components/dashboard/Admin/LineChart.vue";
const currencies = [
  {
    name: "BTC",
    price: "32,521.20",
    change: 6.25,
    icon: "https://cryptologos.cc/logos/bitcoin-btc-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
  {
    name: "ETH",
    price: "21,000.00",
    change: -3.25,
    icon: "https://cryptologos.cc/logos/ethereum-eth-logo.png",
  },
];

defineOptions({
  layout: LayoutAuthenticate,
});
</script>

<!-- 244,244,244,244 -->

<style scoped>
hr {
  border-top: 2px;
  color: #ffffff;
}

.content-admin-dashboard {
  @apply bg-[#1D1D1D] p-6 flex items-center justify-center w-64 h-24;
  border-radius: 24px;
}

.content-group-admin-dashboard {
  border-radius: 24px;
}

.icon {
  @apply w-12 h-12;
}

.text-left {
  @apply flex flex-col;
}

body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.main-content-admin-dashboard {
  background-color: #252525;
}

.text-dashboard {
  color: #ffd700;
  font-size: 15px;
}

.text-yellow-500 {
  color: #ffd700;
}

.bg-yellow-500 {
  background-color: #ffd700;
}

.text-white {
  color: #ffffff;
}

.bg-black {
  background-color: #000000;
}
</style>
