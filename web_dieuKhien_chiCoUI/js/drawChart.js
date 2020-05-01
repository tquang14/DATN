// load default chart to html
$(document).ready(function() {
    $.ajax({
        url: "http://192.168.1.20/drawChartexample/getDataFormDatabase.php",
        type: "GET",
        success: function(data) {
            var day = [];
            var humidity = [];
            var temperature = [];
            var solidiMoisture = [];
            for (var i in data) {
                day.push(data[i].date);
                temperature.push(data[i].temperature);
                humidity.push(data[i].humidity);
                solidiMoisture.push(data[i].solidiMoisture);
            }
            var humidityData = {
                labels: day,
                datasets: [{
                    label: "Humidity",
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
                }]
            };
            var temperatureData = {
                labels: day,
                datasets: [{
                    label: "Temperature",
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
                    data: temperature
                }]
            };
            var solidMoistureData = {
                labels: day,
                datasets: [{
                    label: "Solid Moisture",
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
                    data: solidiMoisture
                }]
            };
            var chartOptions = {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            var ctxHumidity = $("#chartHumidity");
            var lineGraph = new Chart(ctxHumidity, {
                type: 'line',
                data: humidityData,
                options: chartOptions
            });

            var ctxTemperature = $("#chartTemperature");
            var lineGraph = new Chart(ctxTemperature, {
                type: 'line',
                data: temperatureData,
                options: chartOptions
            });

            var ctxsolidMoisture = $("#chartSolidiMoisture");
            var lineGraph = new Chart(ctxsolidMoisture, {
                type: 'line',
                data: solidMoistureData,
                options: chartOptions
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});

// read date input and load chart of that date
function readDate() {
    var date = document.getElementById('date').value;
    console.log(date);
}