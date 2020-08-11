<?php 
    $codigo=$_POST['Cod'];
    $mesero = $_COOKIE['mesero'];
    date_default_timezone_set('America/Bogota');
    $hoy = date("Y-m-d");
    $hora = date("H:i");
    $serverName = "LAPTOP-QQB9LBIC";
    $connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        $qry = "INSERT INTO factura (hora, importe, fecha, nombre,id_empleado, estado ) VALUES('".$hora."',0,'."$hoy".',' ',."$hoy".$mesero,1);";
        $qry2 = "UPDATE mesa SET estado=1 WHERE id_mesa=".$codigo.";";
    $res = sqlsrv_query( $conn, $qry);
    }else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
    echo "1";
?>