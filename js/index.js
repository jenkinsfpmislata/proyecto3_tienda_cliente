// Js de productos Modifica para Productos

//cargamos categorias y el modal del insert product
$(document).ready(function() {

    categorias();

});

function categorias() {
    $.ajax({
        dataType: 'json',
        url: 'categorias.php',
        success: function(data) {
            datos = '';
            $.each(data, function(index) {
                datos += '<li><a class="list-group-item" href="javascript:articulos(\'' + data[index].id_categoria + '\', \'' + data[index].nombre + '\')">' + data[index].nombre + '</a></li>';
            });
            datos += '</ul>';
            $('#panel-element-305610').html(datos);
        }
    });
}

function articulos(id_categoria, nombre) {

    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'articulos_categorias.php?id_categoria=' + id_categoria,
        success: function(data) {

            datos = '';
            $.each(data, function(index) {
                datos += '<div class="col-sm-4 col-lg-4 col-md-4"><div id="' + data[index].id_producto + '"class="thumbnail"><img src="img/' + data[index].id_producto + '.jpg" alt=""><div class="caption"><h4 class="pull-right">' + data[index].precio + '&#8364;</h4> <h4><a href="#">' + data[index].nombre + '</a></h4><p>' + data[index].descripcion + '</p><div align="center"><button type="button" class="btn btn-default" onClick="anyade(' + data[index].id_producto + ')">A&ntilde;adir  <i class="glyphicon glyphicon-shopping-cart"></i></button></div></div><div class="ratings"><p class="pull-right">12 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p></div></div></div>';
            });
            datos += '';
            $('#container_productos.row').html(datos);
        }
    });
    $.ajax({
        dataType: 'json',
        url: 'articulos_categorias.php?id_categoria=' + id_categoria,
        type: 'GET',
        success: function(data) {

            datos = '<div class="col-md-12 ">';
            datos += '<div>'
            datos += '<ol class="breadcrumb">';
            datos += '<li>';
            datos += '<a href="index.html">Home</a><span class="divider"></span>';
            datos += '</li>'
            datos += '<li class="active">' + nombre + '</li>'
            datos += '</ol>';
            datos += '</div>';
            datos += '</div>';


            $('#breadcum').html(datos);
        }
    });
}
var id_usuario = 1;
function myAccount() {
    datosform=$("#formLogin").serialize();
    $.ajax({
        dataType: 'json',
        url: 'usuarios.php',
        type: 'POST',
        data:datosform,
        success: function(data) {
            datos = '';
            $.each(data, function(index) {
                datos += '<div class="panel mipanel-default"><div class="panel-heading"><a class="mipanel-default collapsed glyphicon glyphicon-user" data-toggle="collapse" data-parent="#" href="#" onclick="javascript:showMyAccount()"> My Account (' + data[index].id_usuario + ')</a></div><div id="" class="list-group panel-collapse collapse"><a href="#" class="list-group-item ">&nbsp;  Categories</a></div></div>';
            });
            datos += '<br>';
            datos += '';
            $('#myAccount').html(datos);
            carrito.idCliente = data[0].id_usuario
            
            datos2 = '';
            $.each(data, function(index) {
                datos2 = '<div id="myAccountShow"><div class="col-md-4 form "><form>';
                datos2 += '<h2>My Account</h2><hr>'
                datos2 += 'Nombre:<input type="text" class="form-control" placeholder="' + data[index].nombre + '" name="nombre">'
                datos2 += 'Apellidos: <input type="text" class="form-control" placeholder="' + data[index].apellidos + '" name="apellidos">'
                datos2 += 'Mail: <input type="text"class="form-control"  placeholder="' + data[index].mail + '" name="mail">'
                datos2 += 'Ciudad de residencia: <input type="text" class="form-control" placeholder="' + data[index].ciudad + '" name="ciudad">'
                datos2 += '</form></div></div>'
            });
            datos2 += '<br>';
            datos2 += '';
            $('#breadcum').html(datos2);
            
            
        }
    });
}
function showMyAccount(id_usuario) {
    $.ajax({
        dataType: 'json',
        url: 'usuarios.php?id_usuario='+id_usuario,
        type: 'POST',
        success: function(data) {
            datos2 = '';
            $.each(data, function(index) {
                datos2 = '<div class="col-md-4 form "><form>';
                datos2 += '<h2>My Account</h2><hr>'
                datos2 += 'Nombre:<input type="text" class="form-control" placeholder="'+data[index].nombre+'" name="nombre">'
                datos2 += 'Apellidos: <input type="text" class="form-control" placeholder="'+data[index].apellidos+'" name="apellidos">'
                datos2 += 'Mail: <input type="text"class="form-control"  placeholder="'+data[index].mail+'" name="mail">'
                datos2 += 'Ciudad de residencia: <input type="text" class="form-control" placeholder="'+data[index].ciudad+'" name="ciudad">'
                datos2 += '</form></div>'
            });
            datos2 += '<br>';
            datos2 += '';
            $('#breadcum').html(datos2);
        }
    });
    $.ajax({
        dataType: 'json',
        url: 'usuarios.php?id_usuario=3',
        type: 'GET',
        success: function(data) {
            datos = '<a href="#" class="glyphicon glyphicon-log-out" data-toggle="dropdown" onClick="javascript:reload()"> Logout</a>';
            $('#container_productos').html(datos);
            $('#login').html(datos);
            
            
        }
    });
}
function reload(){
    location.reload();
}