<?php

namespace Model;

class Juego extends ActiveRecord
{
    protected static $tabla = 'juegos';
    protected static $columnasDB = ['id', 'nombre', 'estudio', 'plataforma', 'pais', 'imagen', 'tags', 'redes'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->estudio = $args['estudio'] ?? '';
        $this->plataforma = $args['plataforma'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if (!$this->estudio) {
            self::$alertas['error'][] = 'El Estudio es Obligatorio';
        }
        if (!$this->plataforma) {
            self::$alertas['error'][] = 'La plataforma es Obligatorio';
        }
        if (!$this->pais) {
            self::$alertas['error'][] = 'El Campo País es Obligatorio';
        }
        if (!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if (!$this->tags) {
            self::$alertas['error'][] = 'El Campo áreas es obligatorio';
        }

        return self::$alertas;
    }
}
