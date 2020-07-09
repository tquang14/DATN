// get device current state
const deviceRefs = ['bom', 'den', 'phunsuong', 'maiChe'];
const IDs = ['pump', 'light', 'misting', 'roof'];
let mode = '';
for (let index = 0; index < deviceRefs.length; index++) {
    const deviceRef = deviceRefs[index];
    var sensor_state = firebase.database().ref(deviceRef + '/state');

    sensor_state.on('value', function(snapshot) {
        var deviceSwitch = document.getElementById(IDs[index] + 'Switch');
        if (snapshot.val() == 'off') {
            deviceSwitch.checked = false;
            changeDeviceCardStyle(IDs[index], 'off')
        } else {
            deviceSwitch.checked = true;
            changeDeviceCardStyle(IDs[index], 'on')
        }
    });
}

//get sensor current value
const sensorRefs = ['doAmdat', 'doAmkk', 'mua', 'nhietdo'];
const sensorDivIDs = ['soil_moisture', 'humidity', 'rain', 'temperature'];

for (let index = 0; index < sensorRefs.length; index++) {
    const sensorRef = sensorRefs[index];
    var sensorVal = firebase.database().ref('sensor_' + sensorRef);

    sensorVal.on('value', function(snapshot) {
        var sensorDiv = document.getElementById(sensorDivIDs[index]);
        // rain sensor val need to be changed to Vietnamese
        if (sensorDivIDs[index] == 'rain') {
            if (snapshot.val() == 'Khong co mua') {
                sensorDiv.childNodes[0].nodeValue = "Không có mưa";
            } else {
                sensorDiv.childNodes[0].nodeValue = "Đang mưa";
            }
        } else {
            sensorDiv.childNodes[0].nodeValue = snapshot.val();
        }
    });
}

// get current tree ID
var curID = "";
var ID = firebase.database().ref('ID');
ID.on('value', function(snapshot) {
    curID = snapshot.val();
    document.getElementById('treeID_1').value = curID;
    drawQRcode();
});

// get current mode
var autoMode = firebase.database().ref('mode');
autoMode.on('value', function(snapshot) {
    console.log(snapshot.val());
    if (snapshot.val() === "auto") {
        mode = 'auto';
        document.getElementById('icon-auto').style.filter = 'grayscale(0%)';
        $('#control').fadeOut(500);
        $('#set-auto').fadeIn(500);
    } else if (snapshot.val() === "manual") {
        mode = 'manual';
        document.getElementById('icon-auto').style.filter = 'grayscale(100%)';
        $('#control').fadeIn(500);
        $('#set-auto').fadeOut(500);
    } else {
        alert('ko phat hien mode auto/manual');
    }
});

// get auto value in auto mode
const autoRefs = ["nhietdo_kk", "doam_kk", "doam_dat"];
const autoDivIDs = ["temperatureRangeSlider", "humidityRangeSlider", "SMRangeSlider"];
// this used for jquery to lazy to use '# + autoDivIDs' :v
const RangeSliderIDs = ["#temperatureRangeSlider", "#humidityRangeSlider", "#SMRangeSlider"];
for (let index = 0; index < autoRefs.length; index++) {
    const autoRef = autoRefs[index];
    var sensorVal = firebase.database().ref('value_sensor/' + autoRef);
    sensorVal.once('value', function(snapshot) {
        let autoDivID = document.getElementById(autoDivIDs[index]);
        autoDivID.value = parseFloat(snapshot.val());
        // change range slider UI
        var rangePercent = $(RangeSliderIDs[index]).val();
        if (index == 0) {
            $('#rangePercent').html(rangePercent + '<span></span>');
            $(RangeSliderIDs[index] + ', h4>span').css('filter', 'hue-rotate(-' + rangePercent / 2 + 'deg)');
            // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
            $('#rangePercent').css({ 'transform': 'translateX(-50%) scale(' + (1 + (rangePercent / 140)) + ')', 'left': rangePercent + '%' });
        } else {
            $('#rangePercent' + (index).toString()).html(rangePercent + '<span></span>');
            $(RangeSliderIDs[index] + ', h4>span').css('filter', 'hue-rotate(-' + rangePercent / 2 + 'deg)');
            // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
            $('#rangePercent' + (index).toString()).css({ 'transform': 'translateX(-50%) scale(' + (1 + (rangePercent / 140)) + ')', 'left': rangePercent + '%' });
        }

    });
}