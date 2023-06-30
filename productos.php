<div class="row mt-1">
    <?php
    // include_once "admin/db_eccomerce.php";
    // $conn = mysqli_connect($servername, $username, $password, $dbname);
    $where = "WHERE 1 = 1";
    $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre'] ?? '');
    if (!empty($nombre)) {
        $where .= " AND P.name LIKE '%" . $nombre . "%'";
    }

    $queryCuenta = "SELECT COUNT(*) as cuenta FROM products as P
                    INNER JOIN products_files as PF ON PF.products_id = P.id
                    INNER JOIN files as F ON F.id = PF.file_id
                    $where";
    $resCuenta = mysqli_query($conn, $queryCuenta);
    $rowCuenta = mysqli_fetch_assoc($resCuenta);
    $totalRegistros = $rowCuenta['cuenta'];

    $elementosPorPagina = 12;

    $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

    $paginaSelec = isset($_REQUEST['pagina']) ? intval($_REQUEST['pagina']) : 1;

    if ($paginaSelec == false) {
        $inicioLimite = 0;
        $paginaSelec = 1;
    } else {
        $inicioLimite = ($paginaSelec - 1) * $elementosPorPagina;
    }

    $limite = "LIMIT $inicioLimite, $elementosPorPagina";

    $query = "SELECT
                P.id,
                P.name,
                P.price,
                P.existence,
                F.web_path
                FROM
                products as P
                INNER JOIN products_files as PF 
                ON PF.products_id = P.id
                INNER JOIN files as F 
                ON F.id = PF.file_id
                $where
                GROUP BY P.id
                $limite";
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($res)) {
    ?>
        <div class="col-lg-2 col-md-4 col-sm-12 mb-4 ">
            <div class="card border-primary h-100">
                <div class="card-img-container">
                    <img class="card-img-top" src="<?php echo $row['web_path'] ?>" alt="Title">
                </div>
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title"><strong><?php echo $row['name'] ?></strong></h4>
                    <p class="card-text"><strong>Precio:</strong> <?php echo $row['price'] ?></p>
                    <p class="card-text"><strong>Existencia:</strong> <?php echo $row['existence'] ?></p>
                    <div class="mt-auto"></div>
                    <a href="index.php?modulo=detalleProducto&id=<?php echo $row['id'] ?>" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
if ($totalPaginas > 0) {
?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            if ($paginaSelec != 1) {
            ?>
                <li class="page-item enabled">
                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $paginaSelec - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php
            }
            ?>

            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {

            ?>
                <li class="page-item <?php echo ($paginaSelec == $i) ? "active" : ""; ?>">
                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($paginaSelec != $totalPaginas) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSelec + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
<?php
}
?>
