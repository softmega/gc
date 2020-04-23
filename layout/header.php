 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Usuario -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
           <h6 style="color:navy"><strong>Usuario Full Admin</strong></h6>
        </a>
      </li>
      <!--<div class="media">
            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
      </div>-->
      
      <!-- Boton Salir -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
      <img src="images/logo_lleuques.jpg" alt="" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">LLEUQUES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->        
          <li class="nav-header">PROPIEDADES</li>
          <li class="nav-item">
            <a href="edificio.php" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>Edificio</p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview"">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Departamentos
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unidades</p>
                </a>
              </li>
              </ul>
          </li> -->
          <li class="nav-item">
                <a href="departamentos.php" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Departamentos</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="unidades.php" class="nav-link">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>Unidades</p>
                </a>
          </li>

          <li class="nav-item">
            <a href="propietarios.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Propietarios / Usuarios
              </p>
            </a>
          </li>
        
          <li class="nav-header">EGRESOS</li>
          <li class="nav-item">
            <a href="gastos.php" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Gastos / Remuneraciones
              </p>
            </a>
          </li>
  
          <li class="nav-header">INGRESOS</li>
          <li class="nav-item">
            <a href="pagos.php" class="nav-link">
              <i class="nav-icon fas fa-piggy-bank"></i>
              <p>Pagos</p>
            </a>
          </li>
		  
          <li class="nav-header">GESTION</li>
          <li class="nav-item">
            <a href="historicoGastos.php" class="nav-link">
              <i class="fas fa-expand-arrows-alt nav-icon"></i>
              <p>Historico Gastos Comunes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="controlMorosos.php" class="nav-link">
              <i class="nav-icon far fa-thumbs-down"></i>
              <p>
                Control Morosos
               
              </p>
            </a>
            </li>
              
          <li class="nav-header">PARAMETROS</li>
          <!-- <li class="nav-item"">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Parametros
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span> 
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="tiposUnidades.php" class="nav-link">
                  <i class="fab fa-pied-piper nav-icon"></i>
                  <p>Tipos de Unidades</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="tiposGastos.php" class="nav-link">
                  <i class="fas fa-rocket nav-icon"></i>
                  <p>Tipos de Gasto</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="tiposPago.php" class="nav-link">
                  <i class="fab fa-bitcoin nav-icon"></i>
                  <p>Formas de Pago</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="MesProceso.php" class="nav-link">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Mes/Año de Proceso</p>
                </a>
              </li>
               <!-- </ul> -->
          <!-- </li>  -->
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>