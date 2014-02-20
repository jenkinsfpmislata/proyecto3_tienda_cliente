// Js de productos Modifica para Productos

//cargamos categorias y el modal del insert product
$(document).ready(function() {
    //esconde modales
    $("#dialog").css('visibility', 'hidden');
    $("#dialog_modify").css('visibility', 'hidden');
    pedidos();
    insert();
});

//load products
function pedidos() {
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'pedidos.php' ,
        success: function(data) {
            datos = '<thead><tr><th>ID_Order</th><th>ID_Client</th><th>Status</th><th>Price</th><th></th></tr></thead><tbody>';
            $.each(data, function(index) {
                datos += '<tr><td>' + data[index].id_pedido + '</td><td>' + data[index].id_usuario + '</td><td>' + data[index].estado_envio + '</td><td>' + data[index].precio_pedido + '</td><td><a href="javascript:button_modify(' + data[index].id_pedido + ')" ><i class="icon-edit"></i></a></td></tr>';
            });
            datos += '</tbody></table></div>';
            $('#dataTable').html(datos);
        }
    });
}
function insert(){
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
                        url: 'pedido_nuevo.php',
                        type: 'POST',
                        data: datos,
                        success: function(data) {
                            pedidos();
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
}
//update product: needed to do a function for modal hidden
function button_modify(id_pedido) {
    
    $("#dialog_modify").css('visibility', 'visible');
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'pedido_modificar.php?id_pedido=' + id_pedido,
        success: function(data) {
            $.each(data, function(index) {
                $("#id_pedido").val(data[index].id_pedido);
                $("#id_usuario").val(data[index].id_usuario);
                $("#estado_envio").val(data[index].estado_envio);
                $("#precio_pedido").val(data[index].precio_pedido);
                datos = data[index].id_pedido + data[index].id_usuario + data[index].estado_envio + data[index].precio_pedido;
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
                    url: 'pedido_guardar.php',
                    type: 'POST',
                    data: datos,
                    success: function(data) {
                        pedidos();
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
