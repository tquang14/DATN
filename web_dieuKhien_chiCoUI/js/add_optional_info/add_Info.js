function addOptinalInfo() {
    var ID_to_add = document.getElementById('treeID').value;
    var dateTime = document.getElementById('datetime').value;
    var info = document.getElementById('info').value;
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/add_optional_info.php?id=" + ID_to_add + "&datetime=" + dateTime + '&type=' + info,
        type: "GET",
        success: function(data) {
            alert("them thong tin thanh cong");
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}

function addTree() {
    var name = document.getElementById('addTree_Name').value;
    var ID = document.getElementById('addTree_ID').value;
    var location = document.getElementById('addTree_Location').value;
    var address = document.getElementById('addTree_Address').value;
    var datetimeStart = document.getElementById('addTree_dateStart').value;
    var datetimeEnd = document.getElementById('addTree_dateEnd').value;
    var URL = "http://" + ip + ":" + port + "/DATN/addTree.php";
    var treeData = { ID: ID, name: name, datetimeStart: datetimeStart, datetimeEnd: datetimeEnd, location: location, address: address };
    $.ajax({
        url: URL,
        type: "POST",
        data: treeData,
        success: function(data) {
            if (data == "ID existed") {
                alert("ID đã tồn tại");
            } else {
                alert("them thong tin thanh cong");
                console.log(data);
                getfullTreeInfo();
            }
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}

function addPackInfo() {
    var ID = document.getElementById('treePackID').value;
    var datePack = document.getElementById('datetimePack').value;
    var location = document.getElementById('locationPack').value;
    var address = document.getElementById('addressPack').value;
    var data = { id: ID, datePack: datePack, location: location, address: address };
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/add_pack_info.php",
        type: "POST",
        data: data,
        success: function(data) {
            if (data == "ID existed") {
                alert("Thông tin về cây đã tồn tại");
            } else {
                alert("them thong tin thanh cong");
                console.log(data);
            }
        },
        error: function(data) {

        }
    });
}