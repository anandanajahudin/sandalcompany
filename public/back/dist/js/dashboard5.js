$(function () {
  var chart = {
    series: [
      {
        name: "Sales Order",
        data:
        [
            100, 120, 150, 130,
            135, 140, 130, 120,
            140, 150, 155, 160
        ],
      },
    //   {
    //     name: "Followers",
    //     data: [50, 100, 65, 140, 32, 60],
    //   },
    //   {
    //     name: "Campaign",
    //     data: [100, 50, 130, 70, 135, 80],
    //   },
    ],
    chart: {
      toolbar: {
        show: false,
      },
      type: "line",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
      height: 200,
    },
    colors: ["#fa896b", "#615dff", "#3dd9eb"],
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    stroke: {
      curve: "smooth",
      width: 3,
    },
    grid: {
      borderColor: "rgba(0,0,0,0.1)",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
      },
    },
    xaxis: {
      categories: [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
      ],
    },
    yaxis: {
      tickAmount: 4,
    },
    tooltip: {
      theme: "dark",
    },
  };

  var chart = new ApexCharts(document.querySelector("#financial"), chart);
  chart.render();

  var chart2 = {
    series: [
      {
        name: "Hours",
        data: [22.5, 34.3, 24.7, 28.5, 11.4, 30.6, 44.5],
      },
    ],
    chart: {
      height: 350,
      type: "area",
      fontFamily: '"DM Sans",sans-serif',
      foreColor: "#adb0bb",
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 3,
        left: 0,
        blur: 5,
        color: "#000",
        opacity: 0.2,
      },
    },
    colors: ["#615dff"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
      colors: ["#615dff"],
      width: 2,
    },
    fill: {
      type: "gradient",
    },
    markers: {
      show: false,
    },
    grid: {
      show: false,
    },
    yaxis: {
      show: false,
    },
    xaxis: {
      type: "category",
      categories: ["Su", "Mo", "Tu", "Wed", "Th", "Fr", "Sa"],

      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    legend: {
      show: false,
    },
    tooltip: {
      theme: "dark",
    },
  };

  var chart2 = new ApexCharts(
    document.querySelector("#activity-status"),
    chart2
  );
  chart2.render();

  var chart3 = {
    chart: {
      type: "radialBar",
      fontFamily: '"DM Sans",sans-serif',
      foreColor: "#adb0bb",
      height: 305,
    },
    series: [45, 50, 60, 70],
    colors: ['#615dff', '#fa896b', '#ffae1f', '#3dd9eb'],
    plotOptions: {
      radialBar: {
        hollow: {
          margin: 15,
          size: "50%"
        },
        dataLabels: {
          total: {
            show: true,
            label: 'Team'
          }
        }
      }
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "dark",
        type: "vertical",
        gradientToColors: ["#615dff"],
        stops: [0, 100]
      }
    },
    stroke: {
      lineCap: "round",
    },
    labels: ['Team A', 'Team B', 'Team C', 'Team D'],
    tooltip: {
      enabled: true,
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  new ApexCharts(
    document.querySelector("#team-performance"),
    chart3
  ).render();
});
