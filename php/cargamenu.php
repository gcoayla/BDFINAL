<?php
$serverName = "LAPTOP-QQB9LBIC";
$connectionInfo = array( "Database"=>"restaurante", "UID"=>"rest", "PWD"=>"1562");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
echo '<div id="categorias">
                    <div class="cajacategoria" onclick="mostrar(1)">Entradas</div>
                    <div class="cajacategoria" onclick="mostrar(2)">Sopas</div>
                    <div class="cajacategoria" onclick="mostrar(3)">Segundos</div>
                    <div class="cajacategoria" onclick="mostrar(4)">Postres</div>
                    <div class="cajacategoria" onclick="mostrar(5)">Bebidas</div>
                </div>';
if( $conn ) {
    echo '<div id="entrada" class="listacat">';
    $qry = "select p.nombre 'Nombre', p.id_platillo 'Codigo'
		from platillo p
		where p.categoria='entrada';";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                        <div class="tituloplato">';
      echo $row['Nombre'];
        echo '</div>
                    </div>';
    }
    echo '</div>';
    echo '<div id="sopa" class="listacat">';
    $qry = "select p.nombre 'Nombre', p.id_platillo 'Codigo'
		from platillo p
		where p.categoria='sopa';";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                        <div class="tituloplato">';
      echo $row['Nombre'];
        echo '</div>
                    </div>';
    }
    echo '</div>';
    echo '<div id="segundo" class="listacat">';
    $qry = "select p.nombre 'Nombre', p.id_platillo 'Codigo'
		from platillo p
		where p.categoria='segundo';";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                        <div class="tituloplato">';
      echo $row['Nombre'];
        echo '</div>
                    </div>';
    }
    echo '</div>';
    echo '<div id="postre" class="listacat">';
    $qry = "select p.nombre 'Nombre', p.id_platillo 'Codigo'
		from platillo p
		where p.categoria='postre';";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                        <div class="tituloplato">';
      echo $row['Nombre'];
        echo '</div>
                    </div>';
    }
    echo '</div>';
    echo '<div id="bebida" class="listacat">';
    $qry = "select p.nombre 'Nombre', p.id_platillo 'Codigo'
		from platillo p
		where p.categoria='bebida';";
    $res = sqlsrv_query( $conn, $qry);
    
    while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_ASSOC) ) {
        echo '<div class="objlista" onclick="agregar('.$row['Codigo'].')">
                        <div class="tituloplato">';
      echo $row['Nombre'];
        echo '</div>
                    </div>';
    }
    echo '</div>';
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>