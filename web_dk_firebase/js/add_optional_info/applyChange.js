function applyChange() {
    var ID = document.getElementById("modifyTree_ID").value;
    var name = document.getElementById("modifyTree_Name").value;
    var dateStart = document.getElementById("modifyTree_dateStart").value;
    var dateEnd = document.getElementById("modifyTree_dateEnd").value;
    var location = document.getElementById("modifyTree_Location").value;
    var treeData = { type: 'tree', ID: ID, name: name, dateStart: dateStart, dateEnd: dateEnd, location: location };
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/modify.php",
        type: "POST",
        data: treeData,
        success: function(data) {
            console.log(data);
            getfullTreeInfo();
        },
        error: function(data) {
            alert("Lỗi kết nối");
            console.log(date);
        }
    });
    var modifyDIV = document.getElementById("modify_optionalInfo");
    var _index = [];
    var date = [];
    var info = [];
    for (let i = 0; i < modifyDIV.childNodes.length; i++) {
        var inputDIV = modifyDIV.childNodes[i];
        if (inputDIV.nodeName.toLowerCase() == "div") {
            // format of id is key_x which x is number of index in DB
            _index.push(inputDIV.id.substring(4));
            // first childNode is date input
            date.push(inputDIV.childNodes[0].value);
            // second is info
            info.push(inputDIV.childNodes[1].value);
        }
    }
    var optionalData = { type: "optional_info", _index: _index, date: date, info: info };
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/modify.php",
        type: "POST",
        data: optionalData,
        success: function(data) {
            alert("Cập nhật thông tin thành công");
            console.log(data);
            getfullTreeInfo();
        },
        error: function(data) {
            alert("Lỗi kết nối");
            console.log(data);
        }
    });
}