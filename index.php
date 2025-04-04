<?php
// index.php
require 'conexion.php';
$stmt = $pdo->query("SELECT * FROM planes");
$planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetPrime - Conectando al Futuro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link type="image/png" sizes="32x32" rel="icon" href="icons8-wifi-32.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="importmap">
        {
            "imports": {
                "config": "./config.js",
                "main": "./main.js"
            }
        }
    </script>
    <script type="module" src="main.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">NetPrime</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#planes">Planes y Precios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cobertura">Cobertura</a></li>
                        <li class="nav-item"><a class="nav-link" href="#servicios">Servicios Adicionales</a></li>
                        <li class="nav-item"><a class="nav-link" href="#soporte">Soporte Técnico</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="inicio" class="hero">
        <div class="hero-content">
            <h1>Conéctate al futuro con NetPrime</h1>
            <p>La mejor conexión a internet de alta velocidad para tu hogar o empresa.</p>
            <a href="#planes" class="button">Contratar ahora</a>
        </div>
    </section>

    <section id="planes" class="plans">
        <h2>Nuestros Planes</h2>
        <div class="plans-container">
            <?php foreach ($planes as $plan): ?>
                <div class="plan-card">
                    <h3><?php echo $plan['nombre']; ?></h3>
                    <p class="speed"><?php echo $plan['velocidad']; ?></p>
                    <p class="connection">Fibra óptica</p>
                    <p class="price">$<?php echo number_format($plan['precio'], 2); ?>/mes</p>
                    <ul>
                        <?php foreach (explode(', ', $plan['caracteristicas']) as $feature): ?>
                            <li><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="https://wa.me/573215379182" class="button">Contactanos</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="cobertura" class="coverage">
        <h2>Cobertura</h2>
        <div class="coverage-form">
            <h4>Municipio de Vélez, Santander. Zona urbana y rural.</h4>
        </div>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([6.0098, -73.6679], 14); // Coordenadas y nivel de zoom

            // Añadir capa de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Añadir un marcador en la ubicación
            L.marker([6.0098, -73.6679]).addTo(map)
                .bindPopup('Zona de cobertura NetPrime')
                .openPopup();
        </script>
    </section>

    <section id="servicios" class="services">
        <h2>Servicios Adicionales</h2>
        <div class="services-container">
            <div class="service-card">
                <h3>IPTV / Televisión digital</h3>
                <p>Disfruta de tus canales favoritos con la mejor calidad de imagen.</p>
                <a href="#" class="button">Ver más</a>
            </div>
            <div class="service-card">
                <h3>Telefonía IP</h3>
                <p>Llamadas ilimitadas a precios increíbles.</p>
                <a href="#" class="button">Ver más</a>
            </div>
            <div class="service-card">
                <h3>Internet para empresas</h3>
                <p>Soluciones de conectividad para tu negocio.</p>
                <a href="#" class="button">Ver más</a>
            </div>
            <div class="service-card">
                <h3>Instalaciones personalizadas</h3>
                <p>Adaptamos la instalación a tus necesidades.</p>
                <a href="#" class="button">Ver más</a>
            </div>
        </div>
    </section>

    <section id="soporte" class="support">
        <h2>Soporte Técnico</h2>
        <div class="faq">
            <h3>Preguntas Frecuentes</h3>
            <ul>
                <li>
                    <p>¿Cómo puedo pagar mi factura?</p>
                    <p>Puedes pagar tu factura en línea, a través de nuestra app, o en puntos de pago autorizados.</p>
                </li>
                <li>
                    <p>¿Qué hago si no tengo internet?</p>
                    <p>Reinicia tu router y modem. Si el problema persiste, contáctanos.</p>
                </li>
            </ul>
        </div>
        <div class="support-options">
            <a href="https://wa.me/573215379182" target="_blank" class="button"><i class="fab fa-whatsapp"></i> Chat en vivo</a>
            <a href="#" class="button">Crear un ticket de soporte</a>
        </div>
    </section>

    <section id="contacto" class="contact">
        <h2>Contacto</h2>
        <div class="contact-details">
            <p>Dirección: Calle Principal #123, Ciudad</p>
            <p>Teléfono: (123) 456-7890</p>
            <p>Email: <a href="mailto:info@netprime.com">info@netprime.com</a></p>
        </div>
        <form class="contact-form">
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="email" placeholder="Tu email" required>
            <textarea name="mensaje" placeholder="Tu mensaje" required></textarea>
            <button class="button" type="submit">Escríbenos</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];
            // Aquí puedes agregar lógica para enviar el mensaje (e.g., email)
            echo "<p>Gracias, $nombre. Hemos recibido tu mensaje.</p>";
        }
        ?>
    </section>

    <footer>
        <div class="footer-content">
            <div class="legal-info">
                <div class="legal-section">
                    <h4>Contacto</h4>
                    <p>Dirección: Calle Principal #123, Ciudad, País</p>
                    <p>Teléfono: (123) 456-7890</p>
                    <p>Email: <a href="mailto:info@netprime.com">info@netprime.com</a></p>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="legal-section">
                    <h4>Información Legal</h4>
                    <ul>
                        <li><a href="#">Términos y Condiciones de Uso</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Política de Cookies</a></li>
                        <li><a href="#">Aviso Legal</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p id="copyright">© 2025 NetPrime Telecomunicaciones S.A. Todos los derechos reservados.</p>
        <a href="https://wa.me/573215379182" target="_blank" class="whatsapp-float"><i class="fab fa-whatsapp"></i></a>
    </footer>

</body>

</html>