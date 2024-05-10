<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\ContactoController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use MVC\Router;

$router = new Router();

//Zona privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->post('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->get('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/contactos/crear', [ContactoController::class, 'crear']);
$router->post('/contactos/crear', [ContactoController::class, 'crear']);
$router->get('/contactos/actualizar', [ContactoController::class, 'actualizar']);
$router->post('/contactos/actualizar', [ContactoController::class, 'actualizar']);
$router->post('/contactos/eliminar', [ContactoController::class, 'eliminar']);

//Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/proyecto', [PaginasController::class, 'proyecto']);
$router->get('/proyectos', [PaginasController::class, 'proyectos']);
$router->get('/HistorialParticipativo', [PaginasController::class, 'HistorialParticipativo']);
$router->get('/entrada', [PaginasController::class, 'HistorialParticipativo']);
$router->get('/informar', [PaginasController::class, 'informar']);
$router->post('/informar', [PaginasController::class, 'informar']);

//Login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
