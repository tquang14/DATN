const ip = "192.168.1.20";
const port = "80"; //default is 80
// these function in this file interact with firebase and control hardware
function pump() {
    var pumpSwitch = document.getElementById('pumpSwitch');
    if (pumpSwitch.checked) {
        request('/bom/state', 'on');
    } else {
        request('/bom/state', 'off');
    }
}

function misting() {
    var mistingSwitch = document.getElementById('mistingSwitch');
    if (mistingSwitch.checked) {
        request('/phunsuong/state', 'on');
    } else {
        request('/phunsuong/state', 'off');
    }
}

function roof() {
    var roofSwitch = document.getElementById('roofSwitch');
    if (roofSwitch.checked) {
        request('/maiChe/state', 'on');
    } else {
        request('/maiChe/state', 'off');
    }
}

function light() {
    var lightSwitch = document.getElementById('lightSwitch');
    if (lightSwitch.checked) {
        request('/den/state', 'on');
    } else {
        request('/den/state', 'off');
    }
}

function request(name, state) {
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/setStatus.php?name=" + name + "&status=" + state,
        type: "GET",
        success: function(data) {

        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}

// change display card in html to on or off style
function changeDeviceCardStyle(device, mode) {
    var icon = document.getElementById(device + 'Icon');
    var text = document.getElementById(device + 'Text');
    if (mode == 'on') {
        icon.style.filter = 'grayscale(0%)';
        text.style.color = 'rgb(36, 115, 196)';
    } else if (mode == 'off') {
        icon.style.filter = 'grayscale(100%)';
        text.style.color = 'gray';
    } else {
        alert("có lỗi trong quá trình điều khiển thiết bị");
    }
}