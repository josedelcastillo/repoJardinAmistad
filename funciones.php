<?php
	include_once "conexionBD.php";
	include_once "Mail.php";
	include_once "phpmailer/PHPMailerAutoload.php";
	function obtenerMarcacionesHoy($local){
		if(is_null($local) or $local=="")
			$query="select nombre,apellidos,numeroDocumento,tipo,m.local,fechaHora,fecha, l.descLocal from empleado e
		left join marcacion m on e.codigo=m.codigoEmpleado
		left join locales l on l.codigoLocal=m.local 
		where m.fecha=current_date()
		order by fechaHora desc";
		else
			$query="select nombre,apellidos,numeroDocumento,tipo,m.local,fechaHora,fecha, l.descLocal from empleado e
		left join marcacion m on e.codigo=m.codigoEmpleado
		left join locales l on l.codigoLocal=m.local 
		where m.fecha=current_date() and m.local=$local
		order by fechaHora desc";
		$result= BD::ejecutarQuerySelect($query);
		if (count($result) > 0) {
				
		}
		else {
				$result=array();
			}		
		return $result;
	}
	function registrarMarca($numeroDocumento,$local,$ip){
		$respuesta=array("codigo"=>0, "mensaje"=>"");
		$tipo=0;
		$codigoEmpleado="";
		$query="select e.codigo,m1.tipo Entrada,m2.tipo Salida from empleado e
						left join marcacion m1 on m1.codigoEmpleado=e.codigo and m1.tipo=1 and m1.fecha=current_date()
						left join marcacion m2 on m2.codigoEmpleado=e.codigo and m2.tipo=2 and m2.fecha=current_date()
						 where numeroDocumento='".$numeroDocumento."'";
		$result= BD::ejecutarQuerySelect($query);
		if (count($result) < 1) {
			$respuesta["codigo"]=1;
			$respuesta["mensaje"]="Documento no registrado";
		}
		else 
		{
			$result=$result[0];
			
			if (is_null($result["Entrada"])) {
				$tipo=1;
				$codigoEmpleado=$result["codigo"];
			}
			else 
				if (is_null($result["Salida"])) {
					$tipo=2;
					$codigoEmpleado=$result["codigo"];
				}
				else
				{
					$respuesta["codigo"]=1;
					$respuesta["mensaje"]="Ya realizaste las 2 marcaciones del dia";
				}
		}
		if($tipo!=0)
		{

			$query="INSERT INTO marcacion(codigoEmpleado,fecha, local, tipo,ip) VALUES ( ".
			"'".$codigoEmpleado."',".
			"current_date(),".
			$local.",".
			$tipo.",'$ip')";
			
			$result= BD::ejecutarQueryInsert($query);
			//print_r($result);
			if($result=="OK")
				{
					$respuesta["codigo"]=0;
					$respuesta["mensaje"]=date("H:i:s");
				}
			else
				{
					$respuesta["codigo"]=-1;
					$respuesta["mensaje"]="Error al registrar, contactar a Jose";
				}

		}

		return json_encode($respuesta);


	}
?>