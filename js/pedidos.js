function mostrar(numero){
            if(numero==1){
                $( "#entrada" ).css( "display", "block" );
                $( "#sopa" ).css( "display", "none" );
                $( "#segundo" ).css( "display", "none" );
                $( "#postre" ).css( "display", "none" );
                $( "#bebida" ).css( "display", "none" );
            }else if(numero==2){
                $( "#entrada" ).css( "display", "none" );
                $( "#sopa" ).css( "display", "block" );
                $( "#segundo" ).css( "display", "none" );
                $( "#postre" ).css( "display", "none" );
                $( "#bebida" ).css( "display", "none" );
            }else if(numero==3){
                $( "#entrada" ).css( "display", "none" );
                $( "#sopa" ).css( "display", "none" );
                $( "#segundo" ).css( "display", "block" );
                $( "#postre" ).css( "display", "none" );
                $( "#bebida" ).css( "display", "none" );
            }else if(numero==4){
                $( "#entrada" ).css( "display", "none" );
                $( "#sopa" ).css( "display", "none" );
                $( "#segundo" ).css( "display", "none" );
                $( "#postre" ).css( "display", "block" );
                $( "#bebida" ).css( "display", "none" );
            }else if(numero==5){
                $( "#entrada" ).css( "display", "none" );
                $( "#sopa" ).css( "display", "none" );
                $( "#segundo" ).css( "display", "none" );
                $( "#postre" ).css( "display", "none" );
                $( "#bebida" ).css( "display", "block" );
            }
        };
function cerrar(){
        var parametros = {
                "Cod" : "hola"
        };
        $.ajax({
            type: "POST",
            url: 'php/cerrar-mesa.php',
            data:  parametros,
            success: function(response)
            {   
                if(response=="error"){
                    alert("Error de servidor");
                }
                $(location).attr('href','index.html');
           }
       });
};
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
$(document).ready(function() {
    $( "#entrada" ).css( "display", "block" );
    $( "#sopa" ).css( "display", "none" );
    $( "#segundo" ).css( "display", "none" );
    $( "#postre" ).css( "display", "none" );
    $( "#bebida" ).css( "display", "none" );
    var mesa=getCookie("mesa");
    $("#idmesa").html("<h3>Mesa #"+mesa+"</h3>");
    $.ajax({
            type: "POST",
            url: 'php/cargamenu.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#menurest").html(response);
                mostrar(1);
           }
       });
    $.ajax({
            type: "POST",
            url: 'php/carga-pedidos-rea.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#pedidosrealizados").html(response);
           }
       });
});