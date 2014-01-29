// Js de productos Modifica para Productos

//cargamos categorias y el modal del insert product
$(document).ready(function() {
    todos_articulos()
    //carga las categorias en articulos-nav
    $.ajax({
        dataType: 'json',
        url: 'categorias.php',
        success: function(data) {
            datos = '';
            $.each(data, function(index) {
                datos += '<li><a href="javascript:articulos(\'' + data[index].id_categoria + '\', \'' + data[index].nombre + '\')">' + data[index].nombre + '</a></li>';
            });
            datos += '</ul>';
            $('#articulos-nav').html(datos);
        }
    });
    jQuery("#form_insert").click(function() {
        $("#dialog").css('visibility', 'visible');
        $("#dialog").dialog({
            modal: true,
            title: "Producto nuevo",
            show: "blind",
            hide: "show",
            buttons: {
                'Save': function() {
                    var datos = $("#new_product_data").serialize();
                    $.ajax({
                        dataType: 'json',
                        url: 'articulo_nuevo.php',
                        type: 'POST',
                        data: datos,
                        success: function(data) {
                            articulos(data);
                        }
                    });
                    $(this).dialog('close');
                    $("#collapse4").trigger("reloadGrid");
                },
                'Exit': function() {
                    //hacemos lo que se quiera y cerramos el dialog
                    $(this).dialog('close');
                }
            }
        });
    });
    $("#dialog").css('visibility', 'hidden');
    $("#dialog_modify").css('visibility', 'hidden');
});
function todos_articulos(){
    alert("articuloooos");
    //carga todos los productos en datatable
    $.ajax({
        dataType: 'json',
        url: 'articulos.php',
        success: function(data) {
            alert("vuelta articulos");
            datos = '<thead><tr><th>ID_Producto</th><th>Nombre</th><th>Precio</th><th>Vista Previa</th></tr></thead><tbody>';
            $.each(data, function(index) {
                datos += '<tr><td>' + data[index].id_producto + '</td><td>' + data[index].nombre + '</td><td>' + data[index].precio + '</td><td><img src=./assets/img/' + data[index].id_producto + '.jpg' + '></td><td><a href="javascript:button_modify(' + data[index].id_producto + ')" id="form_insert"><i class="icon-edit"></i></a></td><td><a href="javascript:articulo_borrar(' + data[index].id_producto + ',' + data[index].id_categoria + ')"><i class="icon-remove"></i></a></td></tr>';
            });
            datos += '</tbody></table></div>';
            $('#dataTable').html(datos);
        }    
    });
    alert("pasa algo?");
}
//load products
function articulos(id_categoria, nombre) {
    //alert("Pulsado " + categoria);
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'articulos_categorias.php?id_categoria=' + id_categoria,
        success: function(data) {
            datos = '<thead><tr><th>ID_Producto</th><th>Nombre</th><th>Precio</th><th>Vista Previa</th></tr></thead><tbody>';
            $.each(data, function(index) {
                datos += '<tr><td>' + data[index].id_producto + '</td><td>' + data[index].nombre + '</td><td>' + data[index].precio + '</td><td><img src=./assets/img/' + data[index].id_producto + '.jpg' + '></td><td><a href="javascript:button_modify(' + data[index].id_producto + ')" id="form_insert"><i class="icon-edit"></i></a></td><td><a href="javascript:articulo_borrar(' + data[index].id_producto + ',' + data[index].id_categoria + ')"><i class="icon-remove"></i></a></td></tr>';
            });
            datos += '</tbody></table></div>';
            $('#dataTable').html(datos);
        }
    });
}
//update product: needed to do a function for modal hidden
function button_modify(id_producto) {
    $("#dialog_modify").css('visibility', 'visible');

    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'articulo_modificar.php?id_producto=' + id_producto,
        success: function(data) {
            $.each(data, function(index) {
                $("#id_producto").val(data[index].id_producto);
                $("#nombre").val(data[index].nombre);
                $("#descripcion").val(data[index].descripcion);
                $("#precio").val(data[index].precio);
                $("#id_categoria").val(data[index].id_categoria);
                $("#tipo_producto").val(data[index].tipo_producto);
                datos = data[index].id + data[index].nombre + data[index].precio;
            });
        }
    });
    $("#dialog_modify").dialog({
        modal: true,
        title: "Modificar Producto",
        show: "blind",
        hide: "show",
        buttons: {
            'Save': function() {
                var datos = $("#modify_product_data").serialize();
                $.ajax({
                    dataType: 'json',
                    url: 'articulo_guardar.php',
                    type: 'POST',
                    data: datos,
                    success: function(data) {
                        articulos(data);
                    }
                });
                $(this).dialog('close');
                $("#collapse4").trigger("reloadGrid");
            },
            'Exit': function() {
                //hacemos lo que se quiera y cerramos el dialog
                $(this).dialog('close');
            }
        }
    });
}

//delete product
function articulo_borrar(id_producto, id_categoria) {
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'articulo_borrar.php?id_producto=' + id_producto + '&id_categoria=' + id_categoria,
        data: datos,
        success: function(data) {
            articulos(data);
        }
    });
}