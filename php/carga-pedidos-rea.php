<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$factura = $_COOKIE['factura'];
echo '<div id="nombrepedido">Pedidos realizados</div>
                    <div id="cantidadpedido">Cantidad</div>';
if( $conn ) {
    $qry = "select l.nombre 'Nom', p.cantidad 'Cant'
            from factura f
            inner join pedido p on p.id_factura_factura = f.id_factura
            inner join platillo l on p.id_platillo = l.id_platillo
            where f.id_factura= ".$factura."
            group by f.id_factura;";
    $res = sqlsrv_query( $conn, $qry);
    $row_count=false;
    if($res){
        $row_count = sqlsrv_has_rows( $res );
    }
    if($row_count === true){
        while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
            $Nombre = $row['Nom'];
            $Cantidad = $row['Cant'];
            echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                            <div class="tituloplato">';
            echo '<div id="cajapedido">
                            <div id="infopedido">
                                <h2>'.$Nombre.'</h2>
                            </div>
                            <div id="cantidadpedido">
                                <div id="cantidad">'.$Cantidad.'</div>
                            </div>
                        </div>';
        }
    }else{
        echo "<h3>No se realizo ningun pedido</h3>";
    }
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>