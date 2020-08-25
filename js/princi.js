function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}
function verificar() {
    var sesion = getCookie("sesion");
    if (sesion == null) {
        $(location).attr('href','regis.html');
    }
    else {
        $(location).attr('href','reser.html');
    }
}
function cambiarl() {
    $("#login").css("display","block");
    $("#registro").css("display","none");
}
function cambiarr() {
    $("#registro").css("display","block");
    $("#login").css("display","none");
}
$(document).ready(function() {
    
    $('#login').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/loginreser.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
                if($("#datos").attr("exito")==1){
                    document.cookie = "sesion="+$("#datos").attr("codigo");
                    alert("hola");
                    $(location).attr('href','reser.html');
                }
           }
       });
     });
    $('#registro').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/regreser.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
                if($("#datos").attr("exito")==1){
                    document.cookie = "sesion="+$("#datos").attr("codigo");
                    $(location).attr('href','reser.html');
                }
           }
       });
     });
    $('#reserva').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/reserva.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
           }
       });
     });
});