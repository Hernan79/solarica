<?php 
        session_start();
        include_once('php_conexion.php');
        include_once('Class/funciones.php'); 
        include_once('Class/class_facturas.php');
        
        if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='s'){
        }else{
            header('location:error.php');
        }
                    // Actualizamos en funcion del id que recibimos 


        $id=$_POST['id'];

        $fecha_sist=$_POST['fecha_sist'];       
        $factura=$_POST['factura'];
        $ne=$_POST['ne'];
        $fecha_real=$_POST['fecha_real'];
        $pedidos=$_POST['pedidos'];
        $codigo=$_POST['codigo'];        
        $bultos=$_POST['bultos'];             
        $base_imponible=$_POST['base_imponible'];  
        
        if (!empty($_POST['id'])) 
                    {
        $query = "UPDATE reg_facturas SET       fecha_sist='$fecha_sist',
                                                factura='$factura',
                                                ne='$ne',
                                                fecha_real='$fecha_real',
                                                pedidos='$pedidos',
                                                codigo='$codigo',
                                                bultos='$bultos',
                                                base_imponible='$base_imponible',
                                                estado='$estado'

                                      Where     id=$id";
                        $result = mysql_query($query);

                    header('location:reg_facturas.php');
                    
                  }  
                    
                    
        ?>