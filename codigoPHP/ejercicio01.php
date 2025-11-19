<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 01</title>
    </head>

    <body>
        <?php
        /*  @author Cristian Mateos Vega
         *  @since 03/11/2025
         */
        require_once '../config/confDBPDO.php';
        
        $aAttributes = array('ATTR_AUTOCOMMIT', 'ATTR_CASE', 'ATTR_CLIENT_VERSION', 'ATTR_CONNECTION_STATUS', 'ATTR_DRIVER_NAME', 'ATTR_ERRMODE', 'ATTR_ORACLE_NULLS', 'ATTR_PERSISTENT', 'ATTR_SERVER_INFO', 'ATTR_SERVER_VERSION', 'ATTR_DEFAULT_FETCH_MODE');

        echo '<h3>Conexión a BBDD correctamente: </h3>';
        try {
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            echo 'Conectado a la BBDD con éxito';
            echo '<h4>ATRIBUTOS: </h4>';

            foreach ($aAttributes as $nombreAtributo) {
                    $constante = constant("PDO::$nombreAtributo");
                    echo "<b>$nombreAtributo: </b>" . $miDB->getAttribute($constante) . "<br>";
            }
        } catch (PDOException $miExceptionPDO) {
            echo 'Error: ' . $miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: ' . $miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }


        echo '<h3>Conexión a BBDD con error: password incorrecto</h3>';
        try {
            $miDB = new PDO(DSN, USERNAME, "contraseñaErronea");
            echo 'Conectado a la BBDD con éxito';
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