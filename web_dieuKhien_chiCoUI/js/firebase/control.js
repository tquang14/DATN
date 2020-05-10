// these function in this file interact with firebase and control hardware
function pump() {
    var pumpSwitch = document.getElementById('pumpSwitch');
    if (pumpSwitch.checked) {
        //gui len firebase
        firebase.database().ref('bom/state').set('on');
    } else {
        //gui len firebase
        firebase.database().ref('bom/state').set('off');
    }
}

function misting() {
    var mistingSwitch = document.getElementById('mistingSwitch');
    if (mistingSwitch.checked) {
        //gui len firebase
        firebase.database().ref('phunsuong/state').set('on');
    } else {
        //gui len firebase
        firebase.database().ref('phunsuong/state').set('off');
    }
}

function light() {
    var lightSwitch = document.getElementById('lightSwitch');
    if (lightSwitch.checked) {
        //gui len firebase
        firebase.database().ref('den/state').set('on');
    } else {
        //gui len firebase
        firebase.database().ref('den/state').set('off');
    }
}

function treeChange() {

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