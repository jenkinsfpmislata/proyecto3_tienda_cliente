<?php
session_start();
if (isset($_SESSION["root"]))
{

?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Users - Admin Panel</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css"/>
        <link type="text/css" rel="stylesheet" href="../assets/Font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
        <link type="text/css" rel="stylesheet" href="../assets/css/DT_bootstrap.css"/>
        <link rel="stylesheet" href="../assets/css/responsive-tables.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/flick/jquery-ui-custom.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../assets/jqgrid/css/ui.jqgrid.css" />

        <link rel="stylesheet" href="../assets/css/theme.css">
        <link rel="stylesheet" href="../assets/css/general.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../assets/jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="../assets/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="../assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="../assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->
    </head>
    <body class="padTop44">
        <!-- BEGIN WRAP -->
        <div id="wrap">
            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="../dashboard.php">ServiSport</a>
                            <!-- .topnav -->
                            <div class="btn-toolbar topnav">
                                <div class="btn-group">
                                    <a id="changeSidebarPos" class="btn btn-success" rel="tooltip"
                                       data-original-title="Show / Hide Sidebar" data-placement="bottom">
                                        <i class="icon-resize-horizontal"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn" rel="tooltip" data-original-title="E-mail" data-placement="bottom">
                                        <i class="icon-envelope"></i>
                                        <span class="label label-warning">5</span>
                                    </a>
                                    <a class="btn btn" rel="tooltip" href="#" data-original-title="Messages"
                                       data-placement="bottom">
                                        <i class="icon-comment"></i>
                                        <span class="label label-important">4</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn" rel="tooltip" href="#" data-original-title="Document"
                                       data-placement="bottom">
                                        <i class="icon-file"></i>
                                    </a>
                                    <a href="#helpModal" class="btn btn" rel="tooltip" data-placement="bottom"
                                       data-original-title="Help" data-toggle="modal">
                                        <i class="icon-question-sign"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-danger btn-sm" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                                       href="../logout.php"><i class="icon-off"></i></a></div>
                            </div>
                            <!-- /.topnav -->
                            <div class="nav-collapse collapse">
                                <!-- .nav -->
                                <ul class="nav">
                                    <li class="active"><a href="../dashboard.php"><i class="icon-home"></i>Home</a></li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            Options <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../productos/productos_mostrar.php">Products</a></li>
                                            <li><a href="../usuarios/usuarios_mostrar.php">Users</a></li>
                                            <li><a href="../pedidos/pedidos_mostrar.php">Orders</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->
            <!-- BEGIN HEADER.head -->
            <header class="head">
                <div class="search-bar">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="search-bar-inner">
                                <a id="menu-toggle" href="#menu" data-toggle="collapse"
                                   class="accordion-toggle btn btn-inverse visible-phone"
                                   rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu">
                                    <i class="icon-sort"></i>
                                </a>

                                <form class="main-search">
                                    <input class="input-block-level" type="text" placeholder="Live search...">
                                    <button id="searchBtn" type="submit" class="btn btn"><i class="icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ."main-bar -->
                <div class="main-bar">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <h3><i class="icon-user"></i> Users - Admin Panel</h3>
                            </div>
                        </div>
                        <!-- /.row-fluid -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.main-bar -->
            </header>
            <!-- END HEADER.head -->

            <!-- BEGIN LEFT  -->
            <div id="left">
                <!-- .user-media -->
                <div class="media user-media hidden-phone">
                    <a href="" class="user-link">
                        <img src="../assets/img/bender.gif" alt="" class="media-object img-polaroid user-img">
                        <span class="label user-label">4</span>
                    </a>

                    <div class="media-body hidden-tablet">
                        <h5 class="media-heading">Admin</h5>
                        <ul class="unstyled user-info">
                            <li><a href="">Administrator</a></li>
                            <li>Last Access : <br/>
                                <small><i class="icon-calendar"></i> 16 Mar 16:32</small>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.user-media -->

                <!-- BEGIN MAIN NAVIGATION -->
                <ul id="menu" class="unstyled accordion collapse in">
                    <li >
                        <a href="../productos/productos_mostrar.php">
                            <i class="icon-barcode icon-white"></i> Products <span 
                                class="label btn-metis-6 pull-right">25</span>
                        </a>
                    <li >
                        <a href="../usuarios/usuarios_mostrar.php">
                            <i class="icon-user icon-white"></i> Users <span 
                                class="label btn-metis-6 pull-right">25</span>
                        </a>
                    </li>
                    <li >
                        <a href="../pedidos/pedidos_mostrar.php">
                            <i class="icon-shopping-cart icon-white"></i> Orders <span 
                                class="label btn-metis-6 pull-right">25</span>
                        </a>
                    </li>
                </ul>
                <!-- END MAIN NAVIGATION -->

            </div>
            <!-- END LEFT -->

            <!-- #content -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-search"></i></div>
                                            <h5>Users List</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="form_insert" class="btn btn-inverse" role="button">Insert Client</button>
                            <!--End Datatables-->
                            <div class="row-fluid" id="dialog_modify" style="visibility: hidden;">
                                <div class="span6">
                                    <h4>Modificar Usuario</h4>
                                    <form id="modify_product_data">
                                        <input type="text" placeholder="ID_User" name="id_usuario" id="id_usuario" readonly><br>
                                        <input type="text" placeholder="Name" name="nombre" id="nombre"><br>
                                        <input type="text" placeholder="Surname" name="apellidos" id="apellidos"><br>
                                        <input type="password" placeholder="Password" name="password" id="password"><br>
                                        <input type="text" placeholder="Mail" name="mail" id="mail"><br>
                                        <input type="text" placeholder="ZIP Code" name="codigo_postal" id="codigo_postal"><br>
                                        <input type="text" placeholder="Adress" name="direccion" id="direccion"><br>
                                        <input type="text" placeholder="City" name="ciudad" id="ciudad"><br>
                                        <input type="text" placeholder="Province" name="provincia" id="provincia"><br>

                                    </form>
                                    <!--<a href="javascript:modificaraphp()">Enviar Datos</a>-->

                                </div>
                            </div>


                            <div class="row-fluid" id="dialog" style="visibility: hidden;">
                                <div class="span6">
                                    <h5>Insertar Usuario</h5>
                                    <form id="new_product_data">
                                        <input type="text" placeholder="ID_User" name="id_usuario" ><br>
                                        <input type="text" placeholder="Name" name="nombre"><br>
                                        <input type="text" placeholder="Surname" name="apellidos" ><br>
                                        <input type="password" placeholder="Password" name="password" ><br>
                                        <input type="text" placeholder="Mail" name="mail" ><br>
                                        <input type="text" placeholder="ZIP Code" name="codigo_postal" ><br>
                                        <input type="text" placeholder="Adress" name="direccion" ><br>
                                        <input type="text" placeholder="City" name="ciudad" ><br>
                                        <input type="text" placeholder="Province" name="provincia" ><br>
                                    </form>
                                    <!-- <a href="javascript:articulonuevo()">Enviar Datos</a>-->
                                </div>
                            </div>

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.row-fluid -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- /#content -->
            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- /#wrap -->
        <div id="footer">
            <p>Servisport - 2014 © Metis Admin</p>
        </div>

        <!-- #editModal -->
        <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Edit Table</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label for="fName" class="control-label">First Name</label>
                    <div class="controls">
                        <input type="text" id="fName" name="fName">
                    </div>
                </div>
                <div class="control-group">
                    <label for="lName" class="control-label">Last Name</label>
                    <div class="controls">
                        <input type="text" id="lName" name="lName">
                    </div>
                </div>
                <div class="control-group">
                    <label for="uName" class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" id="uName" name="uName">
                    </div>
                </div>
                <div class="form-actions">
                    <button id="sbmtBtn" type="submit" class="btn btn-primary" data-dismiss="modal" >Submit</button>
                </div>
            </div>
            <div class="modal-footer">

                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#editModal -->

        <!-- #helpModal -->
        <div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
            </div>
            <div class="modal-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.
                </p>
            </div>
            <div class="modal-footer">

                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#helpModal -->



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
        -->

        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/usuarios.js"></script>

        <script type="text/javascript" src="../assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/lib/DT_bootstrap.js"></script>
        <script src="../assets/js/lib/responsive-tables.js"></script>
        <script type="text/javascript">
            $(function() {
                metisTable();
            });
        </script>
        <script type="text/javascript" src="../assets/js/main.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>


    </body>
</html>
<?php
}
else
{
header('Location:../loginerror.html');
   
}
?>