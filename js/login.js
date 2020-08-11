$(document).ready(function() {
        $('#login-rest').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/login-rest.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
                if($("#datos").attr("exito")==1){
                    document.cookie = "restaurante="+$("#datos").attr("codigo");
                    $(location).attr('href','index.html');
                }else{
                    
                }
                
           }
       });
     });
});