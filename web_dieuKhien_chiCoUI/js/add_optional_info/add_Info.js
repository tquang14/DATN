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