<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/juegos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Juego
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($juegos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre / PLataforma</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Pais</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($juegos as $juego) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $juego->nombre . " " . $juego->plataforma; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $juego->estudio; ?>
                        </td>

                        <!-- <td class="table__td">
                             echo $juego->estudio . " / / " . $juego->pais; ?>
                        </td> -->

                        <td class="table__td">
                            <?php echo $juego->pais; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/juegos/editar?id=<?php echo $juego->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/juegos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $juego->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No Hay juegos Aún</p>
    <?php } ?>
</div>