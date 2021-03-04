<!DOCTYPE html>
<!--https://www.studentstutorial.com/php/login-logout-with-session -->
<!--Libro bien subido o mal usar toasts https://getbootstrap.com/docs/5.0/components/toasts/ -->
<!--Las ayudas con tooltip https://getbootstrap.com/docs/5.0/components/tooltips/ -->
<!--Para editar los libros? https://getbootstrap.com/docs/5.0/components/modal/ -->
<!--Editar los libros? con onchange-->
<!-- https://getbootstrap.com/docs/5.0/forms/overview/ -->
<!-- https://getbootstrap.com/docs/5.0/examples/dashboard/ -->
<?php
  session_start();
  if (!(isset($_SESSION['ID']))) {
    Header('Location:admin/login.php');
  }
?>
<html>
  <head>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <meta charset="UTF-8">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Biblioteca Virtual</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="admin/logout.php">Log out</a>
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
                <button class="nav-link active" type="button" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Panel de control</button>
              </li>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#books">
                  <span data-feather="books"></span>
                  Gestionar libros
                </a>-->
                <button class="nav-link" type="button" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" role="tab" aria-controls="books" aria-selected="false">Gestionar libros</button>
              </li>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#categories">
                  <span data-feather="categories"></span>
                  Gestionar categorias
                </a>-->
                <button class="nav-link" type="button" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories" role="tab" aria-controls="categories" aria-selected="false">Gestionar categorias</button>
              </li>
              <li class="nav-item" role="presentation">
                <!--<a class="nav-link" data-toggle="tab" href="#users">
                  <span data-feather="users"></span>
                  Gestionar usuarios
                </a>-->
                <button class="nav-link" type="button" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" role="tab" aria-controls="users" aria-selected="false">Gestionar usuarios</button>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="tab-content">
            <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Panel de control</h1>
            </div>
            <h2>Ultima actividad</h2>
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
                <tbody>
                  <tr>
                    <td>0</td>
                    <td>Instalacion de la web</td>
                    <td>Admin</td>
                    <td>14:40 02/03/2021</td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
            <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
            </div>
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            </div>
            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
            </div>
          </div>
        </main>

      </div>
    </div> 
  </body>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.bundle.min.js"></script> 
</html>