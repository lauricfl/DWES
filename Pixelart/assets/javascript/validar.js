$(document).ready(function () {
    $('#datos').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./index.php?action=add",
            data: $(this).serialize(),
            success: function (response) {
                // Recibo el JSON con los productos, que extraigo a un array
                const arr = JSON.parse(response);
                console.log("ksdjhfksd");
                console.log($(this));
                /* // Ahora debo sustituir el contenido de la vista ya cargada con los productos del array, igual que hace renderProductsTable()
                // Primero vacío el cuerpo de la tabla por completo
                $("#products_table > tbody").empty();
                // Luego añado cada una de las líneas con el contenido del array
                arr.forEach(element => {
                    $('#products_table > tbody').append('<tr><td>' + element['cantidad'] + '</td><td>' + element['producto'] + '</td></tr>');
                });
                // Y vacío los campos de inserción de nuevos productos
                $('#cantidad').val('0');
                $('#producto').val(null);   // val('') no vacía */
            }
        });
    });
});