on_change_select();

function on_change_select() {
    let select = document.getElementById("sel1").value;
    switch (select) {
        case 'v1':
            document.getElementById("location").innerHTML = "VƯỜN 1"
            break;
        case 'v2':
            document.getElementById("location").innerHTML = "VƯỜN 2"
            break;
        case 'v3':
            document.getElementById("location").innerHTML = "VƯỜN 3"
            break;
        case 'v4':
            document.getElementById("location").innerHTML = "VƯỜN 4"
            break;
        default:
            break;
    }
}


let r1_state = document.getElementById("relay1");
let r2_state = document.getElementById("relay2");
let r3_state = document.getElementById("relay3");

let temperature = document.getElementById("temperature");
let humidity = document.getElementById("humidity");
let soil_moisture = document.getElementById("soil_moisture");
let light = document.getElementById("light");
// let rain = document.getElementById("rain");
let sensor_state = firebase.database().ref('iot_android');
let btn_mode = document.getElementById("btn_mode");

sensor_state.on('value', function(snapshot) {
    console.log(snapshot.val());
    temperature.innerHTML = `${snapshot.val()['nhietDo']}<i id="icon-thermometer" class="wi wi-thermometer"></i>`;
    humidity.innerHTML = snapshot.val()['doAmKK'] + "%";
    soil_moisture.innerHTML = snapshot.val()['doAmDat'] + "%";
    light.innerHTML = snapshot.val()['anhSang'] + " Lux";
    let loaiCay = snapshot.val()['loaiCay'];
    switch (loaiCay) {
        case "CaRot":
            document.getElementById('icon_cay').src = "img/portfolio/icon_caRot.png";
            break;
        case "BapCai":
            document.getElementById('icon_cay').src = "img/portfolio/icon_bapCai.png";
            break;
        case "BongCai":
            document.getElementById('icon_cay').src = "img/portfolio/icon_bongCai.png";
            break;
        case "CaChua":
            document.getElementById('icon_cay').src = "img/portfolio/icon_caChua.png";
            break;
        case "KhoaiTay":
            document.getElementById('icon_cay').src = "img/portfolio/icon_khoaiTay.png";
            break;
        case "CaiThia":
            document.getElementById('icon_cay').src = "img/portfolio/icon_caiThia.png";
            break;
        default:
            break;
    }
});
let relay_state = firebase.database().ref('iot_android_control');
relay_state.on('value', function(snapshot) {
    console.log(snapshot.val());
    r1_state.innerHTML = "bơm " + snapshot.val()['bom'];
    r2_state.innerHTML = "phun sương " + snapshot.val()['phunSuong'];
    r3_state.innerHTML = "đèn " + snapshot.val()['den'];
    if (snapshot.val()['mode'] == "auto") {
        btn_mode.innerHTML = "auto";
        document.getElementById('btn_mode').innerHTML = "AUTO";
        document.getElementById('control').style.display = "none";
        // document.getElementById('nav-item-control').style.display = "none";
        document.getElementById('manual_title').style.color = "black";
    } else if (snapshot.val()['mode'] == "manual") {
        btn_mode.innerHTML = "auto";
        document.getElementById('btn_mode').innerHTML = "MANUAL";
        document.getElementById('control').style.display = "block";
        // document.getElementById('nav-item-control').style.display = "block";
        document.getElementById('manual_title').style.color = "red";
    }
});

let auto_val = firebase.database().ref('auto_val');
auto_val.on('value', function(snapshot) {
    var arr = ['caRot', 'bapCai', 'bongCai', 'caiThia', 'khoaiTay', 'caChua'];
    arr.forEach(element => {
        document.getElementById('t_bound_' + element).placeholder = snapshot.val()['nhietDo'];
        document.getElementById('h_bound_' + element).placeholder = snapshot.val()['doAmKK'];
        document.getElementById('light_bound_' + element).placeholder = snapshot.val()['anhSang'];
        document.getElementById('soil_moisture_bound_' + element).placeholder = snapshot.val()['doAmDat'];
    });
});