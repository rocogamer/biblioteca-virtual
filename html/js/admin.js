function firstLoadLogs($table, $autorizationkey) {
  document.getElementById($table).innerHTML += '';
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
function firstLoadUsers($table, $autorizationkey, $btn) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById($table).innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php?table="+$table+"&btn="+$btn, true);
  xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
  xhttp.send();
}
function newLoadUsers($table, $autorizationkey, $lastIdUsers, $btn) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php?i="+$lastIdUsers+"&table="+$table+"&btn="+$btn, true);
  xhttp.setRequestHeader("Authorization", "Basic " + $autorizationkey);
  xhttp.send();
}
function deleteUser(autorizationkey, id, username) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/removeUser.php",
    dataType: "text",
    data: ({
      "userID": id,
      "username": username,
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "User deleted") {
          
        document.getElementById("row_"+username+"_userstabledelete").remove();
        document.getElementById("row_"+username+"_userstable").remove();
        /*var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them*/
       //console.log("Success");
        //console.log(data); // Testing to see if it works
      } else {
        alert("Ha habido un error al eliminar el usuario: "+data);
        /*var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them*/
        //console.log("error");
        //console.log(data); // Testing to see if it works
      }
        
      }
  });
  return false;
} 