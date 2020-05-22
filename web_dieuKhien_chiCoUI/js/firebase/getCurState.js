// get device current state
const deviceRefs = ['/bom', '/den', '/phunsuong', '/maiChe'];
const IDs = ['pump', 'light', 'misting', 'roof'];

function getState() {
    for (let index = 0; index < deviceRefs.length; index++) {
        const deviceRef = deviceRefs[index] + '/state';
        const deviceSwitch = IDs[index] + "Switch";
        $.ajax({
            url: "http://" + ip + ":" + port + "/DATN/getStatus.php?name=" + deviceRef,
            type: "GET",
            success: function(data) {
                if (data == 'off') {
                    deviceSwitch.checked = false;
                    changeDeviceCardStyle(IDs[index], 'off')
                } else {
                    deviceSwitch.checked = true;
                    changeDeviceCardStyle(IDs[index], 'on')
                }
            },
            error: function(data) {
                alert("ko co ket noi toi database");
            }
        });
    }
}
setInterval(getState, 300);
//get sensor current value
const sensorRefs = ['doAmdat', 'doAmkk', 'mua', 'nhietdo'];
const sensorDivIDs = ['soil_moisture', 'humidity', 'rain', 'temperature'];

function getCurSensorVal() {
    for (let index = 0; index < sensorRefs.length; index++) {
        const sensorRef = "/sensor_" + sensorRefs[index];
        $.ajax({
            url: "http://" + ip + ":" + port + "/DATN/getStatus.php?name=" + sensorRef,
            type: "GET",
            success: function(data) {
                var sensorDiv = document.getElementById(sensorDivIDs[index]);
                if (sensorDivIDs[index] == 'rain') {
                    if (data == 'khong') {
                        sensorDiv.childNodes[0].nodeValue = "Không có mưa";
                    } else {
                        sensorDiv.childNodes[0].nodeValue = "Đang mưa";
                    }
                } else {
                    sensorDiv.childNodes[0].nodeValue = data;
                }
            },
            error: function(data) {
                alert("ko co ket noi toi database");
            }
        });
    }
}
setInterval(getCurSensorVal, 300);
// get current tree ID
var curID = "";

function getID() {
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getStatus.php?name=curID",
        type: "GET",
        success: function(data) {
            curID = data;
            document.getElementById('treeID_1').value = curID;
            drawQRcode();
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}
getID();