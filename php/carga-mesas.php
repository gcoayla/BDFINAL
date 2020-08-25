<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$sucursal = $_COOKIE['restaurante'];
if( $conn ) {
    if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
    }
    $qry = "select *
		from mesa m
		where m.codigo_sucursal = ".$sucursal."
		order by m.id_mesa;";
    $res = sqlsrv_query( $conn, $qry);
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        $estado=$row['estado'];
        $id=$row['id_mesa'];
        if($estado==1){
            $qry2 = "select id_factura 'Cod'
            from factura
            where estado= 1 and id_mesa = ".$id.";";
            $res1 = sqlsrv_query( $conn, $qry2);
            while( $row2 = sqlsrv_fetch_array( $res1, SQLSRV_FETCH_ASSOC) ) {
                $factura=$row2['Cod'];
                echo'<div class="mesa mesa1"><div class="mesaint ocupado" onclick="mesa('.$id.')" id="codigo'.$id.'" fact="'.$factura.'">'.$id.'</div></div>';
            }
        }else{
            echo '<div class="mesa mesa1"><div class="mesaint" onclick="mesa('.$id.')" id="codigo'.$id.'" fact="vacio">'.$id.'</div></div>';
        }
    }
    if($res){
        sqlsrv_commit( $conn );
    }else{
        echo "Error de servidor.<br />";
        sqlsrv_rollback( $conn );
    }
    
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>