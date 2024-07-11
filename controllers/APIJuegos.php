<?php

namespace Controllers;

use Model\Juego;

class APIJuegos
{

    public static function index()
    {
        $juegos = Juego::all();
        echo json_encode($juegos);
    }

    public static function juego()
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $juego = Juego::find($id);
        echo json_encode($juego, JSON_UNESCAPED_SLASHES);
    }
}
