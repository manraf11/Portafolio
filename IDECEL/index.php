<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="Logos/idecel.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDECEL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(Logos/idecel_background.png);
            background-color: #f4f4f4;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 1.5;
            color: #333;
            position: relative;
        }

        header {
            background-color: #003366;
            color: white;
            padding: 2rem; /* Cambiado a rem */
            text-align: center;
            position: relative;
        }

        header img {
            max-width: 100%; /* Cambiado a 100% para que sea responsive */
            height: auto; /* Mantiene la proporción */
            margin-bottom: 1rem; /* Cambiado a rem */
        }

        .logo-small {
            position: absolute;
            width: 10%; /* Cambiado a porcentaje */
        }

        .logo-left {
            top: 1rem; /* Cambiado a rem */
            left: 1rem; /* Cambiado a rem */
        }

        .logo-right {
            top: 1rem; /* Cambiado a rem */
            right: 1rem; /* Cambiado a rem */
        }

        nav {
            background-color: #004080;
            padding: 1rem; /* Cambiado a rem */
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 1rem; /* Cambiado a rem */
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        section {
            padding: 2rem; /* Cambiado a rem */
            margin: 2rem auto;
            max-width: 90%; /* Cambiado a porcentaje */
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #003366;
            text-align: center;
            margin-bottom: 1.5rem; /* Cambiado a rem */
        }

        .mission-vision {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .mission-vision div {
            flex: 1 1 45%; /* Cambiado para que ocupe el 45% del contenedor */
            margin: 1rem; /* Cambiado a rem */
            padding: 1.5rem; /* Cambiado a rem */
            background-color: #e0f2f1;
            border-radius: 10px;
            text-align: center;
        }

        .news {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .news iframe {
            flex: 1 1 45%; /* Cambiado para que ocupe el 45% del contenedor */
            margin: 1rem; /* Cambiado a rem */
            border: none;
            border-radius: 10px;
        }

        .workshops {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .workshop-card {
            flex: 1 1 45%; /* Cambiado para que ocupe el 45% del contenedor */
            margin: 1rem; /* Cambiado a rem */
            padding: 1.5rem; /* Cambiado a rem */
            background-color: #e0f2f1;
            border-radius: 10px;
            text-align: center;
        }

        .workshop-card h3 {
            color: #004080;
        }

        .contact {
            text-align: center;
        }

        .contact a {
            color: #004080;
            text-decoration: none;
        }

        .contact a:hover {
            text-decoration: underline;
        }

        .map {
            text-align: center;
            margin-top: 2rem; /* Cambiado a rem */
        }

        .map iframe {
            width: 100%;
            height: 400px;
 border: none;
            border-radius: 10px;
        }

        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 1rem; /* Cambiado a rem */
            margin-top: 2rem; /* Cambiado a rem */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animated {
            animation: fadeIn 1.0s ease-in-out;
        }

        .participate-button {
            display: inline-block;
            margin-top: 1rem; /* Cambiado a rem */
            padding: 1rem 2rem; /* Cambiado a rem */
            background-color: #004080;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .participate-button:hover {
            background-color: #003366;
        }

        .social-icons a {
            color: #004080;
            text-decoration: none;
            margin: 0 1rem; /* Cambiado a rem */
            font-size: 2rem; /* Cambiado a rem */
        }

        .social-icons a:hover {
            color: #003366;
        }

        h1 {
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        h1:hover {
            transform: scale(1.05);
        }

        /* Estilos para el chatbot */
        .chatbot {
            position: fixed;
            bottom: 2rem; /* Cambiado a rem */
            right: 2rem; /* Cambiado a rem */
            width: 10%; /* Cambiado a porcentaje */
            height: 10%; /* Cambiado a porcentaje */
            background-image: url('Logos/Cardenal.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .chatbot:hover {
            transform: scale(1.1);
        }

        /* Estilos para la ventana del chat */
        .chat-window {
            display: none;
            position: fixed;
            bottom: 10%; /* Cambiado a porcentaje */
            right: 2rem; /* Cambiado a rem */
            width: 80%; /* Cambiado a porcentaje */
            max-width: 400px; /* Limitar el ancho máximo */
            border: none;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        /* Estilos para el encabezado del chat */
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 1rem; /* Cambiado a rem */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Estilos para el cuerpo del chat */
        .chat-body {
            padding: 1rem; /* Cambiado a rem */
            max-height: 300px; /* Aumentar la altura máxima */
            overflow-y: auto;
            font-size: 0.95em;
            color: #333;
            background-color: #f8f9fa;
        }

        /* Estilos para el pie del chat */
        .chat-footer {
            display: flex;
            justify-content: space-between;
            padding: 1rem; /* Cambiado a rem */
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        /* Estilos para los botones de preguntas */
        .question-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 1rem; /* Cambiado a rem */
            border-radius: 5px;
            cursor: pointer;
            margin: 0.5rem 0; /* Cambiado a rem */
            width: 100%;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }

        .question-button:hover {
            background-color: #0056b3;
        }

        /* Estilos para los mensajes del chat */
 
        .chat-message {
            margin: 0.5rem 0; /* Cambiado a rem */
            padding: 1rem; /* Cambiado a rem */
            border-radius: 5px;
            background-color: #e9ecef;
            color: #333;
            position: relative;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para los mensajes del usuario */
        .chat-message.user {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }

        @media (max-width: 768px) {
            .mission-vision div {
                flex: 1 1 100%; /* En pantallas pequeñas, cada div ocupa el 100% */
            }

            .workshop-card {
                flex: 1 1 100%; /* En pantallas pequeñas, cada taller ocupa el 100% */
            }

            nav a {
                margin: 0 0.5rem; /* Ajustar márgenes en pantallas pequeñas */
            }

            .chat-window {
                width: 90%; /* Ajustar el ancho del chat en pantallas pequeñas */
            }

            .chatbot {
                width: 15%; /* Ajustar el tamaño del botón del chatbot */
                height: 15%; /* Ajustar el tamaño del botón del chatbot */
            }
        }
    </style>
</head>

<body>

    <!-- Encabezado con logo -->
    <header class="animated">
        <img src="Logos/idecel.png" alt="Logo de la Institución" width="180">
        <img src="Logos/Nvo_LogoCEL_sinf.PNG" alt="Logo Izquierdo" class="logo-small logo-left">
        <img src="Logos/Logo SNCF.png" alt="Logo Derecho" class="logo-small logo-right">
        <h1>INSTITUTO DE DESARROLLO Y ESTUDIOS DE LA CONTRALORÍA DEL ESTADO LARA</h1>
    </header>

    <!-- Menú de navegación -->
    <nav>
        <a href="#mision-vision">Misión y Visión</a>
        <a href="#finalidad">Finalidad</a>
        <a href="#reseña">Reseña Histórica </a>
        <a href="#noticias">Noticias</a>
        <a href="#talleres">Talleres</a>
        <a href="#contacto">Contacto</a>
    </nav>

    <!-- Sección de Noticias -->
    <section id="noticias" class="animated">
        <h2>Últimas Noticias</h2>
        <div class="tagembed-widget" style="width:100%;height:100%" data-widget-id="2157354" data-tags="false" view-url="https://widget.tagembed.com/2157354"></div>
        <script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script>
    </section>

    <!-- Sección de Misión y Visión -->
    <section id="mision-vision" class="animated">
        <h2>Misión y Visión</h2>
        <div class="mission-vision">
            <div>
                <h3>Misión</h3>
                <p>Transformar el Talento Humano, promoviendo y ejecutando la capacitación, desarrollo y actualización de los trabajadores de la Contraloría del estado Lara, y del personal de otros entes, órganos e instituciones del sector público y privado; así como coadyuvar en el adiestramiento técnico de las Contralorías Sociales, a través de talleres, cursos, conferencias, jornadas, conversatorios y demás herramientas de disertación, razonamiento y formación.</p>
            </div>
            <div>
                <h3>Visión</h3>
                <p>Consolidarnos como el mejor Instituto Educativo de Control Fiscal de la Región Centro Occidental; contribuyendo a incrementar los niveles de excelencia y desempeño profesional del talento humano que labora en la Administración Pública y el sector privado.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Finalidad -->
    <section id="finalidad" class="animated">
        <h2>Finalidad </h2>
        <div class="mission-vision">
            <div>
                <p>Formar, capacitar, adiestrar y actualizar servidores públicos y ciudadanos en el Control de la Gestión Pública fortaleciendo el Sistema Nacional de Control Fiscal, (SNCF), a fin de contribuir al logro de los objetivos de las instituciones del estado y del buen funcionamiento de la administración pública. Fundamentada en los principios y valores consagrados en la Constitución de la República Bolivariana de Venezuela.</p>
        </div>
            </div>
        </div>
    </section>

    <!-- Sección de Reseña Histórica -->
    <section id="reseña" class="animated">
        <h2>Reseña Histórica</h2>
        <div class="mission-vision">
            <div>
                <p>La Asociación Civil, Instituto de Desarrollo y Estudios de la Contraloría del Estado Lara, fue creada mediante Resolución Organizativa en el año 2000; dictada por el Contralor General del Estado Lara Dr. Juan Pablo Soteldo Azparren, publicada en Gaceta Extraordinaria de la misma fecha y posteriormente Protocolizada en el Registro Subalterno del Primer Circuito del Municipio Iribarren en fecha 26 de Junio del año 2001.</p>
                <p>El Instituto tiene como nombre comunicativo las siglas que hace referencia su nombre, es decir; IDECEL, este nombre será utilizado en todas las comunicaciones oficiales, memorándums, correspondencia, entre otros y en cualquier evento que este patrocine o participe.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Formación y Capacitación -->
    <section id="formacion" class="animated">
        <h2>Formación y Capacitación en:</h2>
        <div class="mission-vision">
            <div>
                <ul>
                    <li>Auditoría de Estado</li>
                    <li>Control Fiscal</li>
                    <li>Gestión de Estado</li>
                    <li>Jurídico Fiscal</li>
                    <li>Participación Ciudadana</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sección de Talleres -->
    <section id="talleres" class="animated">
        <h2>Próximos Talleres</h2>
        <div class="workshops" id="workshops-container">
            <!-- Los talleres se cargarán aquí -->
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section id="contacto" class="animated">
        <h2>Contacto</h2>
        <div class="contact">
            <p>
                <img src="Logos/correo.png" alt="" style="width: 50px; vertical-align: middle; margin-right: 10px;">
                Email: <a href="mailto:idecel@gmail.com">idecel@gmail.com</a>
            </p>
            <p>
                <img src="Logos/whatsapp.png" alt="" style="width: 20px; vertical-align: middle; margin-right: 5px;">
                Teléfono: <span>0416-6564370 / 0251-2533758</span>
            </p>
            <p>
                <a href="https://www.instagram.com/gestionidecel" style="width: 20px" target="_blank" class="social-icons">
                    <i class="fab fa-instagram"></i>
                </a>
            </p>
        </div>
    </section>

    <!-- Sección de Ubicación -->
    <section class="animated">
        <h2>Ubicación</h2>
        <div class="map">
            <p> Edificio Sede de la Contraloría del Estado Lara, Urbanización el Parque, Calle A-1, detrás del Centro Comercial Alfa al lado de la Torre Delta.</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.419655529783!2d-69.28750149999999!3d10.064658699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e875d87f71126db%3A0x2e93b6d489d27d1d!2sContraloria%20General%20Del%20Estado%20Lara!5e0!3m2!1ses-419!2sve!4v1740502809001!5m2!1ses-419!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="animated">
        <p>&copy;<?php echo date("Y"); ?> IDECEL G-200069350.</p>
        <p>  Desarrollado por Manuel Flores-CC. Contraloria del Estado Lara.</p>
 </footer>

    <!-- Botón del chatbot -->
    <div class="chatbot" onclick="toggleChat()"></div>

    <!-- Ventana del chat -->
    <div class="chat-window" id="chat-window">
        <div class="chat-header">Jacinto</div>
        <div class="chat-body" id="chat-body">
            <p class="chat-message">¡Hola! ¿En qué puedo ayudarte hoy?</p>
            <button class="question-button" onclick="respond('¿Cuáles son los talleres disponibles?')">¿Cuáles son los talleres disponibles?</button>
            <button class="question-button" onclick="respond('¿Cómo puedo contactarlos?')">¿Cómo puedo contactarlos?</button>
            <button class="question-button" onclick="respond('¿Qué es IDECEL?')">¿Qué es IDECEL?</button>
            <button class="question-button" onclick="respond('Qué es el Sistema Nacional de Control Fiscal (SNCF)?')">¿Qué es el SNCF?</button>
            <button class="question-button" onclick="respond('¿Cuál es la misión de IDECEL?')">Misión de IDECEL</button>
            <button class="question-button" onclick="respond('¿Cuál es la visión de IDECEL?')">Visión de IDECEL</button>
            <button class="question-button" onclick="respond('¿Qué es la finalidad de IDECEL?')">Finalidad de IDECEL</button>
            <button class="question-button" onclick="respond('¿Dónde se ubica IDECEL?')">Ubicación de IDECEL</button>
            <button class="question-button" onclick="respond('¿Qué áreas de formación ofrece IDECEL?')">Áreas de formación</button>
            <button class="question-button" onclick="respond('¿Cuándo fue creado IDECEL?')">Creación de IDECEL</button>
            <button class="question-button" onclick="respond('¿Qué significa IDECEL?')">Significado de IDECEL</button>
            <button class="question-button" onclick="respond('¿Qué tipo de actividades realiza IDECEL?')">Actividades de IDECEL</button>
        </div>
        <div class="chat-footer">
            <button onclick="closeChat()">Cerrar</button>
        </div>
    </div>

    <script>
        function toggleChat() {
            const chatWindow = document.getElementById('chat-window');
            chatWindow.style.display = chatWindow.style.display === 'none' || chatWindow.style.display === '' ? 'block' : 'none';
        }

        function closeChat() {
            document.getElementById('chat-window').style.display = 'none';
        }

        function respond(question) {
            const chatBody = document.getElementById('chat-body');
            let response = '';

            switch (question) {
                case '¿Cuáles son los talleres disponibles?':
                    response = 'Jacinto: Los talleres disponibles se pueden consultar en la sección de Talleres de nuestra página.';
                    break;
                case '¿Cómo puedo contactarlos?':
                    response = 'Jacinto: Puedes contactarnos a través del correo idecel@gmail.com o llamando al 0416-6564370.';
                    break;
                case '¿Qué es IDECEL?':
                    response = 'Jacinto: IDECEL es el Instituto de Desarrollo y Estudios de la Contraloría del Estado Lara.';
                    break;
                case 'Qué es el Sistema Nacional de Control Fiscal (SNCF)?':
                    response = 'Jacinto: El Sistema Nacional de Control Fiscal (SNCF) es un conjunto de organismos y procedimientos destinados a garantizar la transparencia y eficiencia en la gestión pública.';
                    break;
                case '¿Cuál es la misión de IDECEL?':
                    response = 'Jacinto: La misión de IDECEL es transformar el talento humano promoviendo la capacitación y desarrollo de los trabajadores de la Contraloría del Estado Lara.';
                    break;
                case '¿Cuál es la visión de IDECEL?':
                    response = 'Jacinto: La visión de IDECEL es consolidarse como el mejor Instituto Educativo de Control Fiscal de la Región Centro Occidental.';
                    break;
                case '¿Qué es la finalidad de IDECEL?':
                    response = 'Jacinto: La finalidad de IDECEL es formar y capacitar servidores públicos y ciudadanos en el control de la gestión pública.';
                    break;
                case '¿Dónde se ubica IDECEL?':
                    response = 'Jacinto: IDECEL se ubica en el Edificio Sede de la Contraloría del Estado Lara, Urbanización el Parque.';
                    break;
                case '¿Qué áreas de formación ofrece IDECEL?':
                    response = 'Jacinto: IDECEL ofrece formación en Auditoría de Estado, Control Fiscal, Gestión de Estado, Jurídico Fiscal y Participación Ciudadana.';
                    break;
                case '¿Cuándo fue creado IDECEL?':
                    response = 'Jacinto: IDECEL fue creado en el año 2000.';
                    break;
                case '¿Qué significa IDECEL?':
                    response = 'Jacinto: IDECEL significa Instituto de Desarrollo y Estudios de la Contraloría del Estado Lara.';
                    break;
                case '¿Qué tipo de actividades realiza IDECEL?':
                    response = 'Jacinto: IDECEL realiza talleres, cursos, conferencias y jornadas de capacitación.';
                    break;
                default:
                    response = 'Jacinto: Lo siento, no tengo una respuesta para eso.';
            }

            chatBody.innerHTML += `<p class="chat-message">${response}</p>`;
            chatBody.scrollTop = chatBody.scrollHeight; // Desplazar hacia abajo para mostrar la última respuesta
        }

        // Función para cargar los talleres desde el archivo JSON
        async function cargarTalleres() {
            const response = await fetch('talleres.json');
            const talleres = await response.json();
            const container = document.getElementById('workshops-container');

            talleres.forEach(taller => {
                const card = document.createElement('div');
                card.className = 'workshop-card';
                card.innerHTML = `
                    <h3>${taller.titulo}</h3>
                    <p>Fecha: ${taller.fecha}</p>
                    <p>Costo: ${taller.costo}</p>
                    <p>Descripción: ${taller.descripcion}</p>
                    <a href="${taller.link}" class="participate-button">Participar</a>
                `;
                container.appendChild(card);
            });
        }

        // Cargar los talleres al cargar la página
        window.onload = cargarTalleres;
    </script>
</body>
</html>