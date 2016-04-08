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

                    
                    $id = $_POST['id']; 

                    if ($id<>0) 
                    {
                    $query = "DELETE FROM reg_facturas WHERE id = '$id'";  
                    $result = mysql_query($query);
                    
                                       
                    header('location:reg_facturas.php');
                    }
                    
                    
                    
                    ?>