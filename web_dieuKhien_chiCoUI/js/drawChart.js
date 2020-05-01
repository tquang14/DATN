// some global var
var graphHum;
var graphTem;
var graphSM;
// draw chart to html
function draw(data, labels, label, canvasID) {
    console.log("draw");
    chartData = {
        labels: labels,
        datasets: [{
            label: label,
            fill: true,
            lineTension: "0",
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: '#2c3e50',
            data: data
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
    };
    var ctx = document.getElementById(canvasID);
    var chart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: chartOptions
    });
    return chart;
}

// load default data when web first open and call draw to draw chart
function drawDefault() {
    $.ajax({
        url: "http://192.168.1.20/DATN/getDataFormDatabase.php",
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
            graphHum = draw(humidity, day, 'Humidity', 'chartHumidity');
            graphTem = draw(temperature, day, 'Temperature', 'chartTemperature');
            graphSM = draw(solidiMoisture, day, 'Solid Moisture', 'chartSolidiMoisture');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
drawDefault();
// update chart config and data
function update(chart, data, labels) {
    console.log('update');
    chart.data.labels = labels;
    chart.data.datasets[0].data = data;
    chart.update();
}

// read date input and load chart of that date
function chartUpdate() {
    var date = document.getElementById('date').value;
    // var test = "http://192.168.1.20/DATN/getDataByDate.php?date=" + date;
    // console.log(test);
    $.ajax({
        url: "http://192.168.1.20/DATN/getDataByDate.php?date=" + date,
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
            update(graphHum, humidity, day);
            update(graphTem, temperature, day);
            update(graphSM, solidiMoisture, day);
            console.log("chartUpdate");

        },
        error: function(data) {
            console.log(data);
        }
    });
}