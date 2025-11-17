<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 07</title>
        <style>
            * {
                font-family: sans-serif;
            }

            body {
                justify-content: center;
                justify-items: center;
            }
            table{
                border-collapse:collapse;
            }
            #titulotabla{
                text-align: center;
                background-color: lightskyblue;
                font-weight: bold;
            }
            td{
                padding: 5px;
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
    <?php
        // Conexión a la base de datos
        $conexion = new PDO(
            "mysql:host=localhost;dbname=DBCMVDWESProyectoTema4;charset=utf8",
            "userCMVDWESProyectoTema4",
            "paso"
        );

        $ruta = "/tmp/departamentos.xml";

        // Cargar XML
        $xml = simplexml_load_file($ruta);

        foreach ($xml->departamento as $dep) {
            $codigo = (string)$dep->codigo;
            $descripcion = (string)$dep->descripcion;

            $sql = "INSERT INTO T02_Departamento
                    (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio)
                    VALUES (:cod, :desc, NOW(), 0)";

            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ":cod" => $codigo,
                ":desc" => $descripcion
            ]);
        }

        echo "Importación realizada correctamente.";
    ?>
    </body>

</html>

