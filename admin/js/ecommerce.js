$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response){
            llenaCarrito(response);
        }
    });
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenaTablaCarrito(response);
        }
    });
    function llenaTablaCarrito(response) {
        $("#tablaCarrito tbody").text("");
        var TOTAL = 0;
        response.forEach(element => {
            
        var precio = parseFloat(element['precio']);
        var totalProd = element['cantidad'] * element['precio'];
        TOTAL = TOTAL + totalProd;
        $("#tablaCarrito tbody").append(
            `
            <tr>
                <td><img src="${element['web_path']}" class="img-size-50"/></td>
                <td>${element['nombre']}</td>
                <td>
                
                ${element['cantidad']}
                <button type="button" class="btn-xs btn-primary mas"
                data-id="${element['id']}"
                data-tipo="mas"
                >+</button>
                <button type="button" class="btn-xs btn-danger menos"
                data-id="${element['id']}"
                data-tipo="menos"
                >-</button>
                </td>
                <td>$${precio.toLocaleString('es-CO')}</td>
                <td>$${totalProd.toLocaleString('es-CO')}</td>
                <td><i class="fa fa-trash text-danger borrarProducto" data-id="${element['id']}"></i></td>
            <tr>
            `
        );
        });
        $("#tablaCarrito tbody").append(
            `
            <tr>
            <td colspan="4" class="text-right"><strong>Total:</strong></td>
            <td>$${TOTAL.toLocaleString('es-CO')}</td>
            <td></td>
            <tr>
            `
        );
    }

    //aqui estoy haciendo lo de la pasarela
    
        $.ajax({
            type: "post",
            url: "ajax/leerCarrito.php",
            dataType: "json",
            success: function (response){
                llenaTablaPasarela(response);
            }
        });
        function llenaTablaPasarela(response) {
            $("#tablaPasarela tbody").text("");
            var TOTAL = 0;
            response.forEach(element => {
                
            var precio = parseFloat(element['precio']);
            var totalProd = element['cantidad'] * element['precio'];
            TOTAL = TOTAL + totalProd;
            $("#tablaPasarela tbody").append(
                `
                <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"/></td>
                    <td>${element['nombre']}</td>
                    <td>
                    
                    ${element['cantidad']}
                    
                    </td>
                    <td>$${precio.toLocaleString('es-CO')}</td>
                    <td>$${totalProd.toLocaleString('es-CO')}</td>
                    
                <tr>
                `
            );
            });
            $("#tablaPasarela tbody").append(
                `
                <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>$${TOTAL.toLocaleString('es-CO')}</td>
                <tr>
                `
            );
        }

    //aquí terminio lo de la pasarela 

    $(document).on("click", ".mas, .menos", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tipo = $(this).data('tipo');
        $.ajax({
            type: "post",
            url: "ajax/cambiaCantidadProductos.php",
            data: { "id": id, "tipo": tipo },
            dataType: "json",
            success: function (response) {
                llenaCarrito(response); 
                llenaTablaCarrito(response);
            }
        });
    });
    $(document).on("click", ".borrarProducto", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "ajax/borrarProductoCarrito.php",
            data: {"id": id},
            dataType: "json",
            success: function (response) {
                llenaCarrito(response); 
                llenaTablaCarrito(response);
            }
        });
    });
    
    $("#agregarCarrito").click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var web_path = $(this).data('web_path');
        var cantidad = $("#cantidadProductos").val();
        var precio = $(this).data('precio');

        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {"id":id,"nombre":nombre,"web_path":web_path,"cantidad":cantidad,"precio":precio},
            dataType: "json",
            success: function (response) {
                llenaCarrito(response);
                $("#badgeProducto").hide(500).show(500).hide(500).show(500).hide(500).show(500);
                $("#iconoCarrito").click();
            }
        });
    });

    function llenaCarrito(response) {
        var cantidad = Object.keys(response).length;
        if (cantidad > 0) {
            $("#badgeProducto").text(cantidad);
        } else {
            $("#badgeProducto").text("");
        }
        $("#listaCarrito").empty();
        response.forEach(element => {
            $("#listaCarrito").append(
                `
                <a href="index.php?modulo=detalleProducto&id=${element['id']}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="${element['web_path']}" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                ${element['nombre']}
                                <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                            </h3>
                            <p class="text-sm">Cantidad ${element['cantidad']}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                `
            );
        });
        $("#listaCarrito").append(
            `
            <a href="index.php?modulo=carrito" class="dropdown-item dropdown-footer text-primary">
                Ver carrito 
                <i class="fa fa-cart-plus"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito">
                Borrar carrito 
                <i class="fa fa-trash"></i>
            </a>
            `
        );
    }

    $(document).on("click","#borrarCarrito",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function (response) {
                llenaCarrito(response);
            }
        });
    });
    var nombreRec = $("#nombreRec").val();
    var emailRec = $("#emailRec").val();
    var direccionRec = $("#direccionRec").val();
    $("#tomar").click(function(e){
        var nombreCli = $("#nombreCli").val();
        var emailCli = $("#emailCli").val();
        var direccionCli = $("#direccionCli").val();

        if( $(this).prop("checked")==true ){
            $("#nombreRec").val(nombreCli);
            $("#emailRec").val(emailCli);
            $("#direccionRec").val(direccionCli);
        }else{
            $("#nombreRec").val(nombreRec);
            $("#emailRec").val(emailRec);
            $("#direccionRec").val(direccionRec);
        }
    });
});
