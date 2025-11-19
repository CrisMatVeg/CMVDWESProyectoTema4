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
        require_once '../config/confDBPDO.php';
        require_once '../core/231018libreriaValidacion.php';
//Inicialización de variables
        $entradaOK = true;
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
        $codigo = null;
        $miDB = new PDO(DSN, USERNAME, PASSWORD);
        $sql = null;
        $sql2 = null;
        $codigo = null;
// Comprobar si el formulario se ha enviado

        if (isset($_REQUEST['enviar'])) {
            $aErrores['codigo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['codigo'], 3, 3, 1);
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 1, 1);
            $aErrores['volumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenDeNegocio'], PHP_FLOAT_MAX, 1, 1);
            //Si el codigo no tiene algun otro error validado se comprueba si el codigo introducido tiene numeros o solo letras
            if (empty($aErrores['codigo']) && preg_match('/[0-9]/', $_REQUEST['codigo'])) {
                $aErrores['codigo'] = 'El campo solo puede contener letras (sin números).';
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
        <h1>FORMULARIO: CREACION DE DEPARTAMENTO</h1>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="codigo">Codigo (3 letras):</label><br>
                <input type="text" name="codigo" id="codigo" class="required" value="<?php echo(empty($aErrores['codigo'])) ? ($_REQUEST['codigo'] ?? '') : ''; ?>">
                <span style="color:red;"><?php echo $aErrores['codigo']; ?></span><br><br>

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

            $codigo = addslashes($aRespuestas['codigo']); //esta función permite que simbolos especiales en cadenas como las comillas no sean tratados con su efecto a la hora de tratar la cadena dada, para evitar, por ejemplo, que la cadena se parta debido a estos simbolos y evitar errores

            $sql = "INSERT INTO `T02_Departamento` 
            (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaCreacionDepartamento`, `T02_VolumenDeNegocio`, `T02_FechaBajaDepartamento`) 
            VALUES ('{$aRespuestas['codigo']}','{$aRespuestas['descripcion']}',NOW(),'{$aRespuestas['volumenDeNegocio']}',NULL)";

            //Consulta para obtener el codigo del departamento insertado para validar si existe o no
            $sql2 = $miDB->query("SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento = '$codigo'")->fetchAll(PDO::FETCH_OBJ);
            try {
                echo '<h4>INSERCIÓN: </h4>';
                if (count($sql2) > 0) {
                    // El codigo que queremos insertar ya existe, no se puede insertar
                    echo "<h3 style='color:red'>No se puede agregar un departamento con ese código, ya existe.</h3>";
                } else {
                    $miDB->exec($sql); //se ejecuta la inserción si se puede insertar el codigo
                    //antes usé la consulta sql2 para comprobar si el codigo a introducir existía o no, ahora la utilizo para obtener el registro insertado, con todos sus campos
                    $sql2 = $miDB->query("SELECT * FROM T02_Departamento WHERE T02_CodDepartamento = '$codigo'")->fetchAll(PDO::FETCH_OBJ);
                    echo '<h3 style="color:green;">Departamento insertado correctamente</h3>';
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
                }
            } catch (PDOException $miExceptionPDO) {
                echo 'Error: ' . $miExceptionPDO->getMessage();
                echo '<br>';
                echo 'Código de error: ' . $miExceptionPDO->getCode();
            } finally {
                unset($miDB);
            }
        }
        ?>
    </body>
</html>