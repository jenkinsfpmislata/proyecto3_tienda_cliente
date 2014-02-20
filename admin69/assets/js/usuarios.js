// Js de productos Modifica para Productos
//cargamos categorias y el modal del insert product
$(document).ready(function() {
    //esconde modales
    $("#dialog").css('visibility', 'hidden');
    $("#dialog_modify").css('visibility', 'hidden');
    usuarios();
    insert();
});
function insert(){
    jQuery("#form_insert").click(function() {
        $("#dialog").css('visibility', 'visible');
        $("#dialog").dialog({
            modal: true,
            title: "Usuario nuevo",
            show: "blind",
            hide: "show",
            buttons: {
                'Save': function() {
                    var datos = $("#new_product_data").serialize();
                    $.ajax({
                        dataType: 'json',
                        url: 'usuario_nuevo.php',
                        type: 'POST',
                        data: datos,
                        success: function(data) {
                            
                            usuarios();
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
//load products
function usuarios() {
    
    $.ajax({
        dataType: 'json',
        url: 'usuarios.php',
        success: function(data) {
            datos = '<thead><tr><th>ID_User</th><th>Name</th><th>Surname</th><th>e-mail</th><th></th><th></th></tr></thead><tbody>';
            $.each(data, function(index) {
                datos += '<tr><td>' + data[index].id_usuario + '</td><td>' + data[index].nombre + '</td><td>' + data[index].apellidos + '</td><td>' + data[index].mail + '</td><td><a href="javascript:button_modify(' + data[index].id_usuario + ')" ><i class="icon-edit"></i></a></td><td><a href="javascript:usuario_borrar(' + data[index].id_usuario + ')"><i class="icon-remove"></i></a></td></tr>';
            });
            datos += '</tbody></table></div>';
            $('#dataTable').html(datos);
        }
    });
}
//update product: needed to do a function for modal hidden
function button_modify(id_usuario) {
    $("#dialog_modify").css('visibility', 'visible');
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'usuario_modificar.php?id_usuario=' + id_usuario,
        success: function(data) {

            $.each(data, function(index) {
                $("#id_usuario").val(data[index].id_usuario);
                $("#nombre").val(data[index].nombre);
                $("#apellidos").val(data[index].apellidos);
                $("#password").val(data[index].password);
                $("#mail").val(data[index].mail);
                $("#codigo_postal").val(data[index].codigo_postal);
                $("#direccion").val(data[index].direccion);
                $("#ciudad").val(data[index].ciudad);
                $("#provincia").val(data[index].provincia);
                datos = data[index].id_usuario + data[index].nombre + data[index].apellidos + data[index].password + data[index].mail + data[index].codigo_postal + data[index].direccion + data[index].ciudad + data[index].provincia;
            });
        }
    });
    $("#dialog_modify").dialog({
        modal: true,
        title: "Modificar Usuario",
        show: "blind",
        hide: "show",
        buttons: {
            'Save': function() {
                var datos = $("#modify_product_data").serialize();
                $.ajax({
                    //dataType: 'json',
                    url: 'usuario_guardar.php',
                    type: 'POST',
                    data: datos,
                    success: function(data) {
                       
                        usuarios();
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
//delete user
function usuario_borrar(id_usuario) {
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'usuario_borrar.php?id_usuario=' + id_usuario,
        data: datos,
        success: function(data) {
            usuarios(data);
        }
    });
}