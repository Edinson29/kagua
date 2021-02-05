<?PHP
	require "../archivos/comun.inc";
	require "../archivos/saldApli.php";
	require "../archivos/paginator.php";
	require "../archivos/paginator_html.php";		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta lang="es" http-equiv="Content-type" content="text/html; charset=utf-8"/>
<title>Free CSS Navigation Menu Designs 1 at exploding-boy.com</title>
<link rel="stylesheet" href="img_css/estilo.css" />
<script language="JavaScript1.2" type="text/javascript">

function show(id){
document.getElementById(id).style.display = (document.getElementById(id).style.display == 'none') ? '' : 'none';
}

</script>
<style type="text/css">
/*<![CDATA[*/
#one
   {
	position:absolute;
	left:285px;
	top:232px;
	margin:-150px 0 0 -250px;
	width: 281px;
	height: 19px;
   }
object
   {
    width:500px; 
    height:300px; 
    border:solid 1px #000000;
   }
 /*//]]>*/
</style>
</head>
<body>
<div id="tabsB">
<ul>
<!-- CSS Tabs -->
<li><a href="solicitudes.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>PQRs...</span></a></li>
<li><a href="ordenestrabajo.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Ord. Trabajo</span></a></li>
<li><a href="inspecciones.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Inspecciones</span></a></li>
<li><a href="suspensiones.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Suspensiones</span></a></li>
<li><a href="reconexiones.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Reconexiones</span></a></li>
<li><a href="cmedidor.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Cambio Medidor</span></a></li>
<li><a href="prediocartas.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Cartas...</span></a></li>
<li><a href="observaciones.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Observaciones</span></a></li>
</ul><div align="center"><? echo "Predio N° : ".$_SESSION['displayNPredio'].". Direccion : ".$_SESSION['displayDPredio'];?></div>
</div>
<div id="tabsB">
<ul>
<!-- CSS Tabs -->
<li><a href="predio.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Predio</span></a></li>
<li><a href="medidor.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Datos del Medidor</span></a></li>
<li><a href="conceptos.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Servicios</span></a></li>
<li><a href="lecturaHistorica.php?cod_pred=<?=$cod_pred?>&cod_munip=<?=$cod_munip?>"><span>H. Lecturas</span></a></li>
<li><a href="facturas.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Facturas</span></a></li>
<li id="current"><a href="pagos.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Pagos</span></a></li>
<li><a href="plazos.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Plazos</span></a></li>
<li><a href="pagos_vta.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Ventas</span></a></li>
<li><a href="pagos_ccobro.php?cod_pred=<?=$cod_pred?>&cod_munip=<?=$cod_munip?>"><span>Cuentas de Cobro</span></a></li>
<li><a href="diferidos.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Diferidos</span></a></li>
<li><a href="convenios.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$cod_munip?>"><span>Convenios</span></a></li>
<li><a href="saldoFavor.php?cod_pred=<?=$_GET['cod_pred']?>&cod_munip=<?=$_GET['cod_munip']?>"><span>Saldos a Favor</span></a></li>
</ul>
</div>

<div id="contenido"><br />

	<table width="100%" border="0">
    <tr>
      <td width="13">&nbsp;</td>
      <td width="788">&nbsp;</td>
      <td width="14">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" class="Gtable">
				  <tr>
                    <td width="19" class="Gtd"><strong>(+)</strong></td>
                    <td width="42" class="Gtd"><strong>Pago</strong></td>
                    <td width="65" class="Gtd"><strong>Fecha Reg </strong></td>
                    <td width="71" class="Gtd"><strong>Fecha  Pago </strong></td>
                    <td width="97" class="Gtd"><strong>Entidad</strong></td>
                    <td width="91" class="Gtd"><strong>Sucursal</strong></td>
                    <td width="25" class="Gtd"><strong>Caja</strong></td>
                    <td width="47" class="Gtd"><strong>F.Pago</strong></td>
                    <td width="134" class="Gtd"><strong>Observacion</strong></td>
                    <td width="40" class="Gtd"><strong>Estado</strong></td>
				    <td width="39" align="center" class="Gtd"><strong>Total </strong></td>
				    <td width="39" align="center" class="Gtd"><strong>Aplicado</strong></td>
				  </tr>

<?PHP

	if(!empty($_GET['cod_pred'])){

		$sql = "select count(*) from 
				pago_cab where 
				cod_pred=".$_GET['cod_pred']." and cod_munip=".$_GET['cod_munip']." and 
				cod_empr='".$_SESSION['cod_empr']."'";
		$rs = odbc_exec($conexion,$sql);
		$nr = odbc_result($rs, 1);
		odbc_free_result($rs);
		if(!empty($nr)){	
		$a =& new Paginator_html($_GET['page'],$nr);
		$a->set_Limit(6);
		$a->set_Links(7);
		//=Punto de partida de la Paginacion
		$limit1 = $a->getRange1(); 
		//=Numero de items que se despliegan en panatalla
		$limit2 = $a->getRange2();
		
			$sql2 = "select 
					 cod_pago, 
					 to_char(fecha_pago, 'dd/mm/yyyy') as fecha_pago_, 
					 to_char(fecha_regi, 'dd/mm/yyyy') as fecha_regi_,
					 cod_scja, observacion, estado, cod_epgo, cod_spgo, cod_fpgo, 
					 valor, vtotalp 
					 from pago_cab where cod_pred=".$_GET['cod_pred']." and 
					 cod_munip=".$_GET['cod_munip']." and 
					 cod_empr='".$_SESSION['cod_empr']."'  
					 Order By fecha_regi DESC, fecha_pago DESC LIMIT $limit2 OFFSET $limit1";
			$result2 = odbc_exec($conexion, $sql2);
			$n=0;
			while($fila = odbc_fetch_array($result2)){
				$bgcolor = ($fila['estado'] == 'I')?'bgcolor="#D2D5D7"':'';	
				$num = detaPagos($fila['cod_pago'], $_GET['cod_pred'], $_SESSION['cod_empr'], $_GET['cod_munip'], $conexion);
				echo "<tr $bgcolor>
				  <td align='center' valign='top'><a href=\"javascript: ";
				  if($n<>0){
				  	//$n++;
				  	$num=$num+$n;
				  }
				  while($n<$num){
				  echo "id='content".$n."'; show(id); ";
				  /**Armo el vector de Contenidos**/
				  $cont[]="<tr id='content".$n."' style='display:none;' >";
				  $n++;
				  }
				  
				echo  "void 0;\">(+)</a></td>";
				
				  
				echo "<td valign='top'> $fila[cod_pago] 		</td>
				  	  <td valign='top'> $fila[fecha_regi_]    </td>
					  <td valign='top'> $fila[fecha_pago_] 	</td>";
				  /**Hallo la Entidad Bancaria donde se hizo el pago y sus pormenores**/
				  
				  $sql1 = "SELECT
								pe.descripcion, ps.descripcion,
								pf.descripcion
							FROM
								pago_entidad pe
								JOIN pago_sucursal ps USING (cod_pent, cod_munip, cod_empr)
								JOIN pago_forma pf USING (cod_empr)
							WHERE
							ps.cod_pent=".$fila['cod_epgo']." and
							ps.cod_psuc=".$fila['cod_spgo']." and
							--ps.cod_caja=".$fila['cod_scja']." and
							ps.cod_empr='".$_SESSION['cod_empr']."' and
							ps.cod_munip=".$_GET['cod_munip']."and
							pf.cod_pfor='".$fila['cod_fpgo']."' ";
				  $rs1 = odbc_exec($conexion,$sql1);
				echo "<td valign='top'>".odbc_result($rs1,1)."</td>";
		   		echo "<td valign='top'>".odbc_result($rs1,2)."</td>";
				echo "<td valign='top'>".$fila['cod_scja']."</td>"; 
				echo "<td valign='top'>".odbc_result($rs1,3)."</td>"; 				 				
				echo "<td valign='top'>".$fila['observacion']."</td>
				<td align='center' valign='top'>".$fila['estado']."</td>";
				echo "<td align='right' valign='top'>$".number_format($fila['vtotalp'], 2, ',', '.')."</td>";
				echo "<td align='right' valign='top'>$".number_format($fila['valor'], 2, ',', '.')."</td>";
				echo "</tr> ";
				
				/**Aqui Armo los Detalles de los Pagos**/
				
				$sqlDet="select * from pago_det where cod_pago='$fila[cod_pago]' and cod_pred='$cod_pred' and cod_empr='$cod_empr' and cod_munip=$cod_munip --and estado='A'";
				$rsDet=odbc_exec($conexion, $sqlDet) or die('Consulta fallida: ' . odbc_error());
				$idet=0;
				while($filaDet = odbc_fetch_array($rsDet))
				{
					echo $cont[$idet];
					echo '<td>&nbsp;</td>';
					echo "<td><strong>Periodo :</strong></td>";
					echo "<td>$filaDet[cod_peri]</td>";
					echo "<td><strong>Detalle $idet:</strong></td>";
					echo "<td align='right'>$".number_format($filaDet['valor'], 2, ',', '.')."</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "</tr> ";
				$idet++;
				}
				unset($cont);
				
				
			}
		odbc_free_result($result2);	
		}else{
			echo "<tr><td colspan='12'><img src='../imagenes/atencion.gif' align='top' width='18' heigth='18'/><br><font color='#FF0000'><b>No hay ningun Pago para este Predio</b></font></td></tr>";
		}
	}
?>
		</table></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td height="18">&nbsp;</td>
      <td>
	  <div id="one">	
	  <?PHP
		if(!empty($nr)){
			$a->primero		= '<img src="../imagenes/bf.gif" alt="Primero" width="20" height="15" align="absbottom" border="0"/>';
			$a->atras       = '<img src="../imagenes/atras.gif" alt="Atras" width="14" height="15" align="absbottom" border="0"/>';
			$a->siguiente	= '<img src="../imagenes/sigui.gif" alt="Siguiente" width="14" height="15" align="absbottom" border="0"/>';
			$a->ultimo		= '<img src="../imagenes/ff.gif" alt="Ultimo" width="20" height="15" align="absbottom" border="0"/>';
			$a->previousNext("&cod_pred=".$_GET['cod_pred']."&cod_munip=".$_GET['cod_munip']); 
		}
	  ?>
	  </div>
	  </td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>