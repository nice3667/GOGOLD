<template>
  <div class="container">
    <div class="flex main-table-homepage">
      <div class="table-container">
        <v-data-table hide-default-footer="" class="w-full table-hp">
          <thead>
            <tr class="table-content">
              <th class="flex table-title">Lorem ipsum</th>
              <th class="text-table-name">Name</th>
              <th class="text-table-gain">Gain</th>
              <th class="text-table-monthly">Monthly</th>
              <th class="text-table-total">Total</th>
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
        </v-data-table>
      </div>
      <div class="text-main-tablehome">
        <div class="side-text">
          <div class="mt-5 font-bold text-center text-title-content-tablehome">Lorem ipsum dolor sit amet consectetur.
          </div>
          <div class="mt-10 text-content-tablehome">
            <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
            <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
            <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
          </div>
        </div>
      </div>
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
      ],
    }
  },
}
</script>
