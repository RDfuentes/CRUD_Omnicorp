<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>OMNICORP</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- Plugins para js 
    -> darle forma a un objeto 
    -> cargar paginas 
    -> hacer paginas mas interactivas
    -> banners -->
    
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">
    <script src="plugins/jspdf/jspdf.min.js"></script>
    <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>

          <?php if(isset($_GET["view"]) && $_GET["view"]=="sell"):?>
            <script type="text/javascript" src="plugins/jsqrcode/llqrcode.js"></script>
            <script type="text/javascript" src="plugins/jsqrcode/webqr.js"></script>
          <?php endif;?>

  </head>

  <body 
  class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>  skin-blue-light sidebar-mini <?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
      
      <!-- funcion que hace posible el responsive y diseño -->
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>OC</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>OMNICORP</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name; 

                  }?> <b class="caret"></b> </span>

                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-danger btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">PANEL DE CONTROL</li>
            <?php if(isset($_SESSION["user_id"])):?>
            
            <li><a href="./index.php?view=home"><i class='fa fa-home'></i> <span>Inicio</span></a></li>

            <li class="treeview">
              <a href="./?view=direcciones"><i class='fa fa-external-link-square'></i> <span>Lugares de envio</span></a>
            </li>
            <li class="treeview">
              <a href="./?view=fabricas"><i class='fa fa-cubes'></i> <span>Fabricas</span></a>
            </li>
            <li class="treeview">
              <a href="./?view=clientes"><i class='fa fa-user'></i> <span>Clientes</span></a>
            </li>
            <li class="treeview">
              <a href="./?view=articulos"><i class='fa fa-gift'></i> <span>Articulos</span></a>
            </li>
            <li class="treeview">
              <a href="./?view=compras"><i class='fa fa-calendar'></i> <span>Compras</span></a>
            </li>
            <li class="treeview">
              <a href="./?view=users"><i class='fa fa-users'></i> <span>Usuarios</span></a>
            </li>

            
          <?php endif;?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>



      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
      <div class="content-wrapper">
      <div class="content">
        <?php View::load("index");?>
        </div>
      </div><!-- /.content-wrapper -->
      <?php else:?>



<!-- CODIGO PARA CARGAR Y DISEÑAR EL LOGIN --> 
<div class="login-box">
      <div class="login-logo">
        <a href="./"><b>OMNICORP</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Contraseña"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
      <?php endif;?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
  </body>
</html>

