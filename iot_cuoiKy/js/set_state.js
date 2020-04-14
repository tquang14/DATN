const firebaseConfig = {
    apiKey: "AIzaSyDIXsmHu0C9Swyo3dT6dnneJMhw1dMQ5ow",
    authDomain: "testmyled-aa8f7.firebaseapp.com",
    databaseURL: "https://testmyled-aa8f7.firebaseio.com",
    projectId: "testmyled-aa8f7",
    storageBucket: "testmyled-aa8f7.appspot.com",
    messagingSenderId: "378415090064",
    appId: "1:378415090064:web:3c01ac67900f96aea54b15"
};

firebase.initializeApp(firebaseConfig);

function relay1() {
    let relay1 = firebase.database().ref('iot_android_control/bom');
    relay1.once('value', function(snapshot1) {
        if (snapshot1.val() == "on") {
            firebase.database().ref('iot_android_control/bom').set('off');
        } else if (snapshot1.val() == "off") {
            firebase.database().ref('iot_android_control/bom').set('on');
        }
    });
}

function relay1() {
    let relay1 = firebase.database().ref('iot_android_control/bom');
    relay1.once('value', function(snapshot1) {
        if (snapshot1.val() == "on") {
            firebase.database().ref('iot_android_control/bom').set('off');
        } else if (snapshot1.val() == "off") {
            firebase.database().ref('iot_android_control/bom').set('on');
        }
    });
}

function relay3() {
    let relay3 = firebase.database().ref('iot_android_control/den');
    relay3.once('value', function(snapshot1) {
        if (snapshot1.val() == "on") {
            firebase.database().ref('iot_android_control/den').set('off');
        } else if (snapshot1.val() == "off") {
            firebase.database().ref('iot_android_control/den').set('on');
        }
    });
}

function relay2() {
    let relay2 = firebase.database().ref('iot_android_control/phunSuong');
    relay2.once('value', function(snapshot1) {
        if (snapshot1.val() == "on") {
            firebase.database().ref('iot_android_control/phunSuong').set('off');
        } else if (snapshot1.val() == "off") {
            firebase.database().ref('iot_android_control/phunSuong').set('on');
        }
    });
}

function changeMode() {
    let mode = firebase.database().ref('iot_android_control/mode');

    mode.once('value', function(snapshot) {
        if (snapshot.val() == 'auto') {
            firebase.database().ref('iot_android_control/mode').set('manual');

        } else if (snapshot.val() == 'manual') {
            firebase.database().ref('iot_android_control/mode').set('auto');
        }
    });
}

function set(cay) {
    let t_bound = document.getElementById('t_bound_' + cay).value;
    if (t_bound == "")
        t_bound = document.getElementById('t_bound_' + cay).placeholder;
    let h_bound = document.getElementById('h_bound_' + cay).value;
    if (h_bound == "")
        h_bound = document.getElementById('h_bound_' + cay).placeholder;
    let soil_moisture_bound = document.getElementById('soil_moisture_bound_' + cay).value;
    if (soil_moisture_bound == "")
        soil_moisture_bound = document.getElementById('soil_moisture_bound_' + cay).placeholder;
    let light_bound = document.getElementById('light_bound_' + cay).value;
    if (light_bound == "")
        light_bound = document.getElementById('light_bound_' + cay).placeholder;
    firebase.database().ref('auto_val').set({
        nhietDo: t_bound,
        doAmKK: h_bound,
        doAmDat: soil_moisture_bound,
        anhSang: light_bound,
    });
    let tmp = cay.charAt(0).toUpperCase() + cay.slice(1);
    firebase.database().ref('iot_android/loaiCay').set(tmp);
}

function load(cay, nhietDo, doAmKK, doAmDat, anhSang) {
    document.getElementById('t_bound_' + cay).value = nhietDo;
    document.getElementById('h_bound_' + cay).value = doAmKK;
    document.getElementById('soil_moisture_bound_' + cay).value = doAmDat;
    document.getElementById('light_bound_' + cay).value = anhSang;
}