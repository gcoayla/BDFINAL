<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    echo '<table><tr>
                        <td>Dia</td>
                        <td>Facturado</td>
                    </tr>';
    $qry = "select sum(importe) 'Imp', fecha 'Fecha'
		from factura
		group by fecha
        order by fecha;";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<tr>
                        <td>'.$row['Fecha']->format('Y-m-d').'</td>
                        <td>'.$row['Imp'].'</td>
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