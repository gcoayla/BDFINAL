<?php 
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    $qry = "select p.id_sucursal 'Sucursal'
		from sucursal p
		where p.id_sucursal=".$_POST['nombre'].";";
    $res = sqlsrv_query( $conn, $qry);
    if($res){
        while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
            if($_POST['contra']=='xyz'){
                echo "<h3 id='datos' exito='1' codigo='".$_POST['nombre']."'>Logeando</h3>";
            }else{
                echo "<h3 id='datos' exito='0'>Datos erroneos</h3>";
            }
        }
        sqlsrv_commit( $conn );
    }else{
        echo "<h3 id='datos' exito='0'>Error de servidor</h3>";
        sqlsrv_rollback( $conn );
    }
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>