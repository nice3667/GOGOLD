export const options = {
  responsive: true,
  maintainAspectRatio: false,
}

export const plugins = [
  {
    id: 'doughnutLabel',
    beforeDatasetDraw(chart, args, pluginOptions) {
      const { ctx, data } = chart
      ctx.save()

      const x = chart.getDatasetMeta(0).data[0].x
      const y = chart.getDatasetMeta(0).data[0].y
      ctx.font = 'bold 10px sans-serif'
      ctx.textAlign  = 'center'
      ctx.fillStyle = 'rgba(255,255,255,1)'
      ctx.fillText('Man U 0 - 3 Liverpool', x, y)
    },
  }
]


export const data = {
  // labels: ['VueJs', 'EmberJs'],
  datasets: [
    {
      backgroundColor: ['#D9D9D9', '#FFD700',],
      data: [20, 80],
      options: {
        legend: true,
        textInside: true
      }
    }
  ],
}
