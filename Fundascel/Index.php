<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="Logos/FUNDASCEL.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNDASCEL - Fundación de Servicios de Salud</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset de estilos básicos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #40078d;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative; /* Para posicionar los logos */
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .logo-container {
            position: absolute;
            top: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .logo-container img {
            max-width: 100px; /* Ajusta el tamaño de los logos */
        }

        nav {
            background-color: #005bb5;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .banner {
            background-image: url('Logos/contraloria.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .banner h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .banner p {
            font-size: 1.5em;
        }

        section {
            padding: 40px 20px;
            margin: 20px auto;
            max-width: 900px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        section:hover {
            transform: translateY(-5px);
        }

        h2 {
            color: #40078d;
            margin-bottom: 15px;
            font-size: 2em;
        }

        .service-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .service {
            background: #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            text-align: center;
            flex: 1 1 220px;
            transition: transform 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .service:hover {
            transform: scale(1.05);
        }

        .service i {
            font-size: 40px;
            color: #40078d;
            margin-bottom: 10px;
        }

        .service img {
            width: 100%; /* Ajusta el ancho de la imagen */
            border-radius: 8px;
            margin-bottom: 10px; /* Espaciado inferior */
        }

        .important {
            background-color: #ffeb3b;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .important h3 {
            margin-bottom: 10px;
        }

        .news-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        article {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        article:hover {
            transform: translateY(-5px);
        }

        article img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .social-media {
            text-align: center;
            margin-top: 20px;
        }

        .social-media a {
            margin: 0 10px;
            color: #40078d;
            font-size: 24px;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #ffdd57;
        }

        footer {
            background-color: #005bb5;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
            position: relative;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #ffdd57;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="Logos/Nvo_LogoCEL_sinf.PNG" alt="Logo Izquierda">
            <img src="Logos/FUNDASCEL.png" alt="Logo Centro">
            <img src="Logos/Logo SNCF.png" alt="Logo Derecha">
        </div>
        <h1>FUNDASCEL</h1>
        <p>Fundación de Servicios de Salud y Prevención Social de la Contraloría del Estado Lara</p>
    </header>

    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#mision-vision">Misión y Visión</a>
        <a href="#reseña-historica">Reseña Histórica</a>
        <a href="#servicios">Servicios</a>
        <a href="#importante">Importante</a>
        <a href="#ultimas-noticias">Últimas Noticias</a>
        <a href="#contacto">Contacto</a>
        <a href="#ubicacion">Ubicación</a>
    </nav>

    <div class="container">
        <section id="inicio" class="banner">
            <h1>Bienvenidos a FUNDASCEL</h1>
            <p>Comprometidos con tu bienestar y salud.</p>
        </section>

        <section id="mision-vision">
            <h2>Misión y Visión</h2>
            <p><strong>Misión:</strong> Brindar un servicio de salud integral, solidaria y eficiente al personal activo, jubilado y sus familiares, a través de enlaces directos y centros de salud, basados en los principios de justicia, igualdad, equidad e inclusión social.</p>
            <p><strong>Visión:</strong> Ser una institución de vanguardia en la prestación de servicios de salud, generando estabilidad, confianza y elevando la calidad del bienestar colectivo de nuestros afiliados mediante el compromiso y la ética del talento humano capacitado.</p>
        </section>

        <section id="reseña-historica">
            <h2>Reseña Histórica</h2>
            <p>La Fundación de Servicios de Salud fue establecida en 1990 con el objetivo de mejorar la calidad de vida de la población a través de programas de salud preventiva y curativa. Desde entonces, hemos trabajado incansablemente para ofrecer servicios de salud accesibles y de calidad a todos nuestros afiliados.</p>
        </section>

        <section id="servicios">
            <h2>Servicios Ofrecidos</h2>
            <div class="service-grid">
                <div class="service">
                    <img src="Logos/ODONTOLOGIA.jpg" alt="Odontología">
                    <i class="fas fa-tooth"></i>
                    <h3>Odontología</h3>
                    <p>Ofrecemos servicios odontológicos integrales, enfocados en la salud bucal, brindando atención al personal activo, obrero, jubilado y sus familias.</p>
                </div>
                <div class="service">
                    <img src="Logos/MEDICO.jpg" alt="Medicina Familiar">
                    <i class="fas fa-user-md"></i>
                    <h3>Medicina Familiar</h3>
                    <p>Atención médica a los afiliados y sus familias , con horarios específicos para consultas.</p>
                    <p><strong>Horario:</strong> Martes y Viernes de 8:00 AM a 12:00 PM</p>
                </div>
                <div class="service">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Seguro HCM</h3>
                    <p>Ofrecemos seguros de salud HCM a través de Seguros Constitución para proteger la salud de nuestros afiliados.</p>
                </div>
            </div>
        </section>

        <section id="importante" class="important">
            <h3>Importante</h3>
            <p>Se ha firmado un contrato con Seguros Constitución para salvaguardar la salud del personal de la Contraloría del Estado Lara, tanto activos como jubilados.</p>
        </section>

        <section id="ultimas-noticias">
            <h2>Últimas Noticias</h2>
            <div class="tagembed-widget" style="width:100%;height:100%" data-widget-id="2155852" data-tags="false" view-url="https://widget.tagembed.com/2155852"></div><script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script>
        </section>

        <section id="contacto">
            <h2>Contacto</h2>
            <p><strong>Teléfono:</strong> 0251-2677039</p>
            <p><strong>Correo Electrónico:</strong> <a href="mailto:fundaseel01@gmail.com">fundaseel01@gmail.com</a></p>
            
            <div class="social-media">
                <a href="https://www.instagram.com/fundasceloficial/"><i class="fab fa-instagram"></i></a>
            </div>
        </section>

        <section class="animated" id="ubicacion">
            <h2>Ubicación</h2>
            <div class="map">
                <p> Edificio Sede de la Contraloría del Estado Lara, Urbanización el Parque, Calle A-1, detrás del Centro Comercial Alfa al lado de la Torre Delta.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.419655529783!2d-69.28750149999999!3d10.064658699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e875d87f71126db%3A0x2e93b6d489d27d1d!2sContraloria%20General%20Del%20Estado%20Lara!5e0!3m2!1ses-419!2sve!4v1740502809001!5m2!1ses-419!2sve" width="860" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy;<?php echo date("Y"); ?> FUNDASCEL G-200096020.</p>
        <p>Desarrollado por Manuel Flores-CC. Contraloría del Estado Lara.</p>
    </footer>
</body>
</html>