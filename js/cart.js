function carrito(nombre) {
            this.nombre = nombre;
            this.fecha = new Date();
            this.idCliente = 0;
            this.totalProductos = 0;
            this.totalPrecio = 0;
            this.listaProductos = [];
            this.cuenta;
        }
        carrito.prototype.cambiarCuenta= function(cuenta){
            this.cuenta = cuenta;
        }
        carrito.prototype.insertar = function(articulo) {
            existe = false;
            
            
            for (i = 0; i < this.listaProductos.length; i++) {
               
               if(articulo.id == this.listaProductos[i].id){
                   existe = true;
                   this.listaProductos[i].unidades++;
                   this.listaProductos[i].total = parseInt(this.listaProductos[i].unidades) *  parseInt(this.listaProductos[i].precio);
                   
               }
            }
            if(existe==false){
                this.listaProductos[this.listaProductos.length] = articulo;
            
            }
            
           carrito.totalProductos++;
            this.totalPrecio += parseInt(articulo.precio);
            
            document.getElementById("numeroCarrito1").firstChild.nodeValue = carrito.totalProductos;
            document.getElementById("numeroCarrito2").firstChild.nodeValue = carrito.totalProductos;
            this.verArticulos();
        }
        carrito.prototype.actualizar= function(){
            totalprecio = 0;
            totalproducto = 0;
            
            for (i = 0; i < this.listaProductos.length; i++) {
                  totalprecio = totalprecio+parseInt(this.listaProductos[i].total);
                  totalproducto = totalproducto+parseInt(this.listaProductos[i].unidades);
            
            }
            
            this.totalPrecio = totalprecio;
            this.totalProductos = totalproducto;
            document.getElementById("numeroCarrito1").firstChild.nodeValue = totalproducto
;           document.getElementById("numeroCarrito2").firstChild.nodeValue = totalproducto;
            this.verArticulos();
            
        }
        carrito.prototype.sumarUnidad = function(id){
            
        }
        carrito.prototype.verArticulos = function() {
            
            libros = "PEDIDO";
            
            libros += "\n Fecha: "+ this.fecha + "Total Productos: "+ this.totalProductos +
                    "Total Precio: "+ this.totalPrecio;
            
            
            libros += "\n ARTUCULOS DE MI CARRITO";
            for (i = 0; i < this.listaProductos.length; i++) {
                ruta = this.listaProductos[i].nombre;
                precio = this.listaProductos[i].nombre;
                nombre = this.listaProductos[i].nombre;
                unidades = this.listaProductos[i].unidades;
                precio = this.listaProductos[i].precio;
                total = this.listaProductos[i].total;
                libros += "\n Precio: " + precio + " Unidades: " + unidades + " Total: " + total;

            }

            //alert(libros);
            

        }
        function articulo(id) {
            this.id = id;

            capaArticulo = document.getElementById(id);
            imagen = capaArticulo.getElementsByTagName("img")[0];
            rutaImagen = imagen.src;
            capaDescripcion = capaArticulo.getElementsByTagName("div")[0];
            precio = capaArticulo.getElementsByTagName("h4")[0];
            valorPrecio = precio.firstChild.nodeValue.split("€")[0];
            

            nombre = capaArticulo.getElementsByTagName("h4")[1].getElementsByTagName("a")[0];
            textoNombre = nombre.firstChild.nodeValue;

            this.ruta = rutaImagen;
            this.precio = valorPrecio;
            this.nombre = textoNombre;
            this.unidades = 1;
            this.total = this.precio;

        }
        

        function anyade(id) {
           articuloNuevo = new articulo(id);
            
            carrito.insertar(articuloNuevo);
                

        }
        
        function cargaProductos(){
        
        
        tbody = document.getElementById("bodyTablaProductosCarrito");
        tbody.innerHTML ="";
        //alert("carga tabla");
        for (i = 0; i < carrito.listaProductos.length; i++) {
             
             tbody.innerHTML += "<tr><td><a href='javascript:borrarArticulo("+carrito.listaProductos[i].id+")'>Borrar</a></td><td><img width='80' height='80' src='img/"+carrito.listaProductos[i].id+".jpg'></td><td>"+ carrito.listaProductos[i].nombre+"</td><td><p>"+carrito.listaProductos[i].unidades+"</p></td><td>"+carrito.listaProductos[i].precio+"€</td><td>"+carrito.listaProductos[i].total+"€</td></tr>"
        
            }
        
        }
        function borrarArticulo(id){
            
         for (i = 0; i < carrito.listaProductos.length; i++) {
             if(carrito.listaProductos[i].id==id){
                 //alert("borrar")
                 pos = i;
             }
        }
        carrito.listaProductos.splice(pos,1);
        
        cargaProductos();
        carrito.actualizar();
        //alert("actualizado");
        carrito.verArticulos();
        
        }
        function comprar(){
            carrito.cambiarCuenta(document.getElementById("cuenta").value);	
            
            carritoJSON = JSON.stringify(carrito);
            //alert(carritoJSON);
            $.ajax({
		  type:'POST',
		  data:'datos='+carritoJSON,
		  url: 'compra.php',
                  
		  success: function(data){
			 
			alert("Su compra se ha realizado con éxito")
			alert(carrito.cuenta); 
		  }
			});
        }


