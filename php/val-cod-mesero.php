<?php 
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    $qry = "select p.id_empleado 'ID', p.nombre 'Nom', p.apellidos 'Ape'
		from empleado p
		where p.id_empleado=".$_POST['codigo'].";";
    $res = sqlsrv_query( $conn, $qry);
    if($res){
        $row_count = sqlsrv_has_rows( $res );
        if($row_count === true){
            while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
                $nombre=$row['Nom'];
                $apellidos=$row['Ape'];
                echo "<h3 id='datos' exito='1' codigo='".$_POST['codigo']."'>".$nombre." ".$apellidos."</h3>";
                }
        }else{
            echo "<h3 id='datos' exito='0'>Mesero: Default </h3>";
        }
        sqlsrv_commit( $conn );
    }else{
        echo "<h3 id='datos' exito='0'>Error de servidor </h3>";
        sqlsrv_rollback( $conn );
    }
    
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>