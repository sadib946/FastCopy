// Homepage Link fixer
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const keys = urlParams.keys();
for (const key of keys) {
    if(key != "page" && key != "id"){
        location.replace(window.location.origin);
        // console.log(key);
    }
}

// Send Page getTime
function getDateTime(){
    var n =  new Date();
    var y = n.getFullYear();
    var m = n.getMonth() + 1;
    var d = n.getDate();
    var h = n.getHours();
    var mi = n.getMinutes();
    var s = n.getSeconds();

    return d + "/" + m + "/" + y + " " + h + ":" + mi + ":" + s;
}

function current_time_display(){
    return "<pre>Current time : " + getDateTime() + "</pre>";
}
var display_date_get_id = document.getElementById("display-date");
var date_field_get_id = document.getElementById("date-field");

if(display_date_get_id != undefined || date_field_get_id != undefined){
    display_date_get_id.innerHTML = current_time_display();
    setInterval(() => { 
        display_date_get_id.innerHTML = current_time_display();
        date_field_get_id.value = getDateTime();

    }, 1000);
}

// Send action
var form = document.getElementById("sendForm");
if(form != undefined){
    form.addEventListener("submit", function (e){
        e.preventDefault();

        var form_data = new FormData(this);

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.response);
            }else if(this.readyState == 4){
                console.log("Error");
            }
        }

        xhr.open("POST", "script/send.php", true);
        xhr.responseType = "json";
        xhr.send(form_data);
    });
}


// Receive Data from ID
function generateId(){

    var url = "script/generate-id.php";

    fetch(url)
    .then(response => {return response.json()})
    .then(result => {   
        var current_url = window.location.href;
        var new_url = current_url + "&id=" + result["id"];
        window.location.replace(new_url);
     })
    .catch(error => {   console.log(error); });
}

var get_page = urlParams.get("page");

if(get_page == "receive"){
    var get_id = urlParams.get("id");
    if(get_id == undefined){
        generateId();
    }

    var show_session_id = document.getElementById("session-id");
    show_session_id.innerHTML = get_id;

    if(get_id != undefined){
        var show_id_HTML = document.getElementById("show-data");
    
        var data = {"id": get_id};
        var receiveURL = "script/receive.php";
    
        setInterval(() => {
            fetch(receiveURL, {
            
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify(data)
        
            }).then(response => response.json())
            .then(result => {
                var all_data = result["data"];
                show_id_HTML.innerHTML = "";
                for (var data of all_data){
                    var data_block = "<div class='receive-content'><p class='receive-datetime'>Added On : " + data["date"] + "</p>" + data["text"] + "</div>";
                    show_id_HTML.innerHTML += data_block;
                }
            }).catch(error => {
                console.log(error);
            });
        }, 1000);
    }
}