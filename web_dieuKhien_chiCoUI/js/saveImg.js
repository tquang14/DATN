// find current tab is show in html
// return canvas id in this tab
function findShowTab() {
    var tab1 = document.getElementById('tabHum');
    if (tab1.classList.contains('show'))
        return 'chartHumidity';
    var tab2 = document.getElementById('tabTem');
    if (tab2.classList.contains('show'))
        return 'chartTemperature';
    return 'chartSolidiMoisture';
}

//
function saveChart() {
    var c = document.getElementById(findShowTab());
    var d = c.toDataURL("image/png");
    var w = window.open('about:blank', 'image from canvas');
    w.document.write("<img src='" + d + "' alt='from canvas'/>");
}