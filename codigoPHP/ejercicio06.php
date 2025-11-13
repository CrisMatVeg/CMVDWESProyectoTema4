<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 06</title>
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
         *  @since 13/11/2025
         */
        define("HOST", "10.199.8.248");
        define("DBNAME", "DBCMVDWESProyectoTema4");
        define("USERNAME", "userCMVDWESProyectoTema4");
        define("PASSWORD", "paso");
        define("DSN", "mysql:host=" . HOST . "; dbname=" . DBNAME);
        $codigoDepartamento=null;
        $departamentosnuevos = array(
            array(":T02_CodDepartamento" => "DDD", ":T02_DescDepartamento" => "Departamento de DDD", ":T02_VolumenDeNegocio" => 154.24),
            array(":T02_CodDepartamento" => "EEE", ":T02_DescDepartamento" => "Departamento de EEE", ":T02_VolumenDeNegocio" => 4573.2),
            array(":T02_CodDepartamento" => "FFF", ":T02_DescDepartamento" => "Departamento de FFF", ":T02_VolumenDeNegocio" => 124.54)
        );
        $miDB = new PDO(DSN, USERNAME, PASSWORD);
        $sql = $miDB->prepare("INSERT INTO T02_Departamento (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
        VALUES (:T02_CodDepartamento,:T02_DescDepartamento,now(),:T02_VolumenDeNegocio,null)");
        $sql2 = $miDB->prepare("SELECT * FROM T02_Departamento WHERE T02_CodDepartamento = :T02_CodDepartamento");
        try {
            echo '<table>';
            echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
            foreach ($departamentosnuevos as $departamento) {
                $codigoDepartamento = $departamento[':T02_CodDepartamento'];
                echo '<tr>';
                if ($sql->execute($departamento)) {
                        $sql2->bindParam(':T02_CodDepartamento', $codigoDepartamento);
                        $sql2->execute();
                        $resultadosql2=$sql2->fetchAll(PDO::FETCH_OBJ);
                        foreach ($resultadosql2 as $registro) {
                            echo '<tr>';
                            foreach (get_object_vars($registro) as $campo => $valor) {
                                if (!is_null($valor)) {
                                    echo "<td>$valor</td>";
                                } else {
                                    echo "<td>No Determinado</td>";
                                }
                            }
                            echo "</tr>";
                        }
                } else {
                    echo "<td>No Determinado</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
        } catch (PDOException $miExceptionPDO) {
            echo '<h3 style="color:red;">Departamentos no insertados</h3>';
            echo 'Error: ' . $miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: ' . $miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }
        ?>
    </body>

</html>

