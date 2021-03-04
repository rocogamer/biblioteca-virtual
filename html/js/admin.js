function firstLoadLogs($table, $autorizationkey) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getLog.php", true);
  xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
  xhttp.send();
}
function firstLoadUsers($table, $autorizationkey) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php", true);
  xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
  xhttp.send();
}
function newLoadUsers($table, $autorizationkey, $lastIdUsers) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php?i="+$lastIdUsers, true);
  xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
  xhttp.send();
}