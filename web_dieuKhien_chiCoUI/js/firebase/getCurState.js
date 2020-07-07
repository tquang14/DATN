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

var autoMode = firebase.database().ref('mode');
autoMode.on('value', function(snapshot) {
    console.log(snapshot.val());
    if (snapshot.val() === "auto") {
        mode = 'auto';
        document.getElementById('icon-auto').style.filter = 'grayscale(0%)';
        $('#control').fadeOut(500);
    } else if (snapshot.val() === "manual") {
        mode = 'manual';
        document.getElementById('icon-auto').style.filter = 'grayscale(100%)';
        $('#control').fadeIn(500);
    } else {
        alert('ko phat hien mode auto/manual');
    }
});