<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 05</title>
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
         *  @since 10/11/2025
         */
        define("HOST", "10.199.8.248");
        define("DBNAME", "DBCMVDWESProyectoTema4");
        define("USERNAME", "userCMVDWESProyectoTema4");
        define("PASSWORD", "paso");
        define("DSN", "mysql:host=" . HOST . "; dbname=" . DBNAME);
        $aInserts = [
            "sql" => "INSERT INTO `T02_Departamento` 
        (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
        VALUES ('OIS','Departamento de Música',NOW(),1234.25,NULL)",
            "sql2" => "INSERT INTO `T02_Departamento` 
        (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
        VALUES ('OOS','Departamento de Plastica',NOW(),452.12,NULL)",
            "sql3" => "INSERT INTO `T02_Departamento` 
        (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
        VALUES ('OAS','Departamento de Tecnología',NOW(),1523.25,NULL)"
        ];
        $miDB = new PDO(DSN, USERNAME, PASSWORD);
        try {
            $miDB->beginTransaction();
            echo '<h3>Conexión a BBDD correctamente: </h3>';
            foreach ($aInserts as $nombreInsert => $instruccionInsert) {
                $resultadoConsulta = $miDB->exec($instruccionInsert);
            }

            $miDB->commit(); // Si todo fue bien confirma los cambios
            $sql2 = $miDB->query("SELECT * FROM T02_Departamento WHERE T02_CodDepartamento IN ('LIS','LOS','MAS')")->fetchAll(PDO::FETCH_OBJ);
            echo '<h3 style="color:green;">Departamentos insertados correctamente</h3>';
            echo '<table>';
            echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
            foreach ($sql2 as $registro) {
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
            echo '</table>';
            
        } catch (PDOException $miExceptionPDO) {
            $miDB->rollback(); //Si algo no ha ido bien revierte los cambios
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

