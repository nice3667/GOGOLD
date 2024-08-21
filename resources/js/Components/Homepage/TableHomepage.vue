<template>
  <div>
    <!-- <div class="d-flex justify-space-between align-center"></div> -->
    <!-- <v-card-text class="card-table"> -->
    <div class="overflow-auto">
      <v-data-table class="table-hp">
        <thead>
          <v-card-title class="table-title">Lorem ipsum</v-card-title>

          <tr>
            <th class="d-flextext-left-name">Name</th>
            <th class="d-flextext-left-gain">Gain</th>
            <th class="d-flextext-left-monthly">Monthly</th>
            <th class="d-flextext-left">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(item, index) in items"
            :key="index"
            :class="index === 1 ? 'highlight-row' : ''"
          >
            <td class="d-flex align-center">
              <v-avatar class="mr-3" size="32">
                <img :src="item.avatar" alt="" />
              </v-avatar>
              {{ item.name }}
            </td>
            <td
              :class="{
                'text-success': item.gain > 0,
                'text-error': item.gain < 0,
              }"
            >
              {{ item.gain > 0 ? "+" : "" }}{{ item.gain }}%
            </td>
            <td>{{ item.monthly }}%</td>
            <td>{{ item.revenue }}</td>
          </tr>
        </tbody>
      </v-data-table>
    </div>
    <div class="side-text">
      <h2>Lorem ipsum dolor sit amet consectetur.</h2>
      <ul>
        <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
        <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
        <li>Lorem ipsum dolor sit amet consectetur. Eget netus feugiat</li>
      </ul>
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
    };
  },
};
</script>

<style scoped>
.table-hp {
  padding: 20px;
  color: white;
  background: #2c2c2c;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 50vh;
  align-items: center;
}

.table-title {
  color: #737373;
  font-size: 40px;
}

.side-text {
  color: white;
  text-align: left;
  width: 30%;
}

.side-text h2 {
  font-size: 24px;
  font-weight: bold;
}

.side-text ul {
  list-style-type: disc;
  padding-left: 20px;
}

.text-success {
  color: green;
}

.text-error {
  color: red;
}

.highlight-row {
  background-color: #444;
}
</style>
