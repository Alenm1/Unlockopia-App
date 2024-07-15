<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIEventos;
use Controllers\APIJuegos;
use Controllers\APIRegalos;
use Controllers\AuthController;
use Controllers\EventosController;
use Controllers\JuegosController;
use Controllers\PaginasController;
use Controllers\RegistroController;
use Controllers\RegalosController;
use Controllers\DashboardController;
use Controllers\RegistradosController;


$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/juegos', [JuegosController::class, 'index']);
$router->get('/admin/juegos/crear', [JuegosController::class, 'crear']);
$router->post('/admin/juegos/crear', [JuegosController::class, 'crear']);
$router->get('/admin/juegos/editar', [JuegosController::class, 'editar']);
$router->post('/admin/juegos/editar', [JuegosController::class, 'editar']);
$router->post('/admin/juegos/eliminar', [JuegosController::class, 'eliminar']);

$router->get('/admin/eventos', [EventosController::class, 'index']);
$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);

$router->get('/api/eventos-horario', [APIEventos::class, 'index']);
$router->get('/api/juegos', [APIJuegos::class, 'index']);
$router->get('/api/juego', [APIJuegos::class, 'juego']);


$router->get('/admin/registrados', [RegistradosController::class, 'index']);

$router->get('/admin/regalos', [RegalosController::class, 'index']);

// Registro de Usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'crear']);
$router->post('/finalizar-registro/gratis', [RegistroController::class, 'gratis']);
$router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);
//$router->get('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);
//$router->post('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);

// Boleto virtual
$router->get('/boleto', [RegistroController::class, 'boleto']);

// Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/devwebcamp', [PaginasController::class, 'evento']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/workshops-conferencias', [PaginasController::class, 'conferencias']);
$router->get('/404', [PaginasController::class, 'error']);



$router->comprobarRutas();
