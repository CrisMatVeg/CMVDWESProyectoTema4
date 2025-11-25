<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 04</title>
        <style>
            .required{
                background-color: rgb(255, 255, 174);
            }
            input:disabled{
                background-color: lightgrey;
            }

            * {
                font-family: sans-serif;
            }

            body {
                justify-content: center;
                justify-items: center;
            }

            div {
                padding: 20px;
                width: 50vw;
                height: auto;
                background-color: lightskyblue;
                border-radius: 20px;
            }

            #enviar {
                border-radius: 20px;
                height: 30px;
                width: 120px;
                background-color: lightgreen;
                border: 2px solid rgb(55, 55, 95);
                font-weight: bold;
            }

            label,p{
                font-weight: bold;
            }
            input{
                height: 20px;
                border-radius: 3px;
                border-style: none;
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
        require_once '../core/231018libreriaValidacion.php';
//Inicialización de variables
        $entradaOK = true;
        $aErrores = [
            'descripcion' => '',
        ];
        $aRespuestas = [
            'descripcion' => '',
        ];
        require_once '../config/confDBPDO.php';
        $descripcion = null;
        $sql = null;
        $miDB = new PDO(DSN, USERNAME, PASSWORD);
// Comprobar si el formulario se ha enviado

        if (isset($_REQUEST['enviar'])) {
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 1, 0);
            if (empty($aErrores['descripcion']) && preg_match('/[0-9]/', $_REQUEST['descripcion'])) {
                $aErrores['descripcion'] = 'El campo solo puede contener letras (sin números).';
            }
            foreach ($aErrores as $campo => $valor) {
                if ($valor != null) { // Si ha habido algun error $entradaOK es falso.
                    $entradaOK = false;
                }
            }
        } else {
            // Formulario no enviado aún
            $entradaOK = false;
        }
// Tratamiento del formulario
        ?>
        <h1>FORMULARIO: BUSQUEDA DE DEPARTAMENTOS</h1>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="descripcion">Buscar Departamento de:</label>
                <input type="text" name="descripcion" id="descripcion" value="<?php echo(empty($aErrores['descripcion'])) ? ($_REQUEST['descripcion'] ?? '') : ''; ?>">
                <span style="color:red;"><?php echo $aErrores['descripcion']; ?></span>

                <input type="submit" name="enviar" value="Buscar" id="enviar">
            </form>
        </div>
        <?php
        if ($entradaOK) {
            foreach ($aRespuestas as $campo => $valor) {
                $aRespuestas[$campo] = $_REQUEST[$campo];
            }
            $descripcion = $aRespuestas['descripcion'];

            try {
                echo '<h3>RESULTADO DE BUSQUEDA: </h3>';

//=======================================================     CONSULTA NORMAL    ============================================================

                if (empty($aRespuestas['descripcion'])) {
                    $sql = $miDB->query("SELECT * FROM T02_Departamento")->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $sql = $miDB->query("SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descripcion}%'")->fetchAll(PDO::FETCH_OBJ);
                }
                echo '<table>';
                echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
                
//======================================================     CONSULTA PREPARADA   ============================================================  
            /* 
                if (empty($aRespuestas['descripcion'])) {
                    $consulta = $miDB->prepare("SELECT * FROM T02_Departamento");
                    $consulta->execute();
                    $sql = $consulta->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $consulta = $miDB->prepare("
                        SELECT *
                        FROM T02_Departamento
                        WHERE T02_DescDepartamento LIKE :descripcion
                    ");

                    $param = "%" . $descripcion . "%";
                    $consulta->bindValue(':descripcion', $param);

                    $consulta->execute();
                    $sql = $consulta->fetchAll(PDO::FETCH_OBJ);
                }   
                echo '<table>';
                echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>'; 
            */     
//============================================================================================================================================     

                // Con fetchAll() uso foreach() porque devuelve un array con todas las filas
                foreach ($sql as $registro) {
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

                // Con fetch() usaría while() porque devuelve una unica fila y hay que recorrer todas las filas
                /*
                    while ($registro = $sql->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    foreach (get_object_vars($registro) as $campo => $valor) {
                        if (!is_null($valor)) {
                            echo "<td>$valor</td>";
                        } else {
                            echo "<td>$campo: No Determinado</td>";
                        }
                    }
                    echo "</tr>";
                } */

                echo '</table>';
            } catch (PDOException $miExceptionPDO) {
                echo 'Error: ' . $miExceptionPDO->getMessage();
                echo '<br>';
                echo 'Código de error: ' . $miExceptionPDO->getCode();
            } finally {
                unset($miDB);
            }
        }else{
            echo '<h3>CONTENIDO DE LA TABLA: </h3>';
            $sql = $miDB->query("SELECT * FROM T02_Departamento")->fetchAll(PDO::FETCH_OBJ);
            echo '<table>';
            echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
            foreach ($sql as $registro) {
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
        }
        ?>
    </body>
</html>