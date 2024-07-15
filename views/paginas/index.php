<!-- > ?php
include_once __DIR__ . '/conferencias.php';
?> -->

<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $juegos_total; ?></p>
            <p class="resumen__texto">Juegos disponibles</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen__texto">Grupos familiares disponibles</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total; ?></p>
            <p class="resumen__texto">Plataformas disponibles</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">150</p>
            <p class="resumen__texto">Registrados</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Tus juegos</h2>
    <p class="speakers__descripcion">Conoce los juegos disponibles/p>

    <div class="speakers__grid">
        <?php foreach ($juegos as $juego) { ?>
            <div <?php aos_animacion() ?> class="speaker">
                <picture>
                    <source srcset="img/games/<?php echo $juego->imagen; ?>.webp" type="image/webp">
                    <source srcset="img/games/<?php echo $juego->imagen; ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/games/<?php echo $juego->imagen; ?>.png" alt="Imagen games">
                </picture>
                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $juego->nombre . ' ' . $juego->estudio; ?>
                    </h4>
                    <p class="speaker__ubicacion">
                        <?php echo $juego->plataforma . ', ' . $juego->pais; ?>
                    </p>
                    <nav class="speaker-sociales">
                        <?php
                        $redes =  json_decode($juego->redes);
                        ?>

                        <?php if (!empty($redes->steam)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->steam; ?>">
                                <span class="speaker-sociales__ocultar">steam</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->twitter)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->youtube)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->instagram)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->tiktok)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->github)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-sociales__ocultar">Github</span>
                            </a>
                        <?php } ?>
                    </nav>
                    <ul class="speaker__listado-skills">
                        <?php
                        $tags = explode(',', $juego->tags);
                        foreach ($tags as $tag) {
                        ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!-- <div id="mapa" class="mapa"></div> -->

<section class="boletos">
    <h2 class="boletos__heading">Planes & Precios</h2>
    <p class="boletos__descripcion">Precios de Unlockopia</p>


    <div class="boletos__grid">

        <div <?php aos_animacion(); ?> class="boleto boleto--presencial">
            <h4 class="boleto__logo">Unlockopia</h4>
            <p class="boleto__plan">Plan Premium</p>
            <p class="boleto__precio">S/.10</p>
        </div>
        <div <?php aos_animacion(); ?> class="boleto boleto--virtual">
            <h4 class="boleto__logo">Unlockopia</h4>
            <p class="boleto__plan">Plan Platino</p>
            <p class="boleto__precio">S/.10</p>
        </div>
        <div <?php aos_animacion(); ?> class="boleto boleto--gratis">
            <h4 class="boleto__logo">Unlockopia</h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">Gratis - S/.0</p>
        </div>
    </div>
    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver planes</a>
    </div>
</section>