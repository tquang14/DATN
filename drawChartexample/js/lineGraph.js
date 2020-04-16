$(document).ready(function() {
	$.ajax({
		url: "http://192.168.1.20/drawChartexample/getDataFormDatabase.php",
		type: "GET",
		success: function(data) {
			var day = [];
			var humidity = [];
			var temperature = [];

			for (var i in data) {
				day.push(data[i].day);
				temperature.push(data[i].temperature);
				humidity.push(data[i].humidity);
			}

			var chartdata = {
				labels: day,
				datasets: [
					{
						label: "humidity",
						fill: true,
						lineTension: "0",
						backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
           				data: humidity
					}
				]
			};
			var ctx = $("#chartCanvas");
			var lineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {

		}
	});
});