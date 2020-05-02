// find current tab is show in html
// return canvas id in this tab
function findCurShowChart() {
    var tab1 = document.getElementById('tabHum');
    if (tab1.classList.contains('show'))
        return 'chartHumidity';
    var tab2 = document.getElementById('tabTem');
    if (tab2.classList.contains('show'))
        return 'chartTemperature';
    return 'chartSolidiMoisture';
}

//save canvas as img using saveAs method in filesaver
function saveChart() {
    var chartID = findCurShowChart();
    var canvas = document.getElementById(chartID);
    var date = document.getElementById('date').value;
    canvas.toBlob(function(blob) {
        saveAs(blob, chartID + "_" + date + ".png");
    });
}