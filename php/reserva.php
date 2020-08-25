<?php 
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$sesi = $_COOKIE['sesion'];
$sesi2=$sesi;
if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    $qry = "SELECT * FROM cliente WHERE correo = '".$sesi."'";
    $res = sqlsrv_query( $conn, $qry);
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
                $sesi2=$row['id_cliente'];
            }
    $qry2 = "INSERT INTO reserva(fecha,hora,n_comenzales,id_cliente) VALUES ( '".$_POST['fecha']."','".$_POST['hora']."','".$_POST['nume']."','".$sesi2."');";
    $res2 = sqlsrv_query( $conn, $qry2);
    if($res2){
        echo "<h3 id='datos' exito='0'>Reserva exitosa</h3>";
        sqlsrv_commit( $conn );
    }else{
        echo "<h3 id='datos' exito='0'>Error en el registro</h3>";
        sqlsrv_rollback( $conn );
    }
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>