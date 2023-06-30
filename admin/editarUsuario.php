<!-- Content Wrapper. Contains page content -->
<?php
include_once "db_eccomerce.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_REQUEST['guardar'])) {

    $email = mysqli_real_escape_string($conn, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($conn, $_REQUEST['pass'] ?? ''));
    $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre'] ?? '');
    $id = mysqli_real_escape_string($conn, $_REQUEST['id'] ?? '');

    $query = "UPDATE users SET email = '".$email."', pass = '".$pass."', nombre = '".$nombre."'
    
    WHERE id = '".$id."'";

    $res = mysqli_query($conn, $query);

    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' modificado exitosamente "/>';
    } else {
?>

        <div class="alert alert-danger" name="alert"></div>
        Error al crear usuario <?php echo mysqli_error($conn); ?>
<?php }
}
?>

<?php

$id = mysqli_real_escape_string($conn,$_REQUEST['id']??'');
$query = "SELECT id, email, pass, nombre FROM users WHERE id = '".$id."'; ";
$res = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($res);
?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear usuarios</h1>
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
                        <form action="editarUsuario.php" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']  ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="nombre" name="nombre" class="form-control" value="<?php echo $row['nombre']  ?>" required="required">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                            </div>
                        </form>
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