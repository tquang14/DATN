function getID() {
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getTreeInfo.php",
        type: "GET",
        success: function(data) {
            console.log(data);
            var ID_list = document.getElementById("ID-list");
            for (let i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.value = data[i].ID;
                var dateStart = data[i].dateStart.substring(0, data[i].dateStart.indexOf(" "));
                var location = data[i].location;
                option.innerHTML = data[i].name + ',' + dateStart + ',' + location;
                ID_list.appendChild(option);
            }
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}
getID();

function remove() {
    document.getElementById("treeID").value = "";
}

function setDefaultID() {
    document.getElementById('treeID').value = curID;
}