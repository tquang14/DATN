// find current tab is show in html
// return canvas id in this tab
function findCurShowChart() {
    var tab1 = document.getElementById('tabHum');
    if (tab1.classList.contains('show'))
        return 'chartHum';
    var tab2 = document.getElementById('tabTem');
    if (tab2.classList.contains('show'))
        return 'chartTem';
    return 'chartSM';
}

//save div as img using saveAs method in filesaver and dom to img
function saveChart() {
    var divID = findCurShowChart();
    // var div = document.getElementById(chartID);
    var date = document.getElementById('date').value;
    // canvas.toBlob(function(blob) {
    //     saveAs(blob, chartID + "_" + date + ".png");
    // });
    domtoimage.toBlob(document.getElementById(divID))
        .then(function(blob) {
            window.saveAs(blob, divID + "_" + date + ".png");
        });
}