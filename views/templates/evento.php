<div class="evento  swiper-slide">
    <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>
    <div class="evento__informacion">
        <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>
        <p class="evento__introduccion"><?php echo $evento->descripcion; ?></p>
        <div class="evento__autor-info">
            <picture>
                <source srcset="img/games/<?php echo $evento->juego->imagen; ?>.webp" type="image/webp">
                <source srcset="img/games/<?php echo $evento->juego->imagen; ?>.png" type="image/png">
                <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="img/games/<?php echo $evento->juego->imagen; ?>.png" alt="Imagen Games">
            </picture>
            <p class="evento__autor-nombre">
                <?php echo $evento->juego->nombre . " " . $evento->juego->estudio; ?>
            </p>
        </div>
    </div>
</div>