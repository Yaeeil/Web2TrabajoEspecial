<?php

class HomeView {
    public function showHome() {
        require_once "templates/header.php";
        ?>

        <h2>Descubre el Mundo con Nosotros</h2>

        <p>Bienvenido a nuestra emocionante página de viajes, tu puerta de entrada a aventuras sin fin y experiencias inolvidables en destinos de ensueño de todo el mundo. En nuestro sitio web, te invitamos a explorar un universo de posibilidades para satisfacer tu deseo de explorar, relajarte y descubrir.</p>

        <h2>¿Por qué Elegirnos?</h2>

        <p>En nuestro compromiso de brindarte las mejores experiencias de viaje, hemos reunido una cuidadosa selección de destinos, itinerarios y ofertas que se adaptan a todos los gustos y presupuestos. Ya sea que sueñes con recorrer las calles empedradas de ciudades históricas, descubrir la belleza natural de paisajes exóticos o simplemente relajarte en playas de aguas cristalinas, estamos aquí para hacer que tus sueños de viaje se hagan realidad.</p>

        <h2>Nuestros Servicios</h2>

        <p>
            Exploración Cultural: Sumérgete en las culturas locales, prueba la deliciosa comida regional y descubre las tradiciones auténticas de cada lugar que visitamos.

            Aventuras al Aire Libre: Si buscas una dosis de adrenalina, nuestras excursiones de aventura te llevarán a los entornos naturales más impresionantes, desde montañas majestuosas hasta selvas tropicales.

            Relajación Total: ¿Tu idea de vacaciones es descansar y recargar energías? Nuestras opciones de resorts de lujo y retiros de bienestar son perfectas para ti.

            Viajes a Medida: Creemos que cada viaje debe ser único, por eso ofrecemos opciones personalizadas para que tu experiencia se adapte a tus preferencias y necesidades.
        </p>

        <?php
        require_once "templates/footer.php";
    }
}
