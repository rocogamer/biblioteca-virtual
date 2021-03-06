<!DOCTYPE html>
<!-- https://www.studentstutorial.com/php/login-logout-with-session -->
<!-- Libro bien subido o mal usar toasts https://getbootstrap.com/docs/5.0/components/toasts/ -->
<!-- Las ayudas con tooltip https://getbootstrap.com/docs/5.0/components/tooltips/ -->
<!-- Para editar los libros? https://getbootstrap.com/docs/5.0/components/modal/ -->
<!-- Editar los libros? con onchange -->
<!-- https://getbootstrap.com/docs/5.0/forms/overview/ -->
<!-- https://getbootstrap.com/docs/5.0/examples/dashboard/ -->
<!-- Admin panel por permisos de usuario (Estilo un usuario puede SOLO agregar libros o puede agregar libros y categorias...) -->
<!-- Cambios en los ajustes personales (Ajustes, hacer un dark mode y un light mode...) -->
<!-- Que cuando agregas un libro o categoria se te actualice automaticamente la lista / se agrege la nueva info -->
<?php
  session_start();
  if (!(isset($_SESSION['ID']))) {
    Header('Location:login.php');
  }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Biblioteca Virtual</a>
      <ul class="navbar-nav px-3">
        <!--<li class="nav-item text-nowrap">
          <p>Sesion iniciada con: <?php /*echo $_SESSION["name"];*/ ?></p>
        </li>-->
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Cerrar sesion</a>
        </li>
      </ul>
    </header>
  
    <div class="container-fluid">
      <div class="row">
        <!--Hacer nav de hamburguesa-->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link active" data-toggle="tab" href="#dashboard">
                  <span data-feather="home"></span>
                  Panel de control
                </a>-->
                <button class="nav-link active" type="button" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="bi bi-speedometer2"></i> Panel de control</button>
              </li>
              <?php
              if ($_SESSION["bookpermission"]) {
              ?>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#books">
                  <span data-feather="books"></span>
                  Gestionar libros
                </a>-->
                <button class="nav-link" type="button" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" role="tab" aria-controls="books" aria-selected="false"><i class="bi bi-book-half"></i> Libros</button>
              </li>
              <?php
              }
              if ($_SESSION["categoriespermission"]) {
              ?>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#categories">
                  <span data-feather="categories"></span>
                  Gestionar categorias
                </a>-->
                <button class="nav-link" type="button" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories" role="tab" aria-controls="categories" aria-selected="false"><i class="bi bi-bookmarks-fill"></i> Categorias</button>
              </li>
              <?php
              }
              if ($_SESSION["userspermission"]) {
              ?>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#users">
                  <span data-feather="users"></span>
                  Gestionar usuarios
                </a>-->
                <button class="nav-link" type="button" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" role="tab" aria-controls="users" aria-selected="false"><i class="bi bi-people-fill"></i> Usuarios</button>
              </li>
              <?php
              }
              ?>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#users">
                  <span data-feather="users"></span>
                  Gestionar usuarios
                </a>-->
                <button class="nav-link" type="button" id="ajustespersonales-tab" data-bs-toggle="tab" data-bs-target="#ajustespersonales" role="tab" aria-controls="ajustespersonales" aria-selected="false"><i class="bi bi-sliders"></i> Ajustes</button>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="tab-content">
            <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Panel de control</h1>
                <h2>Ultima actividad</h2>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Actividad</th>
                      <th>Efectuado por:</th>
                      <th>Fecha y hora:</th>
                    </tr>
                  </thead>
                  <tbody id="logstable">
                  </tbody>
                </table>
              </div>
            </div>
            <?php
            if ($_SESSION["bookpermission"]) {
            ?>
              <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">Libros</h1>
                  <button type="button" class="btn btn-success" onclick="alert('WIP')" data-bs-toggle="modal" data-bs-target="#modalAddBook">Crear libro</button>
                  <button type="button" class="btn btn-danger" onclick="alert('WIP')" data-bs-toggle="modal" data-bs-target="#modalDeleteBook">Eliminar libro</button>
                  <h2>Listado de libros</h2>
                </div>
                <div class="table-responsive">
                      <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Autor</th>
                            <th>Categorias</th>
                            <th>URL</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody id="bookstable">
                        </tbody>
                      </table>
                    </div>
              </div>
            <?php
            }
            if ($_SESSION["categoriespermission"]) {
            ?>
              <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                    <h1 class="h2">Categorias</h1>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCategory">Crear categoria</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCatModalLoad()" data-bs-toggle="modal" data-bs-target="#modalDeleteCategory">Eliminar categoria</button>
                    <h2>Listado de categorias</h2>
                  </div>
                  <div class="modal fade" id="modalAddCategory" tabindex="-1" aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalAddCategoryLabel">Añadir categorias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body">
                          <form>
                            <input class="form-control wdith" type="text" id="AddCategoryName" name="AddCategoryName" placeholder="Nombre de la categoria"><br><br>
                            <button class="btn btn-secondary" type="button" onclick="addCategoryBtn()">Crear categoria</button>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modalDeleteCategory" tabindex="-1" aria-labelledby="modalDeleteCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalDeleteCategoryLabel">Eliminar categorias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Eliminar</th>
                                </tr>
                              </thead>
                              <tbody id="categorytabledelete">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modalEditCategory" tabindex="-1" aria-labelledby="modalEditCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditCategoryLabel">Editar categorias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body">
                          <form>
                            <input class="form-control wdithNumber" type="number" id="EditCategoryID" name="EditCategoryID" placeholder="Internal ID NO EDITAR" readonly><br>
                            <input class="form-control wdith" type="text" id="EditCategoryName" name="EditCategoryName" placeholder="Nombre de la categoria"><br><br><br>
                            <button class="btn btn-secondary" type="button" onclick="EditCategoryBtn()">Editar categoria</button>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th class="align">Editar categoria</th>
                          </tr>
                        </thead>
                        <tbody id="categoriestable">
                        </tbody>
                      </table>
                    </div>
              </div>
             <?php
            }
            if ($_SESSION["userspermission"]) {
            ?>
              <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                  <h1 class="h2">Usuarios</h1>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddUsers">Crear usuario</button>
                  <button type="button" class="btn btn-danger" onclick="deleteModalLoad()" data-bs-toggle="modal" data-bs-target="#modalDeleteUsers">Eliminar usuario</button>
                  <h2>Listado de usuarios</h2>
                </div>
                <div class="modal fade" id="modalDeleteUsers" tabindex="-1" aria-labelledby="modalDeleteUsersLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalDeleteUsersLabel">Eliminar usuarios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Username</th>
                                  <th>Permiso libros</th>
                                  <th>Permiso categorias</th>
                                  <th>Permiso usuarios</th>
                                  <th>Eliminar usuario</th>
                                </tr>
                              </thead>
                              <tbody id="userstabledelete">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                <div class="modal fade" id="modalAddUsers" tabindex="-1" aria-labelledby="modalAddUsersLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalAddUsersLabel">Añadir usuarios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <form class="form-switch">
                              <input class="form-control wdith" type="text" id="AddUsername" name="AddUsername" placeholder="Nombre (aqui puede ser nombre y apellidos)"><br>
                              <input class="form-control wdith" type="text" id="AddUserusername" name="AddUserusername" placeholder="Nombre de usuario (identificador de login)"><br>
                              <!-- Añadir ver la contraseña -->
                              <input class="form-control wdith" type="password" id="AddUserpwd" name="AddUserpwd" placeholder="Contrase&ntilde;a"><br>
                              <input class="form-check-input" type="checkbox" id="AddUserbookpermission" name="AddUserbookpermission" value="1">
                              <label class="form-check-label" for="AddUserbookpermission">Permiso de gestion de libros</label><br>
                              <input class="form-check-input" type="checkbox" id="AddUsercategoriespermission" name="AddUsercategoriespermission" value="1">
                              <label class="form-check-label"for="AddUsercategoriespermission">Permiso de gestion de categorias</label><br>
                              <input class="form-check-input" type="checkbox" id="AddUseruserspermission" name="AddUseruserspermission" value="1">
                              <label class="form-check-label" for="AddUseruserspermission">Permiso de gestion de usuarios</label><br><br>
                              <button class="btn btn-secondary" type="button" onclick="addUserBtn()">Crear usuario</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                <div class="modal fade" id="modalEditUsers" tabindex="-1" aria-labelledby="modalEditUsersLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditUsersLabel">Editar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <form class="form-switch">
                              <input class="form-control wdithNumber" type="number" id="EditUserID" name="EditUserID" placeholder="Internal ID NO EDITAR" readonly><br>
                              <input class="form-control wdith" type="text" id="EditUsername" name="EditUsername" placeholder="Nombre (aqui puede ser nombre y apellidos)"><br>
                              <input class="form-control wdith" type="text" id="EditUserusername" name="EditUserusername" placeholder="Nombre de usuario (identificador de login)"><br>
                              <!-- Añadir ver la contraseña -->
                              <input class="form-control wdith" type="password" id="EditUserpwd" name="EditUserpwd" placeholder="Contrase&ntilde;a"><br>
                              <input class="form-check-input" type="checkbox" id="EditUserbookpermission" name="EditUserbookpermission" value="1">
                              <label class="form-check-label" for="EditUserbookpermission">Permiso de gestion de libros</label><br>
                              <input class="form-check-input" type="checkbox" id="EditUsercategoriespermission" name="EditUsercategoriespermission" value="1">
                              <label class="form-check-label" for="EditUsercategoriespermission">Permiso de gestion de categorias</label><br>
                              <input class="form-check-input" type="checkbox" id="EditUseruserspermission" name="EditUseruserspermission" value="1">
                              <label class="form-check-label" for="EditUseruserspermission">Permiso de gestion de usuarios</label><br><br>
                              <button class="btn btn-secondary" type="button" onclick="editUserBtn()">Editar usuario</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Username</th>
                        <th>Permiso libros</th>
                        <th>Permiso categorias</th>
                        <th>Permiso usuarios</th>
                        <th class="align">Editar usuario</th>
                      </tr>
                    </thead>
                    <tbody id="userstable">
                    </tbody>
                  </table>
                </div>
              </div>
            <?php
            }
            ?>
          <div class="tab-pane fade" id="ajustespersonales" role="tabpanel" aria-labelledby="ajustespersonales-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">Ajustes</h1>
                  <!-- añadir poder añadir una foto personal -->
                  <h2>Ajustes personales</h2>
                </div>
                <div class="table-responsive">
 
                </div>
              </div>
          </div>
        </main>
        <div aria-live="polite" aria-atomic="true" class="position-relative"  data-bs-delay="10000" data-bs-autohide="true">
          <!-- Position it: -->
          <!-- - `.toast-container` for spacing between toasts -->
          <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
          <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
          <div class="toast-container position-absolute top-0 end-0 p-3">

            <!-- Then put toasts within -->
            <div id="UserDeletedError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Biblioteca virtual</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Error al eliminar el usuario
              </div>
            </div>

            <div id="UserDeletedSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Biblioteca virtual</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Usuario eliminado correctamente
              </div>
            </div>
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/admin.js"></script>
  </body>
</html>