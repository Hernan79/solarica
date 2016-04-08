<?php
    session_start();
    include_once('php_conexion.php');
        include_once('Class/funciones.php'); 
    
        include_once('Class/class_facturas.php');
    
        if($_SESSION['tipo_usu']=='a'){
    }else{
      header('location:error.php');
    }
    if(!empty($_GET['estado'])){
      $nit=limpiar($_GET['estado']);
      $cans=mysql_query("SELECT * FROM usuarios WHERE estado='s' and id='$nit'");
      if($dat=mysql_fetch_array($cans)){
        $xSQL="Update usuarios Set estado='n' Where id='$nit'";
        mysql_query($xSQL);
        header('location:registros_usu.php');
      }else{
        $xSQL="Update usuarios Set estado='s' Where id='$nit'";
        mysql_query($xSQL);
        header('location:registros_usu.php');
      }
    }
    
    #paginar
    $maximo=30;
    if(!empty($_GET['pag'])){
      $pag=limpiar($_GET['pag']);
    }else{
      $pag=1;
    }
    $inicio=($pag-1)*$maximo;
    
      $cans=mysql_query("SELECT COUNT(id)as total FROM usuarios");
      if($dat=mysql_fetch_array($cans)){
        $total=$dat['total']; #inicializo la variable en 0
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
  <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="90%" border="0">
      <tr>
        <td>
          <table class="table table-bordered">
              <tr class="success">
                <td>
                    <div class="row-fluid">
                      <div class="span6">
                          <h3><img src="img/factura2.png" class="img-circle img-polaroid" width="90" height="80"> 
                          Registro y Control de Usuarios</h3>
                      </div>
                      <div class="span6">
                        <div align="right">
                          <form name="form2" method="post" action="">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="bus" type="text" placeholder="Buscar" class="input-xlarge" autocomplete="off" title="Buscar por: (Factura, Nota de Entrega, Pedidos o Codigo del Cliente)  ">
                            </div>
                        </form>
                          <form name="form1" method="post" action="r_usuarios.php">
                            <div class="input-prepend">
                                <button type="submit" class="btn"><strong><i class="icon-ok"></i> Ingresar Usuario</strong></button>
                             </div>
                          </form>
                        
                        
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
            </table>

        </td>
      </tr>
      <tr>
        <td>
          <table class="table table-bordered table table-hover">
              <tr class="success">
                <td width="3%"><center><strong>ID</strong></center></td>
                <td width="10%"><center><strong>Nombre</strong></center></td>
                <td width="10%"><center><strong>Email</strong></center></td>
                <td width="8%"><center><strong>Usuario</strong></center></td>
                <td width="5%"><center><strong>Estado</strong></center></td>
                <td width="5%">&nbsp;</td>
              </tr>
              <?php

          if(empty($_GET['usuario'])){
          if(empty($_POST['bus'])){
            
          $sql="SELECT * FROM usuarios ORDER BY id  LIMIT  $inicio,  $maximo";
                        
          }else{
            $bus=limpiar($_POST['bus']);
            $sql="SELECT * FROM usuarios WHERE nom LIKE '$bus%' ORDER BY  factura LIMIT $inicio,  $maximo";
          }
        }else{
          $bus=limpiar($_GET['factura']);
          if($bus<>0){
            $sql="SELECT * FROM usuarios WHERE nom='$bus' or email='$bus' ORDER BY nombre  LIMIT $inicio,  $maximo";
          }else{
            $sql="SELECT * FROM usuarios ORDER BY nom  LIMIT $inicio,  $maximo";
          }
        }
          
          $can=mysql_query($sql);
        while($dato=mysql_fetch_array($can)){ 
          $factura = new Consultar_Usuarios($dato['']);
                
        ?>
                  <tr align="center">
                    <td><i class=""></i> <center><?php echo trim($dato['id']); ?></center></td>
                    <td><i class=""></i> <?php echo trim($dato['nom']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['email']); ?></td>
                    <td><i class=""></i> <?php echo trim($dato['usu']); ?></td>
                    
                    <td><center>
                        <a href="registros_usu.php?estado=<?php echo $dato['id']; ?>" title="Cambiar Estado">
                        <?php echo estado($dato['estado']); ?>
                        </a>
                        </center>
                    </td>
                    
                    <td>
                      <center><a href="#actualizar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Editar">
                        <i class="icon-edit"></i>
                        </a>
                        <a href="#eliminar<?php echo $dato['id']; ?>" role="button"  class="btn btn-mini" data-toggle="modal" title="Eliminar">
                            <i class="icon-remove"></i>
                        </a></center>
                    </td>
                  </tr>
                  <!--actualizar alumno-->
                    <div id="actualizar<?php echo $dato['id']; ?>" 
                    class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="form2" method="post" enctype="multipart/form-data" action="">
                      <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Editar Usuario</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid" align="center">
                                
                                    <label><strong>Nombre: </strong></label><input type="text" name="nombre" id="nom" value="<?php echo $dato['nom'];?>">
                                    <label><strong>Email: </strong></label><input type="text" name="email" id="email" value="<?php echo $dato['email'];?>">
                                    <label><strong>Usuario: </strong></label><input type="text" name="usuario" id="usu" value="<?php echo $dato['usu'];?>">
                                    <label><strong>Contraseña: </strong></label><input type="password" name="contra1" id="c1" value="<?php echo $dato['con'];?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Aceptar</strong></button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                        </div>
                        </form>
                    </div>

                    <!--Eliminar Factura-->
                    <div id="eliminar<?php echo $dato['id']; ?>" 
                    class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="form4" method="post" enctype="multipart/form-data" action="eliminar_factura.php">
                        <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel"><i class="icon-info"></i>Advertencia</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                
                                    <center><strong>Desea eliminar la Factura Nº </strong><strong><?php echo $dato['factura']; ?></center>
                                   
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn"><strong><i class="icon-ok"></i> Aceptar</strong></button>
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                        </div>
                        </form>
                        </div>
                
                                 
              <?php } ?>

              

            </table>
      <?php 
        $can=mysql_query($sql);
        if(!$dato=mysql_fetch_array($can)){       
          echo '<div class="alert alert-info" align="center"><strong>No hay Usuarios Registrados en la BD</strong></div>';
        }
      ?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
          <?php
      if(empty($_GET['usuarios']) and empty($_POST['bus'])){
        $tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
            for ($n=1; $n<=$tp ; $n++){
          if($pag==$n){
            echo '<li class="active"><a href="list_usuarios.php?pag='.$n.'">'.$n.'</a></li>';  
          }else{
            echo '<li><a href="list_usuarios.php?pag='.$n.'">'.$n.'</a></li>'; 
          }
        }
        
      }
      ?>
        </ul>
    </div>
</div>
<!--crear nuevo alumno-->
<div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="form4" method="post" enctype="multipart/form-data" action="">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Ingresar Usuario</h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid" align="center">
          <label><strong>Nombre: </strong></label><input type="text" name="nombre" id="nom" required>
          <label><strong>Email: </strong></label><input type="text" name="email" id="email" required>
          <label><strong>Usuario: </strong></label><input type="text" name="usuario" id="usu" required>
          <label><strong>Contraseña: </strong></label><input type="password" name="contra1" id="c1" required>
          <label><strong>Repetir Contraseña: </strong></label><input type="password" name="contra2" id="c2" required><br><br>
              </div>
  </div>
        <div class="modal-footer">
            <button type="submit" class="btn"><strong><i class="icon-ok"></i> Aceptar</strong></button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>

      </div>


    </form>

 
</div>
</body>
</html>