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
    var datetimeStart = document.getElementById('addTree_dateStart').value;
    var datetimeEnd = document.getElementById('addTree_dateEnd').value;
    var getURL = "http://" + ip + ":" + port + "/DATN/addTree.php?name=" + name + "&ID=" + ID + "&location=";
    getURL += location + "&datetimeStart=" + datetimeStart + "&datetimeEnd=" + datetimeEnd;
    $.ajax({
        url: getURL,
        type: "GET",
        success: function(data) {
            alert("them thong tin thanh cong");
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}