<?php
namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }
    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas..
        $rutas_protegidas =['/admin','/proyectos/crear','/proyectos/actualizar','/proyectos/eliminar',
        '/contactos/crear','/contactos/actualizar','/contactos/eliminar'];

        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            //debuguear($_POST);
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }else{
            if (($urlActual == "/login" || $urlActual == "/registro") && $auth) {
                header('Location: /');
            }
        }
        if ($fn) {
            //La url existe y hay una funcion asociada
            //debuguear($this);
            call_user_func($fn, $this);
        } else {
            echo 'Pagina no encontrada';
        }
    }

    //Muestra una vista
    public function render($view, $datos = [])
    {

        foreach($datos as  $key => $value){
            $$key = $value;
        }
        ob_start(); //Para que almacene y guarde en memoria el valor
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //Limpia el buffer
        include_once __DIR__ . '/views/layout.php';;

    }
}
