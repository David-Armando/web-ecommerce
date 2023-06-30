<?php
$baseUrl = 'http://localhost/eccomerce';
?>

<h1>Formulario de pago</h1>

<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
    
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="vendedor@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <label for="item_name" class="form-label">item_name</label>
    <input type="text" name="item_name" id="" value="Lampara de escritorio" required=""><br>

    <label for="amount" class="form-label">amount</label>
    <input type="text" name="amount" id="" value="13.00" required=""><br>

    <input type="hidden" name="currency_code" value="EUR">

    <label for="quantity" class="form-label">quantity</label>
    <input type="text" name="quantity" id="" value="2" required=""><br>

    <!-- Valores opcionales -->
    <!-- En el siguiente enlace puedes encontrar una lista completa de Variables HTML para pagos estándar de PayPal. -->
    <!-- https://developer.paypal.com/docs/paypal-payments-standard/integration-guide/Appx-websitestandard-htmlvariables/ -->

    <input type="hidden" name="item_number" value="1">
    <!-- <input type="hidden" name="invoice" value="0012"> -->

    <input type="hidden" name="lc" value="es_ES">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="image_url" value="https://picsum.photos/150/150">
    <input type="hidden" name="return" value="<?= $baseUrl ?>/receptor.php">
    <input type="hidden" name="cancel_return" value="<?= $baseUrl ?>/pago_cancelado.php">

    <hr>
    <div class="mt-3">
        <h4>Terminos y condiciones</h4>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, vitae porro? Fugiat, obcaecati aliquam vel beatae dignissimos ad amet aspernatur recusandae nihil, rem, laboriosam vero quod explicabo totam voluptatibus tempora!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, vitae porro? Fugiat, obcaecati aliquam vel beatae dignissimos ad amet aspernatur recusandae nihil, rem, laboriosam vero quod explicabo totam voluptatibus tempora!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, vitae porro? Fugiat, obcaecati aliquam vel beatae dignissimos ad amet aspernatur recusandae nihil, rem, laboriosam vero quod explicabo totam voluptatibus tempora!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, vitae porro? Fugiat, obcaecati aliquam vel beatae dignissimos ad amet aspernatur recusandae nihil, rem, laboriosam vero quod explicabo totam voluptatibus tempora!
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="">
          <label class="form-check-label" for="">
            Acepto los terminos subliminales
          </label>
        </div>
    </div>

    <div class="mt-3">
        <a class="btn btn-warning" href="index.php?modulo=envio" role="button">Ir a envio</a>
        <button type="submit" class="btn btn-primary btn-paypal float-right">
        <i class="fab fa-paypal mr-2"></i>Pagar ahora con PayPal! </button>
    </div>


</form>
<?php
// var_dump($_POST);