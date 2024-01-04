// -------------- Charts -------------
// BAR CHART
var barChartOptions = {
    series: [{
    data: [50, 33, 17, 4],
    name: "Registered",
  }],
    chart: {
    type: 'bar',
    height: 350 ,
    toolbar: {
        show: false
    }
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      horizontal: false,
    }
  },
  dataLabels: {
    enabled: false
  },
  xaxis: {
    categories: ['Employers' , 'Workers', 'Crew Members', 'Admin'
    ],
  }
  };

  var chart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  chart.render();

// AREA CHART
const areaChartOptions = {
    series: [
      {
        name: 'Completed Jobs',
        data: [11, 32, 45, 32, 34, 52, 41],
      },
      {
        name: 'Posted Jobs',
        data: [31, 40, 58, 51, 42, 109, 100],
      },
    ],
    chart: {
      type: 'area',
      background: 'transparent',
      height: 350,
      stacked: false,
      toolbar: {
        show: false,
      },
    },
    colors: ['#00ab57', '#d50000'],
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    dataLabels: {
      enabled: false,
    },
    fill: {
      gradient: {
        opacityFrom: 0.4,
        opacityTo: 0.1,
        shadeIntensity: 1,
        stops: [0, 100],
        type: 'vertical',
      },
      type: 'gradient',
    },
    grid: {
    //   borderColor: '#55596e',
    borderColor: '#e7e4e4',
      yaxis: {
        lines: {
          show: false,
        },
      },
      xaxis: {
        lines: {
          show: true,
        },
      },
    },
    legend: {
      labels: {
        // colors: '#f5f7ff',
        colors: '#000'
      },
      show: false,
      position: 'top',
    },
    markers: {
      size: 6,
      strokeColors: '#1b2635',
      strokeWidth: 3,
    },
    stroke: {
      curve: 'smooth',
    },
    xaxis: {
      axisBorder: {
        color: '#55596e',
        show: true,
      },
      axisTicks: {
        color: '#55596e',
        show: true,
      },
      labels: {
        offsetY: 5,
        style: {
        //   colors: '#f5f7ff',
        colors: '#000'
        },
      },
    },
    yaxis: [
      {
        title: {
          text: 'Completed Jobs',
          style: {
            // color: '#f5f7ff',
            color: '#000'
          },
        },
        labels: {
          style: {
            // colors: ['#f5f7ff'],
            colors: ['#000']
          },
        },
      },
      {
        opposite: true,
        title: {
          text: 'Posted Jobs',
          style: {
            // color: '#f5f7ff',
            color: '#000'
          },
        },
        labels: {
          style: {
            // colors: ['#f5f7ff'],
            colors: ['#000']
          },
        },
      },
    ],
    tooltip: {
      shared: true,
      intersect: false,
      theme: 'dark',
    },
  };
  
  const areaChart = new ApexCharts(
    document.querySelector('#area-chart'),
    areaChartOptions
  );
  areaChart.render();