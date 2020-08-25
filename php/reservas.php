<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d");
if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    echo '<table><tr>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Comensales</td>
                        <td>Correo</td>
                        <td>Nombre</td>
                    </tr>';
    $qry = "select r.fecha , r.hora, r.n_comenzales, c.correo, c.nombre
		from reserva r
        inner join cliente c on c.id_cliente = r.id_cliente
        where r.fecha >= '".$hoy."'
        order by r.fecha,r.hora;";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<tr>
                        <td>'.$row['fecha']->format('Y-m-d').'</td>
                        <td>'.$row['hora']->format('H:m').'</td>
                        <td>'.$row['n_comenzales'].'</td>
                        <td>'.$row['correo'].'</td>
                        <td>'.$row['nombre'].'</td>
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