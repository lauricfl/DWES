<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" src="{direccion_css}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>P1X3L4RT</title>
</head>
<style>
    body {
        text-align: center;
        background: linear-gradient(90deg, rgba(246, 95, 45, 1) 0%, rgba(7, 123, 184, 1) 11%, rgba(199, 235, 96, 1) 17%, rgba(76, 194, 72, 1) 22%, rgba(104, 7, 69, 1) 28%, rgba(9, 9, 121, 1) 35%, rgba(162, 31, 213, 1) 41%, rgba(228, 35, 143, 1) 47%, rgba(199, 154, 17, 1) 53%, rgba(82, 173, 6, 1) 60%, rgba(16, 48, 161, 1) 67%, rgba(109, 53, 187, 1) 74%, rgba(223, 43, 171, 1) 80%, rgba(59, 126, 218, 1) 86%, rgba(42, 229, 205, 1) 90%, rgba(0, 212, 255, 1) 100%);
        color: white;
    }

    #tablero {
        width: 50%;
        margin: auto;
    }
</style>

<body>
    <header>
        <h1>P1X3L4RT</h1>
    </header>
    <main>
        <table id="tablero"></table>
    </main>

    <script>
        let fragmento = document.createDocumentFragment();

        for (let index = 0; index < 32; index++) {
            let fila = document.createElement("tr");
            for (let index = 0; index < 32; index++) {
                let td = document.createElement("td");
                td.innerHTML = "<input type='color'>";
                fila.append(td);

            }
            fragmento.append(fila);
        }
        document.getElementById("tablero").append(fragmento);
    </script>
</body>

</html>