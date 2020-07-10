function drawQRcode() {
    //emty div first
    var div = document.getElementById("QRcodeIMG");
    div.childNodes[0].remove();
    var id = document.getElementById("treeID_1").value;
    jQuery('#QRcodeIMG').qrcode({
        text: "http://" + ip + ":" + port + "/TimeLine/timeLine.php?id=" + id
    });
}

function gotoWeb() {
    var id = document.getElementById("treeID_1").value;
    var url = "http://" + ip + ":" + port + "/TimeLine/timeLine.php?id=" + id;
    window.open(url);
}