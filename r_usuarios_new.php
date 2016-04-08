<?php
 		session_start();
    include('php_conexion.php'); 
    if($_SESSION['tipo_usu']=='a'){
    }else{
      header('location:error.php');
    }
		


  
  if(!empty($_POST['contra1']) && !empty($_POST['contra2']))
  {
      $contra=limpiar($_POST['contra2']);
      $nombre=$_POST['nombre'];
      $mail=$_POST['email'];
      $usuario=$_POST['usuario'];
      $c1=$_POST['contra1'];
      $comprobacion1 = mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
      $comprobacion2 = mysql_query("SELECT * FROM usuarios WHERE email='$mail'");
		  
      if(mysql_num_rows($comprobacion1) > 0)
        {
          echo  '<div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Fallo de Registro!</strong> Este usuario existe
                </div>';
        } 
          elseif(mysql_num_rows($comprobacion2) > 0){

                                                    echo  '<div class="alert alert-error">
                                                          <button type="button" class="close" data-dismiss="alert">×</button>
                                                          <strong>Fallo de Registro!</strong> Este correo existe
                                                          </div>';
                                                    }
          else
          {
            if($_POST['contra1']==$_POST['contra2']) 
        		{
        			//$usuario=limpiar($_SESSION['username']);
        			$can=mysql_query("SELECT * FROM usuarios");
        			if($dato=mysql_fetch_array($can))
              {
        					$sql="INSERT INTO usuarios (id, email, estado, nom, usu, con, tipo) VALUES ('', '$mail', 's', '$nombre', '$usuario', '$c1', 'u')";
        					mysql_query($sql);
        					
                  echo  '<div class="alert alert-info" align="center">
        					       <button type="button" class="close" data-dismiss="alert">×</button>
        					       <strong>Registro!</strong> Realizado con exito
        					       </div>';
        			}
            } 
            else
                {
                  echo '<div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>ERROR</strong> Las constraseña no son iguales
                        </div>';
                } 	

    }
	   	
	}
	?>
        