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
        require_once '../config/confDBPDO.php';
        $miDB = new PDO(DSN, USERNAME, PASSWORD);

        // Sacar datos de la tabla
        $stmt = $miDB->query("SELECT T02_CodDepartamento, T02_DescDepartamento FROM T02_Departamento");
        $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dom = new DOMDocument();
        $dom->formatOutput = true;

        // Nodo raíz
        $root = $dom->createElement("departamentos");
        $dom->appendChild($root);

        // Crear nodos
        foreach ($departamentos as $dep) {
            $nodoDep = $dom->createElement("departamento");

            $nodoCodigo = $dom->createElement("codigo", $dep["T02_CodDepartamento"]);
            $nodoDesc   = $dom->createElement("descripcion", $dep["T02_DescDepartamento"]);

            $nodoDep->appendChild($nodoCodigo);
            $nodoDep->appendChild($nodoDesc);

            $root->appendChild($nodoDep);
        }
        // Guardar archivo
        $rutaSalida = "../tmp/departamentos.xml";
        $dom->save($rutaSalida);
        echo "<h1>Contenido del archivo</h1>";
        echo "<pre>";
        echo htmlspecialchars(file_get_contents("../tmp/departamentos.xml"));
        echo "</pre>";
    ?>
    </body>

</html>

