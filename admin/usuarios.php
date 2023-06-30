<?php

include_once "db_eccomerce.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($conn, $_REQUEST['idBorrar'] ?? '');
    $query = "DELETE FROM users WHERE id='" . $id . "'";
    $res = mysqli_query($conn, $query);

    if ($res) { ?>
        <div class="alert alert-warning float-right" role="alert">
            Usuario borrado con exito
        </div>
    <?php } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php mysqli_error($conn);  ?>
        </div>
<?php  }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones
                                        <a href="panel.php?modulo=crearUsuarios"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include_once "db_eccomerce.php";
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                $query = "SELECT id,email,nombre FROM users ";
                                $res = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>

                                    <tr>
                                        <td> <?php echo $row['nombre'] ?></td>
                                        <td> <?php echo $row['email'] ?> </td>
                                        <td>

                                            <a href="panel.php?modulo=editarUsuario&id= <?php echo $row['id'] ?>" style="margin: right 10px;"> <i class="fas fa-edit"></i></a>
                                            <a href="panel.php?modulo=usuarios&idBorrar= <?php echo $row['id'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->