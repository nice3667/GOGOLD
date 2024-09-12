<template>
  <div class="flex main-table-homepage">
    <div class="main-table-container">
      <table hide-default-footer="" class="w-full main-table-hp">
        <thead>
          <tr>
            <th class="flex main-table-title">Lorem ipsum</th>
            <th class="text-main-table-name">Name</th>
            <th class="text-main-table-gain">Gain</th>
            <th class="text-main-table-monthly">Monthly</th>
            <th class="text-main-table-total">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in items" :key="index" :class="index === 1 ? 'highlight-row' : ''">
            <td class="d-flex align-center">
              <v-avatar class="mr-3" size="32">
                <img :src="item.avatar" alt="" />
              </v-avatar>
              {{ item.name }}
            </td>
            <td :class="{
              'text-success': item.gain > 0,
              'text-error': item.gain < 0,
            }">
              {{ item.gain > 0 ? "+" : "" }}{{ item.gain }}%
            </td>
            <td>{{ item.monthly }}%</td>
            <td>{{ item.revenue }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          name: "Jame Foxy",
          gain: 55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: 55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: 55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
        {
          name: "Jame Foxy",
          gain: -55.51,
          monthly: 44.96,
          revenue: "25,256.12$",
        },
      ],
    }
  },
}
</script>
