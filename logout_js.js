
function logout(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.replace("index.php");
        }
    };
    xmlhttp.open("POST", "", true);
    xmlhttp.send();
}
