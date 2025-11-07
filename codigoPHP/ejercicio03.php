<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 03</title>
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
        </style>
    </head>

    <body>
        <?php
        /*  @author Cristian Mateos Vega
         *  @since 03/11/2025
         */
        require_once '../core/231018libreriaValidacion.php';
//Inicialización de variables
        $entradaOK = true;
        define("HOST", "10.199.8.248");
        define("DBNAME", "DBCMVDWESProyectoTema4");
        define("USERNAME", "userCMVDWESProyectoTema4");
        define("PASSWORD", "paso");
        define("DSN", "mysql:host=" . HOST . "; dbname=" . DBNAME);
        $aErrores = [
            'codigo' => '',
            'descripcion' => '',
            'volumenDeNegocio' => '',
        ];
        $aRespuestas = [
            'codigo' => '',
            'descripcion' => '',
            'volumenDeNegocio' => '',
        ];
        $sql = "INSERT INTO `T02_Departamento` 
(`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
VALUES (
    '{$aRespuestas['codigo']}',
    '{$aRespuestas['descripcion']}',
    NOW(),
    {$aRespuestas['volumenDeNegocio']},
    NULL
)";
        $codigo = addslashes($aRespuestas['codigo']);
        $yaInsertado = false;
// Comprobar si el formulario se ha enviado

        if (isset($_REQUEST['enviar'])) {
            $aErrores['codigo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['codigo'], 3, 3, 1);
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 1, 1);
            $aErrores['volumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenDeNegocio'], PHP_FLOAT_MAX, 1, 1);

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
        <h1>FORMULARIO: CREACION DE DEPARTAMENTO</h1>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="codigo">Codigo (3 letras):</label><br>
                <input type="text" name="codigo" id="codigo" class="required" value="<?php echo(empty($aErrores['codigo'])) ? ($_REQUEST['codigo'] ?? '') : ''; ?>">
                <span style="color:red;"><?php echo $yaInsertado == true ? "No se puede agregar un departamento con ese codigo, ya existe" : $aErrores['codigo']; ?></span><br><br>

                <label>Descripción (Max 255 caracteres)</label><br><br>
                <textarea name="descripcion" class="required"><?php echo(empty($aErrores['descripcion'])) ? ($_REQUEST['descripcion'] ?? '') : ''; ?></textarea>
                <span style="color:red;"><?php echo $aErrores['descripcion']; ?></span><br>

                <label for="fechaCreacion">Fecha de Creación:</label><br>
                <input type="date" name="fechaCreacion" id="fechaCreacion" disabled><br><br>

                <label for="volumenDeNegocio">Volumen de Negocio (Número Real):</label><br>
                <input type="float" name="volumenDeNegocio" id="volumenDeNegocio" class="required" value="<?php echo(empty($aErrores['volumenDeNegocio'])) ? ($_REQUEST['volumenDeNegocio'] ?? '') : ''; ?>">
                <span style="color:red;"><?php echo $aErrores['volumenDeNegocio']; ?></span><br><br>

                <label for="fechaBaja">Fecha de Baja:</label><br>
                <input type="date" name="fechaBaja" id="fechaBaja" disabled><br><br>

                <input type="submit" name="enviar" value="Enviar" id="enviar">
            </form>
        </div>
        <?php
        if ($entradaOK) {
            foreach ($aRespuestas as $campo => $valor) {
                $aRespuestas[$campo] = $_REQUEST[$campo];
            }
            //Mostrar respuestas con datos (correctos) introducidos
            echo "<h2>Formulario enviado correctamente</h2>";
            echo "<div>";
            print("<br><h3>Respuestas</h3><br>");
            foreach ($aRespuestas as $campo => $valor) {
                print("$campo del departamento : " . $valor . '</br>');
            }
            echo "</div>";

            echo '<h3>Conexión a BBDD correctamente: </h3>';
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            $sql2 = $miDB->query("SELECT * FROM T02_Departamento WHERE T02_CodDepartamento='%{$codigo}%'")->fetchAll(PDO::FETCH_ASSOC);
            try {
                echo '<h4>INSERCIÓN: </h4>';
                if (empty($sql2)) {
                    $yaInsertado=true;
                }
                if ($miDB->exec($sql) == 1) {
                    echo 'Departamento insertado correctamente';
                }
                if (!$yaInsertado) {
                    echo '<table>';
                    echo '<tr id="titulotabla"><td>Codigo de Departamento</td><td>Descripción</td><td>Fecha de Creación</td><td>Volumen de Negocio</td><td>Fecha de Baja</td></tr>';
                    foreach ($sql as $registro) {
                        echo '<tr>';
                        foreach ($registro as $campo => $valor) {
                            if (!is_null($valor)) {
                                echo "<td>$valor</td>";
                            } else {
                                echo "<td>$campo: No Determinado</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    echo '</table>';
                }
            } catch (PDOException $miExceptionPDO) {
                echo 'Error: ' . $miExceptionPDO->getMessage();
                echo '<br>';
                echo 'Código de error: ' . $miExceptionPDO->getCode();
                echo '<br>';
                echo '<b>PUEDE QUE ESE DEPARTAMENTO YA EXISTA</b>';
            } finally {
                unset($miDB);
            }
        } else {
            // Mostrar formulario y mensajes de error (si los hay)
        }
        ?>
    </body>
</html>