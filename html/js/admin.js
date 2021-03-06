function firstLoadLogs($table) {
  document.getElementById($table).innerHTML += '';
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getLog.php", true);
  xhttp.send();
}
function firstLoadUsers($table, $btn) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById($table).innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php?table="+$table+"&btn="+$btn, true);
  xhttp.send();
}
function newLoadUsers($table, $lastIdUsers, $btn) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById($table).innerHTML += this.responseText;
    }
  };
  xhttp.open("GET", "../API/admintools/getUsers.php?i="+$lastIdUsers+"&table="+$table+"&btn="+$btn, true);
  xhttp.send();
}
function deleteUser(id, username) {
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
function load() {
  firstLoadLogs("logstable");
  firstLoadUsers("userstable", '<button type="button" class="btn btn-secondary" onclick="alert(\'wip\')"><i class="bi bi-pencil-square"></i>Editar</button>');
}
function deleteModalLoad() {
  firstLoadUsers("userstabledelete",  '<button type="button" class="btn btn-secondary" onclick="deleteUsersBtn($(this).parent().attr(\'id\'))"><i class="bi bi-person-dash"></i>Eliminar</button>');
}
function deleteUsersBtn(btn){
  alert(btn);
  var strFormatedInput = btn.split('_')[1]+'_'+btn.split('_')[2];
  var documentID = 'id_'+strFormatedInput;
  //alert(document.getElementById(documentID).innerHTML);
  var intID = Number(document.getElementById(documentID).innerHTML);
  //alert(intID);
  var docuemntUsername = 'username_'+strFormatedInput;
  var strUsername = document.getElementById(docuemntUsername).innerHTML;
  //alert(strUsername);
  deleteUser(intID,strUsername);
}

window.onload = load();