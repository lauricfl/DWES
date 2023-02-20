$(document).ready(function () {
  $.ajax({
        type: "post",
        url: "./index.php",
        data: $(this).serialize(),
        success: function (response) {
            response = response.split("[");
            console.log(response[1]);
            console.log(typeof response);
            
        }
    }); 

     $('#datos').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./index.php?action=add",
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                // Recibo el JSON con los productos, que extraigo a un array
                const pixels = JSON.parse(response);
                //Pintar todos los pixeles
                pixels.forEach(element => {
                    $("#"+element[0]+"-"+element[1]).css('background-color', element[2]);
                });
            }
        });
    }); 
});