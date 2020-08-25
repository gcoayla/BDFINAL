<?php 
    $factura = $_COOKIE['factura'];
    $mesa = $_COOKIE['mesa'];
    $serverName = "LAPTOP-QQB9LBIC";
    $connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        if ( sqlsrv_begin_transaction( $conn ) === false ) {
         die( print_r( sqlsrv_errors(), true ));
        }
        $total=0;
        $qry = "select l.precio 'Pre', p.cantidad 'Cant' from pedido p
                inner join platillo l on p.id_platillo = l.id_platillo
                where p.id_factura_factura=".$factura.";";
        $res = sqlsrv_query( $conn, $qry);
        while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
            $pre=$row['Pre'];
            $cant=$row['Cant'];
            $sub=$pre*$cant;
            $total=$total+$sub;
        }
        $qry2 = "UPDATE mesa SET estado=0 WHERE id_mesa=".$mesa.";";
        $qry3 = "UPDATE factura SET estado=0, importe=".$total." WHERE id_factura=".$factura.";";
        $res2 = sqlsrv_query( $conn, $qry2);
        $res3 = sqlsrv_query( $conn, $qry3);
        if($res && $res2 && $res3){
            sqlsrv_commit( $conn );
        }else{
            echo "error";
            sqlsrv_rollback( $conn );
        }
        
    }else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>