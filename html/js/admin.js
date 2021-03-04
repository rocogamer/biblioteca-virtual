function loadLogs($autorizationkey) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("logstable").innerHTML += this.responseText;
      }
    };
    xhttp.open("GET", "../API/admintools/getLog.php", true);
    xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
    xhttp.send();
  }
  function loadUsers() {
  
  }