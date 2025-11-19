<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 02</title>
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
        /*  @author Cristian Mateos Vega
         *  @since 03/11/2025
         */
        require_once '../config/confDBPDO.php';
        try {
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            // Consulta para sacar todos los registros de la tabla de departamentos
            $sql = $miDB->query("SELECT * FROM T02_Departamento")->fetchAll(PDO::FETCH_OBJ);
            // Consulta para sacar el número de registros de la tabla de departamentos
            $sql2 = $miDB->query("SELECT COUNT(*) AS 'Total de Registros' FROM T02_Departamento")->fetchAll(PDO::FETCH_OBJ);

            echo '<h3>Conexión a BBDD correctamente: </h3>';
            echo '<h4>DEPARTAMETOS: </h4>';
            echo '<table>';
            echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
            
            foreach ($sql as $registro) {
                echo '<tr>';
                foreach (get_object_vars($registro) as $campo => $valor) {
                    if (!is_null($valor)) {
                        echo "<td>$valor</td>";
                    } else {
                        echo "<td>$campo: No Determinado</td>";
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            

            foreach ($sql2 as $registro) {
                foreach (get_object_vars($registro) as $campo => $valor) {
                    echo "<h4>";
                    echo is_null($valor) ? "$campo: No Determinado<br>" : "$campo: $valor<br>";
                    echo "</h4>";
                }
            }
        } catch (PDOException $miExceptionPDO) {
            echo 'Error: ' . $miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: ' . $miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }
        ?>
    </body>

</html>

