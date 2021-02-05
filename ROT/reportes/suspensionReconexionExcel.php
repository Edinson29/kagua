<?php
    require "../../archivos/comun.inc";
    if(isset($_POST['crear'])){
        #Se capturan las variables obtenidas de suspensionReconexion.php
        $repo = $_POST['repo'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];

        # se parte la fecha de tal manera que los dias, meses y años queden guardados en las variables
        # $dia, $mes, $ano, $dia_, $mes_, $ano
        # Esto se hace para poder hacer la consulta del rango de fecha solicitado por el usuario
        list($ano, $mes, $dia) 		= explode('-',$inicio);
        list($ano_, $mes_, $dia_) 	= explode('-',$fin);

        # Esta formula se utiliza para calcular los dias de diferencia entre las dos fechas
        $fi = strtotime($inicio);
        $ff = strtotime($fin);
        $totalSecondsDiff = abs($fi-$ff);
        $totalMinutesDiff = $totalSecondsDiff/60;
        $totalHoursDiff   = $totalSecondsDiff/60/60;
        $totalDaysDiff    = $totalSecondsDiff/60/60/24;
        $post = empty($repo) || empty($inicio) || empty($fin);

        if($post){
            echo $script = "<script type='text/javascript'>
                alert('Debe llenar todos los datos')
                location.href = 'suspensionReconexion.php'
            </script>";
        }else if($totalDaysDiff > 29){
            echo $script = "<script type='text/javascript'>
                alert('El rango maximo de dias es 30')
                location.href = 'suspensionReconexion.php'
            </script>";
        }else if($inicio > $fin){
            echo $script = "<script type='text/javascript'>
                alert('La fecha de inico debe ser menor a la fecha final')
                location.href = 'suspensionReconexion.php'
            </script>";
        }else{
            if($repo == 'SUP RCX'){
                list($sup, $rcx) = explode(' ', $repo);
                # Query basico para consultar una sola tabla
                $query = "SELECT 
                        T.cod_otrb AS OT,
                        T.cod_solicitud AS Solicitud,
                        tq.descripcion AS TipoOT,
                        T.cod_pred AS Matricula,
                        s.nom_clte AS Cliente,
                        t.direccion_clte AS Direccion,
                        t.fecha_grab AS Fechaderegistro,
                        t.fecha_ini_trb AS Fechainicio,
                        t.fecha_pre_cierre AS Fechaprecierre,
                        t.fecha_cierre AS Fechacierre,
                        s.descripcion AS DescripcionOT,
                        c.nombre AS Contratista,
                        e.nombre AS Empleado,
                        ta.descripcion AS Tipoarreglo,
                        T.descripcion AS Obsresultado,
                        CASE
                            s.estado 
                            WHEN 'P' THEN
                            'Planificada' 
                            WHEN 'C' THEN
                            'Confirmada' 
                            WHEN 'R' THEN
                            'Realizada'
                            WHEN 'E' THEN
                            'Ejecutada'
                            WHEN 'A' THEN
                            'Anulada'
                            ELSE'' 
                        END AS Estado
                    FROM
                        public.orden_trabajo
                        T INNER JOIN public.solicitud s ON ( T.cod_solicitud = s.cod_soli )
                        LEFT JOIN public.tipo_queja tq ON ( T.cod_tque = tq.cod_tque )
                        LEFT JOIN public.predio P ON ( T.cod_pred = P.cod_pred )
                        LEFT JOIN public.contratista c ON (t.cod_cont_rea = c.cod_cont)
                        LEFT JOIN public.empleado e ON (t.cod_empl_rea = e.cod_empl)
                        LEFT JOIN public.tipo_arreglo ta ON (ta.cod_tarr = t.cod_tarr)
                    WHERE
                        t.cod_tque IN ('$rcx','$sup') 
                        AND fecha_grab BETWEEN '".$ano."-".$mes."-".$dia." 00:00:00'
                        AND '".$ano_."-".$mes_."-".$dia_." 24:00:00'
                    ORDER BY
                        OT
                ";
            }else{
                $query = "SELECT 
                    T.cod_otrb AS OT,
                    T.cod_solicitud AS Solicitud,
                    tq.descripcion AS TipoOT,
                    T.cod_pred AS Matricula,
                    s.nom_clte AS Cliente,
                    t.direccion_clte AS Direccion,
                    t.fecha_grab AS Fechaderegistro,
                    t.fecha_ini_trb AS Fechainicio,
                    t.fecha_pre_cierre AS Fechaprecierre,
                    t.fecha_cierre AS Fechacierre,
                    s.descripcion AS DescripcionOT,
                    c.nombre AS Contratista,
                    e.nombre AS Empleado,
                    ta.descripcion AS Tipoarreglo,
                    T.descripcion AS Obsresultado,
                    CASE
                        s.estado 
                        WHEN 'P' THEN
                        'Planificada' 
                        WHEN 'C' THEN
                        'Confirmada' 
                        WHEN 'R' THEN
                        'Realizada' 
                        WHEN 'E' THEN
                        'Ejecutada' 
                        WHEN 'A' THEN
                        'Anulada' 
                        ELSE'' 
                    END AS Estado
                FROM
                    public.orden_trabajo
                    T INNER JOIN public.solicitud s ON ( T.cod_solicitud = s.cod_soli )
                    LEFT JOIN public.tipo_queja tq ON ( T.cod_tque = tq.cod_tque )
                    LEFT JOIN public.predio P ON ( T.cod_pred = P.cod_pred )
                    LEFT JOIN public.contratista c ON (t.cod_cont_rea = c.cod_cont)
                    LEFT JOIN public.empleado e ON (t.cod_empl_rea = e.cod_empl)
                    LEFT JOIN public.tipo_arreglo ta ON (ta.cod_tarr = t.cod_tarr)
                WHERE
                    t.cod_tque IN ('$repo')
                    AND fecha_grab BETWEEN '".$ano."-".$mes."-".$dia." 00:00:00'
                    AND '".$ano_."-".$mes_."-".$dia_." 24:00:00'
                ORDER BY
                    OT";
                
            }
            # Ejecuta la consulta
            $rs = odbc_exec($conexion, $query);
            $container = "<table>";
            # se colocan los encabezados
            $container .= "<tr>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>OT</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>SOLICITUD</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>TIPO OT</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>MATRICULA</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>CLIENTE</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>DIRECCION</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>FECHA DE REGISTRO</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>FECHA INICIO</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>FECHA PRECIERRE</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>FECHA CIERRE</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>DESCRIPCION OT</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>CONTRASTISTA</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>EMPLEADO</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>TIPO ARREGLO</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>OBS. RESULTADO</th>
                <th style='background-color: #74d8fb; border: 0.5pt solid #000; text-align: center;'>ESTADO</th>
            </tr>";
            # Se muestran los resultados con el ciclo while
            while($rw = odbc_fetch_array($rs)){
                $container .= "<tr>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['ot']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['solicitud']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['tipoot']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['matricula']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['cliente']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['direccion']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['fechaderegistro']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['fechainicio']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['fechaprecierre']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['fechacierre']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['descripcionot']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['contratista']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['empleado']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['tipoarreglo']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['obsresultado']."</td>
                    <td style='border: 0.5pt solid #000; text-align: center;'>".$rw['estado']."</td>
                </tr>";
            }
            $container .= "</table>";
            $repo = strtolower($repo);
            # Los headers hacen que la tabla sea exportada a excel
            header ("Content-type: application/x-msdownload");
            header ("Content-Disposition: attachment; filename=\"reporte de $repo.xls\"");
            print $container;
        }
    }
?>