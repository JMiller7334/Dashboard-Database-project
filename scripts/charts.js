var xValues = ["Mar","Apr","May"];
var chart = new Chart("customerChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
        label: "Total Customers",
        data: [0, 0, 0],
        borderColor: "green",
        fill: false
    }]
  },
  options: {
    legend: {display: true}
  }
});


// This function updates the chart with the new data
function updateChart(newData) {
  chart.data.datasets[0].data = newData;
  chart.update();
  document.getElementById("phpOutput");
}
$.ajax({
  url: 'php/metrics.php',
  type: 'GET',
  dataType: "json",
  success: function(data) {
      // Parse the data and update the chart
      var newData = [data.mar, data.apr, data.may];
      updateChart(newData);
      console.log("AJAX: response received:" + data);

      //clears server output from page.
      $.ajax({
        url: "php/clear.php",
        method: "POST",
        success: function(response) {
          console.log("AJAX: output cleared")
        }
     });
  },
  error: function(xhr, textStatus, errorThrown) {
      console.log("Error: " + errorThrown);
  }
});

