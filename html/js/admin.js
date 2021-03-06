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
function firstLoadUsers(table, btn) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/getUsers.php",
    dataType: "text",
    data: ({
      "table": table,
      "btn": btn,
    }),
    success: function(data, statusText, jqXHR) {
      document.getElementById(table).innerHTML = data;
    }
  });
  return false;
}
function firstLoadCategories(table, btn) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/getCategoriesGestor.php",
    dataType: "text",
    data: ({
      "table": table,
      "btn": btn,
    }),
    success: function(data, statusText, jqXHR) {
      document.getElementById(table).innerHTML = data;
    }
  });
  return false;
}

function deleteCategory(id, nombre) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/editCategoriesGestor.php",
    dataType: "text",
    data: ({
      "ID": id,
      "nombre": nombre,
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "Category deleted") {
          
        document.getElementById("row_"+nombre+"_deletecategoriestable").remove();
        load();
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
function deleteCategoryBtn(btn){
  var strFormatedInput = btn.split('_')[1]+'_'+btn.split('_')[2];
  var documentID = 'id_'+strFormatedInput;
  var intID = Number(document.getElementById(documentID).innerHTML);
  var docuemntUsername = 'nombre_'+strFormatedInput;
  var strUsername = document.getElementById(docuemntUsername).innerHTML;
  deleteCategory(intID,strUsername);
}
function addCategoryBtn() {
  var nameBtn = document.getElementById("AddCategoryName").value;
  addCategory(nameBtn);
}
function editCategory(id, nombre) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/editCategoriesGestor.php",
    dataType: "text",
    data: ({
      "ID": id,
      "nombre": nombre,
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "Category deleted") {
          
        document.getElementById("row_"+nombre+"_deletecategoriestable").remove();
        load();
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
function EditCategoryBtn() {
  var idBtn = document.getElementById("EditCategoryID").value;
  var nameBtn = document.getElementById("EditCategoryName").value;
  editCategory(idBtn, nameBtn);
}



function addCategory(nombre) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/addCategoriesGestor.php",
    dataType: "text",
    data: ({
      "nombre": nombre,
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "Category added") {
          
        load();
        /*var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them*/
       //console.log("Success");
        //console.log(data); // Testing to see if it works
      } else {
        alert("Ha habido un error al editar la categoria: "+data);
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
        load();
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
function addUser(name, username, pwd, bookpermission, categoriespermission, userspermission) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/AddUser.php",
    dataType: "text",
    data: ({
      "name": name,
      "username": username,
      "pwd": pwd,
      "bookpermission": bookpermission ? "1" : "0",
      "categoriespermission": categoriespermission ? "1" : "0",
      "userspermission": userspermission ? "1" : "0"
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "User added") {
          
        alert("Usuario agregado");
        load();
        /*var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them*/
       //console.log("Success");
        //console.log(data); // Testing to see if it works
      } else {
        alert("Ha habido un error al añadir el usuario: "+data);
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
function addUserBtn() {
  var nameBtn = document.getElementById("AddUsername").value;
  var usernameBtn = document.getElementById("AddUserusername").value;
  var pwdBtn = document.getElementById("AddUserpwd").value;
  var bookpermissionBtn = document.getElementById("AddUserbookpermission").checked;
  var categoriespermissionBtn = document.getElementById("AddUsercategoriespermission").checked;
  var userspermissionBtn = document.getElementById("AddUseruserspermission").checked;
  addUser(nameBtn, usernameBtn, pwdBtn, bookpermissionBtn, categoriespermissionBtn, userspermissionBtn);
}
function editUsersLoadBtn(btn) {
  var strFormatedInput = btn.split('_')[1]+'_'+btn.split('_')[2];
  var documentID = 'id_'+strFormatedInput;
  var documentName = 'name_'+strFormatedInput;
  var documentUsername = 'username_'+strFormatedInput;
  var documentBookPermission = 'permbook_'+strFormatedInput;
  var documentCategoriesPermission = 'permcat_'+strFormatedInput;
  var documentUserPermission = 'permusr_'+strFormatedInput;
  if (document.getElementById(documentBookPermission).innerHTML == "Si") {
    documentBookPermission = true;
  } else {
    documentBookPermission = false;
  }
  if (document.getElementById(documentCategoriesPermission).innerHTML == "Si") {
    documentCategoriesPermission = true;
  } else {
    documentCategoriesPermission = false;
  }
  if (document.getElementById(documentUserPermission).innerHTML == "Si") {
    documentUserPermission = true;
  } else {
    documentUserPermission = false;
  }
  document.getElementById("EditUserID").value = Number(document.getElementById(documentID).innerHTML);
  document.getElementById("EditUsername").value = document.getElementById(documentName).innerHTML;
  document.getElementById("EditUserusername").value = document.getElementById(documentUsername).innerHTML;
  document.getElementById("EditUserbookpermission").checked = documentBookPermission;
  document.getElementById("EditUsercategoriespermission").checked = documentCategoriesPermission;
  document.getElementById("EditUseruserspermission").checked = documentUserPermission;
  
}
function editUserBtn() {
  var idBtn = document.getElementById("EditUserID").value;
  var nameBtn = document.getElementById("EditUsername").value;
  var usernameBtn = document.getElementById("EditUserusername").value;
  var pwdBtn = document.getElementById("EditUserpwd").value;
  var bookpermissionBtn = document.getElementById("EditUserbookpermission").checked;
  var categoriespermissionBtn = document.getElementById("EditUsercategoriespermission").checked;
  var userspermissionBtn = document.getElementById("EditUseruserspermission").checked;
  editUser(idBtn, nameBtn, usernameBtn, pwdBtn, bookpermissionBtn, categoriespermissionBtn, userspermissionBtn);
}
function editUser(id, name, username, pwd, bookpermission, categoriespermission, userspermission) {
  $.ajax({
    type: "POST",
    url: "../API/admintools/editUser.php",
    dataType: "text",
    data: ({
      "ID": id,
      "name": name,
      "username": username,
      "pwd": pwd,
      "bookpermission": bookpermission ? "1" : "0",
      "categoriespermission": categoriespermission ? "1" : "0",
      "userspermission": userspermission ? "1" : "0"
    }),
    success: function(data, statusText, jqXHR) {
      if (data == "User edited") {
          
        alert("Usuario editado");
        load();
        /*var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them*/
       //console.log("Success");
        //console.log(data); // Testing to see if it works
      } else {
        alert("Ha habido un error al editar el usuario: "+data);
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
  firstLoadUsers("userstable", '<button type="button" class="btn btn-secondary" onclick="editUsersLoadBtn($(this).parent().attr(\'id\'))" data-bs-toggle="modal" data-bs-target="#modalEditUsers"><i class="bi bi-pencil-square"></i> Editar</button>');
  firstLoadCategories("categoriestable", '<button type="button" class="btn btn-secondary" onclick="" data-bs-toggle="modal" data-bs-target="#modalEditCategory"><i class="bi bi-pencil-square"></i> Editar</button>');
}
function deleteModalLoad() {
  firstLoadUsers("userstabledelete",  '<button type="button" class="btn btn-secondary" onclick="deleteUsersBtn($(this).parent().attr(\'id\'))"><i class="bi bi-person-dash"></i>Eliminar</button>');
}
function deleteUsersBtn(btn){
  var strFormatedInput = btn.split('_')[1]+'_'+btn.split('_')[2];
  var documentID = 'id_'+strFormatedInput;
  var intID = Number(document.getElementById(documentID).innerHTML);
  var docuemntUsername = 'username_'+strFormatedInput;
  var strUsername = document.getElementById(docuemntUsername).innerHTML;
  deleteUser(intID,strUsername);
}

window.onload = load();