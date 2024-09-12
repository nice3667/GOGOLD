// chartConfig.ts
export const data = {
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [
    {
      label: "BTC",
      data: [10, 20, 15, 30, 40, 25, 50, 35, 45, 30, 20, 10],
      borderColor: "#32D78B", // Green Line
      backgroundColor: "rgba(50, 215, 139, 0.2)", // Light Green Area
      tension: 0.1, // For smooth curves
      pointRadius: 4,
      pointBackgroundColor: "#32D78B",
      pointBorderColor: "#fff",
    },
    {
      label: "USDC",
      data: [20, 30, 25, 40, 30, 35, 20, 50, 30, 45, 35, 25],
      borderColor: "#9A65FD", // Purple Line
      backgroundColor: "rgba(154, 101, 253, 0.2)", // Light Purple Area
      tension: 0.1,
      pointRadius: 4,
      pointBackgroundColor: "#9A65FD",
      pointBorderColor: "#fff",
    },
  ],
};

export const options = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      display: false, // Hide legend for a cleaner look
    },
    tooltip: {
      backgroundColor: "#2E2E2E", // Dark background for tooltips
      bodyColor: "#FFF",
      titleColor: "#FFF",
      titleFont: { weight: 'bold' },
      padding: 10,
      borderColor: "#555",
      borderWidth: 1,
      displayColors: false,
      callbacks: {
        label: function (context) {
          return `${context.dataset.label}: ${context.raw} ฿`;
        },
      },
    },
  },
  scales: {
    x: {
      grid: {
        color: "#444", // Light grid line color
        borderColor: "#444",
        display: false, // Hide vertical grid lines for a cleaner look
      },
      ticks: {
        color: "#C7C7C7",
        font: {
          size: 12,
        },
      },
    },
    y: {
      grid: {
        color: "#444",
        borderColor: "#444",
        drawBorder: false,
      },
      ticks: {
        color: "#C7C7C7",
        font: {
          size: 12,
        },
        callback: function (value) {
          return `${value}K`; // Add 'K' suffix to y-axis values
        },
      },
    },
  },
};
