function mesa(codigo){
    var factura =$("#codigo"+codigo).attr("fact");
    if(factura == "vacio"){
        var parametros = {
                "Cod" : codigo
        };
        $.ajax({
            type: "POST",
            url: 'php/ocupar-mesa.php',
            data:  parametros,
            success: function(response)
            {
                document.cookie = "mesa="+codigo;
                document.cookie = "factura="+response;
                $(location).attr('href','pedidos.html');
           }
       });
    }else if(factura != "vacio"){
        document.cookie = "mesa="+codigo;
        document.cookie = "factura="+factura;
        $(location).attr('href','pedidos.html');
    }
};
$(document).ready(function() {
        document.cookie = "mesero=999";
        $.ajax({
            type: "POST",
            url: 'php/carga-mesas.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#mesas").html(response);
           }
       });
        $('#enviarcodigo').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/val-cod-mesero.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
                if($("#datos").attr("exito")==1){
                    document.cookie = "mesero="+$("#datos").attr("codigo");
                }else if($("#datos").attr("exito")==0){
                    document.cookie = "mesero=999";
                }
           }
       });
     });
});