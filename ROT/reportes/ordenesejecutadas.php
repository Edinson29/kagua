<?PHP
require "../../archivos/comun.inc"; 

list($dia, $mes, $ano) 		= explode('/',$_POST['fecCita1']);
list($dia_, $mes_, $ano_) 	= explode('/',$_POST['fecCita2']);

$sql = "SELECT
		tp.cod_cont_rea, tp.cod_empl_rea,
		co.nombre AS ncontratista, em.nombre AS nempleado,
		tp.cod_otrb,
		TO_CHAR(tp.fecha_grab, 'dd/mm/yyyy') AS fsolicitud,
		TO_CHAR(tp.fecha_grab, 'HH24:MI') AS hsolicitud,
		TO_CHAR(tp.fecha_pla,  'dd/mm/yyyy') AS fplanificacion,
		TO_CHAR(tp.fecha_ini_trb, 'dd/mm/yyyy') AS finicio,
		TO_CHAR(tp.fecha_ini_trb, 'HH24:MI') AS hinicio,
		TO_CHAR(tp.fecha_pre_cierre, 'dd/mm/yyyy') AS ffinal,
		TO_CHAR(tp.fecha_pre_cierre, 'HH24:MI') AS hfinal
		,
		round(
				(
				 (((to_date(tp.fecha_pre_cierre, 'yyyy-mm-dd') -
				 to_date(tp.fecha_ini_trb, 'yyyy-mm-dd'))*1440) +
				 ((to_char(tp.fecha_pre_cierre, 'HH24')::integer -
				 to_char(tp.fecha_ini_trb, 'HH24')::integer)*60) +
				 ((to_char(tp.fecha_pre_cierre, 'MI')::integer -
				 to_char(tp.fecha_ini_trb, 'MI')::integer))) / 60 ::numeric
				), 2) AS horas_e__
		FROM orden_trabajo tp
			 JOIN contratista co ON (tp.cod_cont_rea = co.cod_cont AND
									 tp.cod_empr     = co.cod_empr)
			 JOIN empleado em ON (tp.cod_empl_rea = em.cod_empl AND
								  tp.cod_cont_rea = em.cod_cont AND
								  tp.cod_empr     = em.cod_empr)
		WHERE tp.fecha_pre_cierre BETWEEN  
			  '".$ano."-".$mes."-".$dia." 00:00:00' 	AND 
			  '".$ano_."-".$mes_."-".$dia_." 24:00:00' 	AND
			  tp.cod_munip = ".$_POST['municipio']." 	AND
			  tp.cod_empr = '".$_SESSION['cod_empr']."' AND tp.cod_tque != 'ISP'
		ORDER BY tp.fecha_pre_cierre, tp.cod_cont_rea, tp.cod_empl_rea";
$rs = odbc_exec($conexion, $sql);
$conten = "<table border = 1>";
while( $rw = odbc_fetch_array($rs) ){

	if($rw['cod_cont_rea']!=$tmp_c || $rw['cod_empl_rea']!=$tmp_e){
			$tmp_c = $rw['cod_cont_rea'] ;
			$tmp_e = $rw['cod_empl_rea'] ;
		$conten.= "<tr>
					<td bgcolor=\"#CCCCCC\"><strong>Contratista</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>Empleado</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>Ot</strong></td>
				  	<td bgcolor=\"#CCCCCC\"><strong>F. Solicitud</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>H. Solicitud</strong></td>
				  	<td bgcolor=\"#CCCCCC\"><strong>F. Planificacion</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>F. Inicio</strong></td>
				  	<td bgcolor=\"#CCCCCC\"><strong>H. Inicio</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>F. Final</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>H. Final</strong></td>
					<td bgcolor=\"#CCCCCC\"><strong>Horas </strong></td>
			  	   </tr>";
	}
	$conten.= "<tr><td>".$rw['ncontratista']."</td><td>".$rw['nempleado']."</td>
				  <td>".$rw['cod_otrb']."</td><td>".$rw['fsolicitud']."</td>
				  <td>".$rw['hsolicitud']."</td><td>".$rw['fplanificacion']."</td>
				  <td>".$rw['finicio']."</td><td>".$rw['hinicio']."</td>
				  <td>".$rw['ffinal']."</td><td>".$rw['hfinal']."</td>
				  <td>".$rw['horas_e__']."</td>
		   </tr>";
}
$conten.= "</table>";
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"excel_generated.xls\"" );
print $conten;
?>