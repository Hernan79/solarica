<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/class_alumnos.php');
		include_once('Class/class_facturas.php');
		if($_SESSION['tipo_usu']=='a'){
		}else{
			header('location:error.php');
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
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de Excel [Productos]</strong>
      <input type="hidden" name="numero" id="numero" value="1">
      <input type="file" name="imagen" id="imagen">
      <input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
	if(!empty($_POST['numero'])){
		//subir la imagen del articulo
		$nameimagen = $_FILES['imagen']['name'];
		$tmpimagen = $_FILES['imagen']['tmp_name'];
		$extimagen = pathinfo($nameimagen);
		$urlnueva = "xls/alumnos.xls";			
		if(is_uploaded_file($tmpimagen)){
			copy($tmpimagen,$urlnueva);	
			echo '<div class="alert alert-success"><strong>Datos Actualizados con Exito</strong></div>';
		}
		
	}
?>
<table border="1" width="100%">
	<thead>
    	<tr>
        	<th><center><strong>A</strong></center></th>
            <th><center><strong>B</strong></center></th>
            <th><center><strong>C</strong></center></th>
            <th><center><strong>D</strong></center></th>
			<th><center><strong>E</strong></center></th>
			<th><center><strong>F</strong></center></th>
			<th><center><strong>G</strong></center></th>
            <th><center><strong>H</strong></center></th>
			<th><center><strong>I</strong></center></th>
			<th><center><strong>J</strong></center></th>
			<th><center><strong>K</strong></center></th>
        </tr>
    	<tr>
			<th><strong>Fecha Sistema</strong></th>
            <th><strong>Factura</strong></th>
			<th><strong>Nota de Entrega</strong></th>
            <th><strong>Pedidos</strong></th>
            <th><strong>Codigo</strong></th>
			<th><strong>Cliente</strong></th>
			<th><strong>Vendedor</strong></th>
			<th><strong>Bultos</strong></th>
			<th><strong>Base Imponible</strong></th>
			<th><strong>Zona</strong></th>
			<th><strong>Fecha Real</strong></th>
        </tr>
	</thead>
    <tbody>
  	<?php
			if(!empty($_POST['numero'])){
					//incluimos la clase
					require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
					
					//cargamos el archivo que deseamos leer
					$objPHPExcel = PHPExcel_IOFactory::load('xls/alumnos.xls');
					//obtenemos los datos de la hoja activa (la primera)
					$objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true);
					
					//recorremos las filas obtenidas
					foreach ($objHoja as $iIndice=>$objCelda) {
						//imprimimos el contenido de la celda utilizando la letra de cada columna 12
						echo '
							<tr>
								<td>'.$objCelda['A'].'</td>
								<td>'.$objCelda['B'].'</td>
								<td>'.$objCelda['C'].'</td>
								<td>'.$objCelda['D'].'</td>
								<td>'.$objCelda['E'].'</td>
								<td>'.$objCelda['F'].'</td>
								<td>'.$objCelda['G'].'</td>
								<td>'.$objCelda['H'].'</td>
								<td>'.$objCelda['I'].'</td>
								<td>'.$objCelda['J'].'</td>
								<td>'.$objCelda['K'].'</td>
							</tr>
						';

						$fecha_sist=date('Y-m-d');		 	 $codigo= $objCelda['F'];		
						$factura=$objCelda['B'];			 $cliente= $objCelda['G'];
						$ne=$objCelda['C'];					 $zona= $objCelda['H'];		
						$fecha_real= date('Y-m-d');	 	 	 $vendedor= $objCelda['I'];
						$pedidos=$objCelda['D'];			 $bultos= $objCelda['J'];
															 $base_imponible= $objCelda['K'];
															 
						
						$c_factura = new Proceso_Factura('', $fecha_sist, $factura, $ne, $pedidos, $codigo, $cliente, $vendedor, $bultos, $base_imponible, $fecha_real, $zona, '');
						$c_factura->crear();
						
					}
			}
	?>
    
    </tbody>
</table>
</div>
</body>
</html>