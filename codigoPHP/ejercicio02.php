<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 02</title>
    </head>

    <body>
        <?php
        /*  @author Cristian Mateos Vega
         *  @since 03/11/2025
         */
        define("HOST", "10.199.8.248");
        define("DBNAME", "DBCMVDWESProyectoTema4");
        define("USERNAME", "userCMVDWESProyectoTema4");
        define("PASSWORD", "paso");
        define("DSN", "mysql:host=" . HOST . "; dbname=" . DBNAME);
        $aAttributes = array('ATTR_AUTOCOMMIT', 'ATTR_CASE', 'ATTR_CLIENT_VERSION', 'ATTR_CONNECTION_STATUS', 'ATTR_DRIVER_NAME', 'ATTR_ERRMODE', 'ATTR_ORACLE_NULLS', 'ATTR_PERSISTENT', 'ATTR_SERVER_INFO', 'ATTR_SERVER_VERSION', 'ATTR_DEFAULT_FETCH_MODE');

        echo '<h3>Conexión a BBDD correctamente: </h3>';
        try {
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            $aConsultas = [
                $miDB->query("SELECT * FROM T02_Departamento")->fetchAll(PDO::FETCH_ASSOC),
                $miDB->query("SELECT COUNT(*) AS 'Total de Registros' FROM T02_Departamento")->fetchAll(PDO::FETCH_ASSOC),
            ];

            echo 'Conectado a la BBDD con éxito';
            echo '<h4>DEPARTAMETOS: </h4>';
            foreach ($aConsultas as $consulta) {
                foreach ($consulta as $registro) {
                    foreach ($registro as $campo => $valor) {
                        if (!is_null($valor)) {
                            echo "$campo: $valor<br>";
                        } else {
                            echo "$campo: No Determinado<br>";
                        }
                    }
                    echo "<br>";
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

