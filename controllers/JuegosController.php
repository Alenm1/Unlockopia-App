<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Juego;
use Intervention\Image\ImageManagerStatic as Image;

class JuegosController
{
    public static function index(Router $router)
    {

        if (!is_admin()) {
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/juegos?page=1');
        }

        $registros_por_pagina = 8;
        $total = Juego::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        //debuguear($paginacion->total_paginas());

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/juegos?page=1');
        }

        $juegos = Juego::paginar($registros_por_pagina, $paginacion->offset());


        $router->render('admin/juegos/index', [
            'titulo' => 'Juegos / Agregue',
            'juegos' => $juegos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {

        if (!is_admin()) {
            header('Location: /login');
        }


        $alertas = [];
        $juego = new Juego;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_admin()) {
                header('Location: /login');
            }

            $juego->sincronizar($_POST);


            // Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/games';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);


                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $juego->sincronizar($_POST);

            // validar
            $alertas = $juego->validar();


            // Guardar el registro
            if (empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $resultado = $juego->guardar();

                if ($resultado) {
                    header('Location: /admin/juegos');
                }
            }
        }

        $router->render('admin/juegos/crear', [
            'titulo' => 'Registrar juego',
            'alertas' => $alertas,
            'juego' => $juego,
            'redes' => json_decode($juego->redes)
        ]);
    }


    public static function editar(Router $router)
    {

        if (!is_admin()) {
            header('Location: /login');
        }


        $alertas = [];
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/juegos');
        }

        // Obtener JUEGO a Editar
        $juego = Juego::find($id);

        if (!$juego) {
            header('Location: /admin/juegos');
        }

        $juego->imagen_actual = $juego->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/games';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $juego->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $juego->sincronizar($_POST);

            $alertas = $juego->validar();

            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }
                $resultado = $juego->guardar();
                if ($resultado) {
                    header('Location: /admin/juegos');
                }
            }
        }

        $router->render('admin/juegos/editar', [
            'titulo' => 'Actualizar Juego',
            'alertas' => $alertas,
            'juego' => $juego,
            'redes' => json_decode($juego->redes)
        ]);
    }

    public static function eliminar()
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $juego = Juego::find($id);

            if (!isset($juego)) {
                header('Location: /admin/juegos');
            }
            $resultado = $juego->eliminar();
            if ($resultado) {
                header('Location: /admin/juegos');
            }
        }
    }
}
