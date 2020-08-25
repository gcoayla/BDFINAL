<?php 
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    $qry = "select id_cliente 'ID'
		from cliente
		where correo='".$_POST['correo']."';";
    $res = sqlsrv_query( $conn, $qry);
    if($res){
        $row_count = sqlsrv_has_rows( $res );
        if($row_count === true){
            echo "<h3 id='datos' exito='0'>Usuario ya existe</h3>";
        }else{
            $qry2 = "INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( '".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['direccion']."','".$_POST['correo']."','".$_POST['contra']."');";
            $res2 = sqlsrv_query( $conn, $qry2);
            echo "<h3 id='datos' exito='1' codigo='".$_POST['correo']."'>Logeando</h3>";
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