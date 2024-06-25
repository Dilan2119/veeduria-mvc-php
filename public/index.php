<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\ContactoController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use Controllers\Proyectos_ejecucionController;
use Controllers\HistorialController;
use MVC\Router;

$router = new Router();

//Zona privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->post('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->get('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/eliminar', [PropiedadController::class, 'eliminar']);
$router->get('/proyectos/gestionProyectos', [PropiedadController::class, 'gestionproyectos']);

$router->get('/proyectos_ejecucion/crear', [Proyectos_ejecucionController::class, 'crear']);
$router->post('/proyectos_ejecucion/crear', [Proyectos_ejecucionController::class, 'crear']);
$router->get('/proyectos_ejecucion/actualizar', [Proyectos_ejecucionController::class, 'actualizar']);
$router->post('/proyectos_ejecucion/actualizar', [Proyectos_ejecucionController::class, 'actualizar']);
$router->post('/proyectos_ejecucion/eliminar', [Proyectos_ejecucionController::class, 'eliminar']);

$router->get('/contactos/administrarContacto', [ContactoController::class, 'administrarcontacto']);
$router->get('/contactos/crear', [ContactoController::class, 'crear']);
$router->post('/contactos/crear', [ContactoController::class, 'crear']);
$router->get('/contactos/actualizar', [ContactoController::class, 'actualizar']);
$router->post('/contactos/actualizar', [ContactoController::class, 'actualizar']);
$router->post('/contactos/eliminar', [ContactoController::class, 'eliminar']);

$router->get('/historial/participacionCiudadana', [HistorialController::class, 'participacionCiudadana']);
$router->get('/historial/crear', [HistorialController::class, 'crear']);
$router->post('/historial/crear', [HistorialController::class, 'crear']);
$router->get('/historial/actualizar', [HistorialController::class, 'actualizar']);
$router->post('/historial/actualizar', [HistorialController::class, 'actualizar']);
$router->post('/historial/eliminar', [HistorialController::class, 'eliminar']);

//Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/proyecto', [PaginasController::class, 'proyecto']);
$router->get('/proyectos', [PaginasController::class, 'proyectos']);
$router->get('/proyectos_ejecucion', [PaginasController::class, 'proyectos_ejecucion']);
$router->get('/HistorialParticipativo', [PaginasController::class, 'HistorialParticipativo']);
$router->get('/historia', [PaginasController::class, 'historia']);
$router->get('/informar', [PaginasController::class, 'informar']);
$router->post('/informar', [PaginasController::class, 'informar']);

//Login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
