<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto Tema 4</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./webroot/css/estilos.css">
        <link rel="stylesheet" href="./webroot/css/fonts.css">
        <style>
            footer {
                position: relative;
            }

            a i{
                color: #020202;
            }

            footer i{
                color: white;
            }

            main {
                flex: 1;
                margin-top: 100px;
                margin-bottom: 20px;
                display: block;
                height: 100vh;
                justify-items: center;
                align-content: center;
                align-items: start;
                justify-content: center;
                overflow: hidden;
                box-sizing: border-box;
            }

            table{
                margin-top: 5px;
                position: relative;
                overflow: hidden;
                border-radius: 7px;
                transition: transform 0.3s ease;
                transform-origin: center;
                background-size: cover;
                background-position: center;
                display: flex;
                justify-content: center;
                align-items: center;
                color: black;
                font-weight: bold;
                font-size: 1.2rem;
                z-index: 0;
                padding: 15px;
                width: 100vw;
                height: 100%;
                background: white;
            }

            td{
                border: 1px solid black;
                height: 50px;
                padding: 10px;
            }

            #tablaEjercicios tr td:nth-child(2){
                font-family: sans-serif;
            }

            #tablaEjercicios tr td:nth-child(3){
                cursor:pointer;
            }

            #tablaEjercicios tr td:nth-child(4){
                cursor:pointer;
            }
        </style>
    </head>

    <body>
        <header>
            <h2>DAW2</h2>
            <h1>Proyecto Tema 4</h1>
            <h2>25/26</h2>
        </header>

        <main>
            <table>
                <tr>
                    <td></td>
                    <td>ED</td>
                    <td>EE</td>
                </tr>
                <tr>
                    <td class="numero">Script Creación de base de datos y usuario</td>
                    <td>
                        <a href="./mostrarcodigo/mostrarcodigoCrear.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                    <td>
                        <a href="./codigoPHP/ejercicio00.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigoCrear.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="numero">Script de Carga Inicial</td>
                    <td>
                        <a href="./mostrarcodigo/mostrarcodigoCarga.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                    <td>
                        <a href="./codigoPHP/ejercicio00.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigoCarga.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="numero">Script de Borrado</td>
                    <td>
                        <a href="./mostrarcodigo/mostrarcodigoBorrar.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                    <td>
                        <a href="./codigoPHP/ejercicio00.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigoBorrar.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                </tr>
            </table>
            <table id="tablaEjercicios">
                <tr>
                    <td>Nº</td>
                    <td>Enunciado</td>
                    <td>PDO</td>
                    <td>MySQLi</td>
                </tr>
                <tr>
                    <td class="numero">1</td>
                    <td class="enunciado">Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                    <td>
                        <a href="./codigoPHP/ejercicio01.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigo01.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td class="numero">2</td>
                    <td class="enunciado">Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                    <td><a href="./codigoPHP/ejercicio02.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigo02.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td class="numero">3</td>
                    <td class="enunciado">Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
                        control de errores.</td>
                    <td><a href="./codigoPHP/ejercicio03.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigo03.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td class="numero">4</td>
                    <td class="enunciado">Formulario de búsqueda de departamentos por descripción (por una parte del campo
                        DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                    <td><a href="./codigoPHP/ejercicio04.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                        <a href="./mostrarcodigo/mostrarcodigo04.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td class="numero">5</td>
                    <td class="enunciado">Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
</td>
<!--                    <td><a href="./codigoPHP/ejercicio04.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo04.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>-->
                </tr>
                <tr>
                    <td class="numero">6</td>
                    <td class="enunciado">Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
                    </td>
<!--                    <td><a href="./codigoPHP/ejercicio05.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo05.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>-->
                </tr>
                <tr>
                    <td class="numero">7</td>
                    <td class="enunciado">Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</td>
<!--                    <td><a href="./codigoPHP/ejercicio06.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo06.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>-->
                </tr>
                <tr>
                    <td class="numero">8</td>
                    <td class="enunciado">Mostrar el nombre del fichero que se está ejecutando.
                    </td>
<!--                    <td><a href="./codigoPHP/ejercicio07.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo07.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>-->
                </tr>
            </table>
        </main>

        <footer>
            <p>© 2025-26 IES Los Sauces. Todos los derechos reservados. Cristian Mateos Vega</p>
            <div id="iconos">
                <a href="https://github.com/CrisMatVeg" target="_blank" title="Github"><i
                        class="fa-brands fa-github fa-2xl"></i></a>
                <a href="../CMVDWESProyectoDWES/indexProyectoDWES.php" title="Inicio"><i class="fa-solid fa-house fa-xl"></i></a>
            </div>
        </footer>
    </body>

</html>
