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
                    <td class="numero">S.C.C</td>
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
                    <td class="numero">S.C.I</td>
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
                    <td class="numero">S.B</td>
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
                    <td class="numero">0</td>
                    <td class="enunciado">Hola mundo y phpinfo()</td>
                    <td>
                        <a href="./codigoPHP/ejercicio00.php" >
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </td>
                    <td>
                        <a href="./mostrarcodigo/mostrarcodigo00.php" >
                            <i class="fa-solid fa-code"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="numero">1</td>
                    <td class="enunciado">Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,
                        var_dump).</td>
                    <td><a href="./codigoPHP/ejercicio01.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo01.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">2</td>
                    <td class="enunciado">Inicializar y mostrar una variable heredoc.</td>
                    <td><a href="./codigoPHP/ejercicio02.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo02.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">3</td>
                    <td class="enunciado">Mostrar en tu página index la fecha y hora actual formateada en castellano. (Utilizar cuando sea posible la clase DateTime)</td>
                    <td><a href="./codigoPHP/ejercicio03.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo03.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">4</td>
                    <td class="enunciado">Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués</td>
                    <td><a href="./codigoPHP/ejercicio04.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo04.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">5</td>
                    <td class="enunciado">Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
                    </td>
                    <td><a href="./codigoPHP/ejercicio05.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo05.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">6</td>
                    <td class="enunciado">Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</td>
                    <td><a href="./codigoPHP/ejercicio06.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo06.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">7</td>
                    <td class="enunciado">Mostrar el nombre del fichero que se está ejecutando.
                    </td>
                    <td><a href="./codigoPHP/ejercicio07.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo07.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">8</td>
                    <td class="enunciado">Mostrar la dirección IP del equipo desde el que estás accediendo.</td>
                    <td><a href="./codigoPHP/ejercicio08.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo08.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">9</td>
                    <td class="enunciado">Mostrar el path donde se encuentra el fichero que se está ejecutando.</td>
                    <td><a href="./codigoPHP/ejercicio09.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo09.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">10</td>
                    <td class="enunciado">Mostrar el contenido del fichero que se está ejecutando.
                    </td>
                    <td><a href="./codigoPHP/ejercicio10.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo10.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">11</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">12</td>
                    <td class="enunciado">Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
                    </td>
                    <td><a href="./codigoPHP/ejercicio12.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo12.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">13</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">14</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">15</td>
                    <td class="enunciado">Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
                        semana.
                    </td>
                    <td><a href="./codigoPHP/ejercicio15.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo15.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">16</td>
                    <td class="enunciado">Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
                    </td>
                    <td><a href="./codigoPHP/ejercicio16.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo16.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">17</td>
                    <td class="enunciado">Inicializar un array bidimensional y recorrerlo de distintas formas (Teatro).
                    </td>
                    <td><a href="./codigoPHP/ejercicio17.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo17.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">18</td>
                    <td class="enunciado">Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
                    </td>
                    <td><a href="./codigoPHP/ejercicio18.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo18.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">19</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">20</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">21</td>
                    <td class="enunciado">Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
                        las preguntas y las respuestas recogidas.

                    </td>
                    <td><a href="./codigoPHP/ejercicio21cuestionario.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo21tratamiento.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">22</td>
                    <td class="enunciado">Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                        recogidas.
                    </td>
                    <td><a href="./codigoPHP/ejercicio22.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo22.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">23</td>
                    <td class="enunciado">Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
                    </td>
                    <td><a href="./codigoPHP/ejercicio23.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo23.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">24</td>
                    <td class="enunciado">Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.

                    </td>
                    <td><a href="./codigoPHP/ejercicio24.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo24.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">24</td>
                    <td class="enunciado">Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.

                    </td>
                    <td><a href="./codigoPHP/ejercicio24.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo24.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
                </tr>
                <tr>
                    <td class="numero">25</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">26</td>
                    <td class="enunciado">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="numero">27</td>
                    <td class="enunciado">ENCUESTA INDIVIDUAL DE VALORACIÓN</td>
                    <td><a href="./codigoPHP/ejercicio27.php" >
                            <i class="fa-solid fa-play"></i>
                        </a></td>
                    <td><a href="./mostrarcodigo/mostrarcodigo27.php" >
                            <i class="fa-solid fa-code"></i>
                        </a></td>
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
