// get device current state
const deviceRefs = ['bom', 'den', 'phunsuong', 'maiChe'];
const IDs = ['pump', 'light', 'misting', 'roof'];

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