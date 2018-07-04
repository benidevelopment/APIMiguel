<?php
  if (count($_GET)==0){
	  ?>
	  <div>
	     esto es una kk
	  </div>
	  <div>
	     prueba con una tabla
	  </div>
	  <table style="border:1px solid">
	  <tr><td>kasjdhf a</td></tr>
	  </table>
	  <?php
	  exit;
  }
  if (isset($_GET["nombre"])){
	$respuesta= "HOLA " . $_GET["nombre"];
  }else{
	$respuesta= "FORMATO INCORRECTO";
  }
  
  if (isset($_GET["tipo"])){
	if ($_GET["tipo"]== "html"){
		?>
		<div>
		  <ul>
		     <li><?php echo $respuesta ?></li>
		  </ul>
		</div>
		<?php
	}else if ($_GET["tipo"]== "json"){
		$respuesta=[];
		$respuesta[0]['id']=11;
		$respuesta[0]['nombre']=$_GET["nombre"];
		$respuesta[1]['id']=12;
		$respuesta[1]['nombre']=$_GET["nombre"];
		$respuesta[2]['id']=13;
		$respuesta[2]['nombre']=$_GET["nombre"];
		print_r(json_encode($respuesta));
	}
	else if ($_GET["tipo"]== "javascript"){
		header("Content-type: text/javascript");
		?>
		   alert("ADIOS");
		   window.close();
		   
		<?php
	}
  }else{
	echo $respuesta;
  }
?>