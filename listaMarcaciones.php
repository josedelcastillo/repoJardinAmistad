<?php
include_once("analyticstracking.php") ;
include_once "funciones.php";
//tipoEntidad=Todas&moneda=1&departamento=15&plazo=360&monto=10000
$local=$_REQUEST['local'];
	$marcaciones=obtenerMarcacionesHoy($local);
	

    $html= '<table id="tablaMarcaciones" class="table table-bordered  table-responsive" style="margin-top: 2%;">';
    // header row
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Entrada/Salida</th>';
    $html .= '<th>Nombre Completo</th>';
	$html .= '<th>Hora</th>';
	$html .= '<th>Local</th>';
  $html .= '<th>Documento</th>';

  $html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody style=" overflow-y: hidden;" >';
    foreach($marcaciones as $key=>$marca){
		$html .= '<tr>';
	//	$html .= '<td>'.$tasa['orden'] .'</td>';
		$html .= '<td>'.$marca['nombre']." ".$marca['apellidos'].'</td>';
    $html .= '<td>'.$marca['fechaHora'].'</td>';
    $html .= '<td>'.$marca['descLocal'].'</td>';
    $html .= '<td>'.$marca['numeroDocumento'].'</td>';
    $html .= '<td>'.($marca['tipo']==1?"Entrada":"Salida").'</td>';
	    $html .= '</tr>';
	}
    // finish table and return it
    $html .= '</tbody>';
    $html .= '</table>';
   
    echo $html;
?>
