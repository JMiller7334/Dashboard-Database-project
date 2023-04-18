var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
        label: "Power Usage",
        data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478,1543,3323],
        borderColor: "red",
        fill: false
    },{
        label: "Gross Profit",
        data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000,9000,3000],
        borderColor: "green",
        fill: false
    },{
        label: "Total Customers",
        data: [300,700,2000,5000,6000,4000,2000,1000,200,100,200,300],
        borderColor: "blue",
        fill: false
    }]
  },
  options: {
    legend: {display: true}
  }
});