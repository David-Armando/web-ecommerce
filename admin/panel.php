<!DOCTYPE html>
<html>
<?php
session_start();
session_regenerate_id(true);

if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar")
{
  session_destroy();
  header("location: index.php");
}

if (isset($_SESSION['id']) == false) {
  header("location: index.php");
}
// var_dump($_REQUEST['modulo']);
// die();
$modulo = $_REQUEST['modulo'] ?? '';
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tech zone</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->


  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

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
        <!-- Messages Dropdown Menu -->

        <a class="nav-link" href="panel.php?modulo=editarUsuario&id=<?php  echo $_SESSION['id'] ?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link text-danger" href="panel.php?modulo=&sesion=cerrar" title="Cerrar sesión">
          <i class="fas fa-door-closed"></i>
        </a>



      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/techzone_fondo_negro.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TechZone</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
          <div class="info">
            <a href="#" class="d-block"> <?php echo $_SESSION['nombre']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fa fa-shopping-cart nav-icon"></i>
                <p>
                  Eccomerce
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="panel.php?modulo=estadisticas" class="nav-link<?php echo ($modulo == 'estadisticas' || $modulo == '') ? " active " : " ";  ?> ">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=usuarios" class="nav-link<?php echo ($modulo == 'usuarios' || $modulo == 'crearUsuarios' || $modulo == 'editarUsuario') ? " active " : " ";  ?> ">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=productos" class="nav-link<?php echo ($modulo == 'productos') ? " active " : " ";  ?> ">
                    <i class="fa fa-shopping-bag nav-icon"></i>
                    <p>Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=ventas" class="nav-link<?php echo ($modulo == 'ventas') ? " active " : " ";  ?> ">
                    <i class="fa fa-table nav-icon"></i>
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <?php

    if (isset($_REQUEST['mensaje'])) { ?>

      <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje']; ?>
      </div>

    <?php }

    if ($modulo == 'estadisticas' || $modulo == "") {
      include_once "estadisticas.php";
    }
    if ($modulo == 'usuarios') {
      include_once "usuarios.php";
    }
    if ($modulo == 'productos') {
      include_once "productos.php";
    }
    if ($modulo == 'ventas') {
      include_once "ventas.php";
    }
    if ($modulo == 'crearUsuarios') {
      include_once "crearUsuarios.php";
    }
    if ($modulo == 'editarUsuario') {
      include_once "editarUsuario.php";
    }
    ?>

    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.1
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->

  

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    <script src="js/dataTables.editor.min.js"></script>
  <!-- <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
  <script>
    $(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });

      editor = new $.fn.dataTable.Editor( {
        ajax: "controllers/productos.php",
        table: "#tablaProductos",
        fields: [ {
                label: "Nombre:",
                name: "name"
            }, {
                label: "Precio:",
                name: "price"
            }, {
                label: "Existencia:",
                name: "existence"
            }, {
                label: "Imagenes:",
                name: "files[].id",
                type: "uploadMany",
                display: function ( fileId, counter ) {
                    return '<img src="'+editor.file( 'files', fileId ).web_path+'"/>';
                },
                noFileText: 'No hay imagenes'
            }
        ]
    } );
 
    $('#tablaProductos').DataTable( {
        dom: "Bfrtip",
        ajax: "controllers/productos.php",
        columns: [
            { data: "name" },
            { data: "price", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
            { data: "existence" },
            {
                data: "files",
                render: function ( d ) {
                    return d.length ?
                        d.length+' imagen(es)' :
                        'No hay imagenes';
                },
                title: "Imagen"
            }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
            
        ]
    } );

    });
  </script>

  <script>
    $(document).ready(function(){
      $('.borrar').click(function(e){
        e.preventDefault();
        var res=confirm("Realmente quieres borrar al usuario?");
        if(res==true)
        {
          var link=$(this).attr("href");
          window.location=link;
        }
      })

    });

    </script>

</body>

</html>