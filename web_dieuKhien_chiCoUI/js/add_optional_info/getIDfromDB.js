function getfullTreeInfo() {
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getTreeInfo.php",
        type: "GET",
        success: function(data) {
            // create element for input list in add tree UI
            var ID_list = document.getElementById("ID-list");
            // create element for input list in QRcode UI
            var ID_list_1 = document.getElementById("ID-list_1");
            var ID_list_2 = document.getElementById('ID-list_2');
            // refresh div before load data again to avoid duplicate
            ID_list.innerHTML = "";
            ID_list_1.innerHTML = "";
            ID_list_2.innerHTML = "";
            for (let i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.value = data[i].ID;
                var dateStart = data[i].dateStart.substring(0, data[i].dateStart.indexOf(" "));
                var location = data[i].location;
                option.innerHTML = data[i].name + ',' + dateStart + ',' + location;
                ID_list.appendChild(option);
            }
            ID_list_1.appendChild(ID_list.cloneNode(true));
            ID_list_2.appendChild(ID_list.cloneNode(true));
            // create content for table in modify UI
            var tableContent = document.getElementById('tableContent');
            // refresh div before load data again to avoid duplicate
            tableContent.innerHTML = "";
            for (let i = 0; i < data.length; i++) {
                var dateStart = data[i].dateStart.substring(0, data[i].dateStart.indexOf(" "));
                var dateEnd = data[i].dateEnd.substring(0, data[i].dateEnd.indexOf(" "));
                var tr = document.createElement("tr");
                var rowContent = "<td>" + data[i].ID + "</td>";
                rowContent += "<td>" + data[i].name + "</td>";
                rowContent += "<td>" + dateStart + "</td>";
                rowContent += "<td>" + dateEnd + "</td>";
                rowContent += "<td>" + data[i].location + "</td>";
                rowContent += "<td class='featureIcon'>" +
                    "<span id='icon-checked' onclick='edit(" + '"' + data[i].ID + '"' + ")'></span>" +
                    "<span id='icon-del' onclick='del(" + '"' + data[i].ID + '"' + ")'></span>" +
                    "</td>";
                tr.innerHTML = rowContent;
                tableContent.appendChild(tr);
            }
        },
        error: function(data) {
            alert("ko co ket noi toi database");
        }
    });
}
getfullTreeInfo();

function remove(pos) {
    if (pos == '1')
        document.getElementById("treeID_1").value = "";
    else if (pos == '2')
        document.getElementById("treePackID").value = "";
    else
        document.getElementById("treeID").value = "";
}

function setDefaultID() {
    document.getElementById('treeID').value = curID;
    document.getElementById('treePackID').value = curID;
}
// function to run when click edit btn => get value from DB and display
function edit(ID) {
    // colapse pick tree to edit UI and display the edit UI
    document.getElementById('cardLink2').click();
    // request basic info
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getTreeInfo.php?id=" + ID,
        type: "GET",
        success: function(data) {
            document.getElementById('modifyTree_ID').value = data[0].ID;
            document.getElementById('modifyTree_Name').value = data[0].name;
            document.getElementById('modifyTree_dateStart').value = data[0].dateStart.replace(" ", "T");
            document.getElementById('modifyTree_dateEnd').value = data[0].dateEnd.replace(" ", "T");
            document.getElementById('modifyTree_Location').value = data[0].location;
            document.getElementById('modifyTree_Address').value = data[0].address;
        },
        error: function(data) {
            alert("co loi chi tiet xem console");
            console.log(data);
        }
    });
    requestOptionalInfo(ID);
    requestPackInfo(ID);
}
// request optional info and display to UI
function requestOptionalInfo(ID) {
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getOptional_info.php?id=" + ID,
        type: "GET",
        success: function(data) {
            var modifyUI = document.getElementById('modify_optionalInfo');
            if (data.length == 0) {
                modifyUI.innerHTML = "không có thông tin để chỉnh sửa";
            } else {
                modifyUI.innerHTML = "";
                for (var i in data) {
                    var div = document.createElement('div');
                    // format to yyyy-MM-ddThh:mm
                    var date = data[i].date.replace(" ", "T");
                    date = date.substring(0, data[i].date.lastIndexOf(":"));
                    div.className = "input-group m-2";
                    div.setAttribute("ID", "key_" + data[i]._index);
                    var content = "<input type='datetime-local' class='form-control' value= '" + date + "'>";
                    content += "<input type='text' class='form-control' value='" + data[i].type + "'>";
                    content += "<span id='icon-x' class='form-control' onclick='del(" + '"optional_' + data[i]._index + '"' + ")'></span>"
                    div.innerHTML = content;
                    modifyUI.appendChild(div);
                }
            }
        },
        error: function(data) {
            alert("co loi chi tiet xem console");
            console.log(data);
        }
    });
}

// request packed info and display to UI
function requestPackInfo(ID) {
    var datetime = document.getElementById('modify_packDatetime');
    var location = document.getElementById('modify_packLocation');
    var address = document.getElementById('modify_packAddress');
    $.ajax({
        url: "http://" + ip + ":" + port + "/DATN/getPack_info.php?id=" + ID,
        type: "GET",
        success: function(data) {
            if (data.length === 0) {

            } else {
                datetime.value = data[0].datePack.replace(" ", "T");;
                location.value = data[0].location;
                address.value = data[0].address;
            }
        },
        error: function(data) {
            alert("co loi chi tiet xem console");
            console.log(data);
        }
    });
}

function del(ID) {
    if (ID.indexOf("optional_") != -1) {

        // remove info in DB
        var _index = ID.substring(ID.indexOf("_") + 1);
        console.log(_index);
        $.ajax({
            url: "http://" + ip + ":" + port + "/DATN/delTree.php?_index=" + _index,
            type: "GET",
            success: function(data) {
                console.log(data);
                // remove element have just click del
                document.getElementById("key_" + _index).remove();
            },
            error: function(data) {
                alert("co loi chi tiet xem console");
                console.log(data);
            }
        });
    } else {
        // remove the UI in website
        document.getElementById("modifyTree_ID").value = "";
        document.getElementById("modifyTree_Name").value = "";
        document.getElementById("modifyTree_Location").value = "";
        document.getElementById("modifyTree_Address").value = "";
        document.getElementById("modifyTree_dateStart").value = "";
        document.getElementById("modifyTree_dateEnd").value = "";
        document.getElementById("modify_packDatetime").value = "";
        document.getElementById("modify_packLocation").value = "";
        document.getElementById("modify_packAddress").value = "";
        // then remove in DB
        $.ajax({
            url: "http://" + ip + ":" + port + "/DATN/delTree.php?id=" + ID,
            type: "GET",
            success: function(data) {
                console.log(data);
                getfullTreeInfo();
            },
            error: function(data) {
                alert("co loi chi tiet xem console");
                console.log(data);
            }
        });
    }
}