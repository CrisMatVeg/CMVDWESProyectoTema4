<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 08</title>
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
        // Conexión
        $conexion = new PDO(
            "mysql:host=localhost;dbname=DBCMVDWESProyectoTema4;charset=utf8",
            "userCMVDWESProyectoTema4",
            "paso"
        );

        // Sacar datos de la tabla
        $stmt = $conexion->query("SELECT T02_CodDepartamento, T02_DescDepartamento FROM T02_Departamento");
        $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Crear escritor XML
        $xml = new XMLWriter();
        $xml->openURI('/tmp/departamento.xml');
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement('departamentos');

        foreach ($departamentos as $dep) {
            $xml->startElement('departamento');

            $xml->writeElement('codigo', $dep["T02_CodDepartamento"]);
            $xml->writeElement('descripcion', $dep["T02_DescDepartamento"]);

            $xml->endElement();
        }

        $xml->endElement(); // departamentos
        $xml->endDocument();

        echo "Exportación realizada correctamente.";
    ?>
    </body>

</html>

