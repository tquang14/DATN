// get the date and update to html
curDate = new Date();
datePicker = document.getElementById('date');
datePicker.value = curDate.toFormattedString('yyyy-mm-dd');
// some global var
var graphHum;
var graphTem;
var graphSM;
// draw chart to html
function draw(data, labels, label, canvasID) {
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
    var date = document.getElementById('date').value;
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
            graphHum = draw(humidity, day, 'Humidity', 'chartHumidity');
            graphTem = draw(temperature, day, 'Temperature', 'chartTemperature');
            graphSM = draw(solidiMoisture, day, 'Solid Moisture', 'chartSolidiMoisture');
            checkEmptyChart('chartHumAlert', 'chartHumidity', humidity);
            checkEmptyChart('chartTemAlert', 'chartTemperature', temperature);
            checkEmptyChart('chartSMAlert', 'chartSolidiMoisture', solidiMoisture);
            console.log("test:" + avgCalculate(humidity));
            document.getElementById('avgHum').innerHTML = "Trung Bình:" + avgCalculate(humidity);
            document.getElementById('avgTem').innerHTML = "Trung Bình:" + avgCalculate(temperature);
            document.getElementById('avgSM').innerHTML = "Trung Bình:" + avgCalculate(solidiMoisture);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
drawDefault();
// update chart config and data
function update(chart, data, labels) {
    chart.data.labels = labels;
    chart.data.datasets[0].data = data;
    chart.update();
}

// read date input and load chart of that date
function chartUpdate() {
    var date = document.getElementById('date').value;
    // var test = "http://192.168.1.20/DATN/getDataByDate.php?date=" + date;
    if (datePicker.type == "date") {
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
                checkEmptyChart('chartHumAlert', 'chartHumidity', humidity);
                checkEmptyChart('chartTemAlert', 'chartTemperature', temperature);
                checkEmptyChart('chartSMAlert', 'chartSolidiMoisture', solidiMoisture);
                document.getElementById('avgHum').innerHTML = "Trung Bình:" + avgCalculate(humidity);
                document.getElementById('avgTem').innerHTML = "Trung Bình:" + avgCalculate(temperature);
                document.getElementById('avgSM').innerHTML = "Trung Bình:" + avgCalculate(solidiMoisture);
            },
            error: function(data) {
                console.log(data);
            }
        });
    } else {
        $.ajax({
            url: "http://192.168.1.20/DATN/getDataByDate.php?month=" + date,
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
                checkEmptyChart('chartHumAlert', 'chartHumidity', humidity);
                checkEmptyChart('chartTemAlert', 'chartTemperature', temperature);
                checkEmptyChart('chartSMAlert', 'chartSolidiMoisture', solidiMoisture);
                document.getElementById('avgHum').innerHTML = "Trung Bình:" + avgCalculate(humidity);
                document.getElementById('avgTem').innerHTML = "Trung Bình:" + avgCalculate(temperature);
                document.getElementById('avgSM').innerHTML = "Trung Bình:" + avgCalculate(solidiMoisture);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

}

function checkEmptyChart(divID, canvasID, data) {
    div = document.getElementById(divID);
    ctx = document.getElementById(canvasID);
    if (data.length <= 0) {
        div.style.display = 'block';
        // ctx.style.display = 'none';
    } else {
        div.style.display = 'none';
        // ctx.style.display = 'block';
    }
}

function switchViewMode() {
    monthSW = document.getElementById('viewByMonth');
    if (monthSW.checked) {
        datePicker.type = "month";
        datePicker.value = curDate.toFormattedString('yyyy-mm');
    } else {
        datePicker.type = "date";
        datePicker.value = curDate.toFormattedString('yyyy-mm-dd');
    }
    chartUpdate();
}

function avgCalculate(data) {
    if (data.length == 0)
        return "NULL";
    var avg = 0;
    for (var i in data) {
        avg += parseFloat(data[i]);
    }
    return Math.round(((avg / data.length) + Number.EPSILON) * 100) / 100;;
}