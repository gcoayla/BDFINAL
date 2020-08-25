<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    echo '<table><tr>
                        <td>ID</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Tipo</td>
                        <td>Turno inicio</td>
                        <td>Turno fin</td>
                    </tr>';
    $qry = "select *
		from empleado where activo=1";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<tr>
                        <td>'.$row['id_empleado'].'</td>
                        <td>'.$row['nombre'].'</td>
                        <td>'.$row['apellidos'].'</td>
                        <td>'.$row['tipo'].'</td>
                        <td>'.$row['hora_inicio']->format('H:m').'</td>
                        <td>'.$row['hora_fin']->format('H:m').'</td>
                    </tr>';
    }
    echo '</table>';
    if($res){
        sqlsrv_commit( $conn );
    }else{
        sqlsrv_rollback( $conn );
    }
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>