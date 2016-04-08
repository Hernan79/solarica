<?php

class Consultar_Facturas{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM reg_facturas WHERE factura='$codigo'  or ne='$codigo' or pedidos='$codigo' or codigo='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}



class Proceso_Factura{
	var $fecha_sist;		var $pedidos;				
	var $factura;			var $codigo;		
	var $bultos;
	var $ne;				var $base_imponible;
	var $fecha_real;		var $estado;
	var $id;
		
	function __construct($id, $fecha_sist, $factura, $ne, $pedidos, $codigo, $bultos, $base_imponible, $fecha_real, $estado){
		$this->fecha_sist = $fecha_sist;	
		$this->codigo = $codigo;		
		$this->factura = $factura;			
		$this->ne = $ne;					
		$this->fecha_real = $fecha_real;	
		$this->pedidos = $pedidos;			
		$this->bultos = $bultos;
		$this->id = $id;					
		$this->base_imponible = $base_imponible;
		$this->estado = $estado;
												
											
	}
		
	function crear(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $fecha_real= $this->fecha_real;	 	 
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 	
			
		mysql_query("INSERT INTO reg_facturas (id, fecha_sist, factura, ne, pedidos, codigo, bultos, base_imponible, fecha_real, estado) VALUES ('$id', '$fecha_sist', '$factura', '$ne', '$pedidos', '$codigo',  '$bultos', '$base_imponible', '$fecha_real',  '$estado')");
	}
	function actualizar(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $fecha_real= $this->fecha_real;	 	 
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 
		
		mysql_query("UPDATE reg_facturas SET	fecha_sist='$fecha_sist',
                                                factura='$factura',
                                                ne='$ne',
                                                fecha_real='$fecha_real',
                                                pedidos='$pedidos',
                                                codigo='$codigo',
                                                bultos='$bultos',
                                                base_imponible='$base_imponible'

                                                
                                      WHERE     id=$id");
                        
	}
	function eliminar(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $fecha_real= $this->fecha_real;	 	 
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 
		
		mysql_query("DELETE FROM reg_facturas WHERE id = '$id'");
                        
	}
	
}

class Consultar_Usuarios{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM usuarios WHERE nom='$codigo' ");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}



class Proceso_Usuarios{
	var $id;				var $con;				
	var $nom;				var $tipo;		
	var $email;
	var $usu;	
	var $estado;			
	
		
	function __construct($id, $nom,  $con, $tipo, $email, $usu, $estado){
		$this->id = $id;	
		$this->nom = $nom;		
		$this->con = $con;					
		$this->tipo = $tipo;	
		$this->email = $email;			
		$this->usu = $usu;
		$this->estado = $estado;					
		
												
											
	}
		
	function crear(){

		  $id=$this->id;	
		  $nom=$this->nom;		
		  $con=$this->con;					
		  $tipo=$this->tipo;	
		  $email=$this->email;			
		  $usu=$this->usu;
		  $estado=$this->estado;	
		
											 	
			
		mysql_query("INSERT INTO usuarios (id, nom, con, tipo, email, usu, estado) VALUES ('$id', '$nom', , '$con', '$tipo', '$email', '$usu', '$estado')");
	}
	function actualizar(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $fecha_real= $this->fecha_real;	 	 
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 
		
		mysql_query("UPDATE reg_facturas SET	fecha_sist='$fecha_sist',
                                                factura='$factura',
                                                ne='$ne',
                                                fecha_real='$fecha_real',
                                                pedidos='$pedidos',
                                                codigo='$codigo',
                                                bultos='$bultos',
                                                base_imponible='$base_imponible'

                                                
                                      WHERE     id=$id");
                        
	}
	function eliminar(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $fecha_real= $this->fecha_real;	 	 
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 
		
		mysql_query("DELETE FROM reg_facturas WHERE id = '$id'");
                        
	}
	
}	
?>