<?php

include_once "db_eccomerce.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
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
                        <table id="tablaProductos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Existencia</th>
                                    <th>Imagenes</th>
                                </tr>
                            </thead>
                            <!-- <tbody>

                                <?php
                                include_once "db_eccomerce.php";
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                $query = "SELECT id,name,price,existence FROM products ";
                                $res = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>

                                    <tr>
                                        <td> <?php echo $row['name'] ?></td>
                                        <td> <?php echo $row['price'] ?> </td>
                                        <td> <?php echo $row['existence'] ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody> -->

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