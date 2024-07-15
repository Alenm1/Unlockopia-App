<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Descubre la nueva página para comprar claves de videojuegos de Steam más económicas del mercado</p>

    <div <?php aos_animacion() ?> class="devwebcamp__grid">
        <div class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen Unlokopia">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion() ?> class="devwebcamp__texto">Tu destino principal para adquirir claves de activación de Steam al mejor precio. Somos una plataforma confiable, especializada en ofrecer una amplia variedad de juegos para todos los gustos y edades. Ya seas un fanático de la acción, un amante de las aventuras gráficas, o un seguidor de los juegos indie, aquí encontrarás lo que buscas.</p>

            <p <?php aos_animacion() ?> class="devwebcamp__texto">Descubre una nueva forma de disfrutar de tus juegos favoritos con Unlockopia. ¡Empieza a jugar hoy mismo!</p>
        </div>
    </div>
</main>