<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del juego</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del Juego" value="<?php echo $juego->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="estudio" class="formulario__label">Estudio</label>
        <input type="text" class="formulario__input" id="estudio" name="estudio" placeholder="Estudio de desarrollo" value="<?php echo $juego->estudio ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="plataforma" class="formulario__label">Plataforma</label>
        <input type="text" class="formulario__input" id="plataforma" name="plataforma" placeholder="Plataforma" value="<?php echo $juego->plataforma ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">País</label>
        <input type="text" class="formulario__input" id="pais" name="pais" placeholder="País disponible" value="<?php echo $juego->pais ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>

    <?php if (isset($juego->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/games/' . $juego->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/games/' . $juego->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/games/' . $juego->imagen; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>

    <?php } ?>
</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Descripción</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Áreas de Descripción (separadas por coma)</label>
        <input type="text" class="formulario__input" id="tags_input" placeholder="La descripcion del juego">

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $juego->tags ?? ''; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Vinculos en Tienda</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-steam"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[steam]" placeholder="Steam" value="<?php echo $redes->steam ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-xbox"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[xbox]" placeholder="Xbox" value="<?php echo $redes->xbox ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-playstation"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[play]" placeholder="Play Station" value="<?php echo $redes->play ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <!-- <i class="fa-brands fa-teamspeak"></i> -->
                <i class="fa-brands fa-codiepie"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[epic]" placeholder="Epic Games" value="<?php echo $redes->epic ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-microsoft"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[microsoft]" placeholder="Microsoft Store" value="<?php echo $redes->microsoft ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-google-play"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[google]" placeholder="Play Store" value="<?php echo $redes->google ?? ''; ?>">
        </div>
    </div>

</fieldset>