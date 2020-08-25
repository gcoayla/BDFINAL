$(document).ready(function() {
    $.ajax({
            type: "POST",
            url: 'php/total.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#total").html(response);
           }
       });
    $.ajax({
            type: "POST",
            url: 'php/emple.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#emple").html(response);
           }
       });
    $.ajax({
            type: "POST",
            url: 'php/reservas.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#reservas").html(response);
           }
       });
});