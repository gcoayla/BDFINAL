<?php 
    $codigo=$_POST['Cod'];
    $mesero = $_COOKIE['mesero'];
    $mesa = $_COOKIE['mesa'];
    $sucursal = $_COOKIE['restaurante'];
    date_default_timezone_set('America/Bogota');
    $hoy = date("m-d-Y");
    $hora = date("H:i");
    $serverName = "LAPTOP-QQB9LBIC";
    $connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        if ( sqlsrv_begin_transaction( $conn ) === false ) {
         die( print_r( sqlsrv_errors(), true ));
        }
        $qry = "INSERT INTO factura (hora, importe, fecha, nombre,id_empleado, estado, id_mesa ) VALUES('".$hora."',0,'".$hoy."',' ',".$mesero.",1,".$mesa.");";
        $qry2 = "UPDATE mesa SET estado=1 WHERE id_mesa=".$codigo.";";
        $qry3 = "SELECT id_factura FROM factura
                WHERE estado = 1 and id_mesa = ".$mesa.";";
        $res = sqlsrv_query( $conn, $qry);
        $res2 = sqlsrv_query( $conn, $qry2);
        $res3 = sqlsrv_query( $conn, $qry3);
        
        while( $row = sqlsrv_fetch_array( $res3, SQLSRV_FETCH_ASSOC) ) {
            $idfact=$row['id_factura'];
            echo $idfact;
        }
        if($res && $res2 && $res3){
            sqlsrv_commit( $conn );
        }else{
            sqlsrv_rollback( $conn );
        }
        
    }else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>