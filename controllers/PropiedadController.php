<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Contacto;
use Model\Historial;
use Model\ProyectosEjecucion;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{

    public static function index(Router $router)
    {
       // $proyectos = Proyecto::all();

       // $contacto = Contacto::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('proyectos/admin', [
            // 'proyectos' => $proyectos,
            'resultado' => $resultado,
            // 'contactos' => $contacto,
        ]);
    }
    public static function gestionproyectos(Router $router)
    {
        $proyectos = Proyecto::all();
        $proyectos_ejecucion = ProyectosEjecucion::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('proyectos/gestionProyectos', [
            'proyectos' => $proyectos,
            'proyectos_ejecucion' => $proyectos_ejecucion,
            'resultado' => $resultado
            
        ]);
    }
    public static function crear(Router $router)
    {

        $proyecto = new Proyecto;
        $contactos = Contacto::all();

        //Arreglo con mensajes de errores 

        $errores = Proyecto::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            /**Crea una nueva instancia */
            $proyecto = new Proyecto($_POST['proyecto']);
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //Setear la imagen
            //Realiza un resize a la imagen con intervention
            if ($_FILES['proyecto']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['proyecto']['tmp_name']['imagen'])->fit(800, 600);
                $proyecto->setImagen($nombreImagen);
            }
        
            //Validar
            $errores = $proyecto->validar();
        
            //Revisar que el array de errores este vacio
            if (empty($errores)) {
        
                /**Subida de archivos */
                //Crear la carpeta de imagenes
        
                if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
                //Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
        
                //gUARDAR EN LA BASE DE DATOS
                $proyecto->guardar();
        
                
            }
        }
       
        $router->render('proyectos/crear', [
            'proyecto' => $proyecto,
            'contactos' => $contactos,
            'errores' => $errores
        ]);
    }



    public static function actualizar(Router $router)
    {
       $id = validarORedireccionar('/admin');
       $proyecto = Proyecto::find($id);

       $contactos = Contacto::all();

       $errores = Proyecto::getErrores();



       //Metodo POST para actualizar
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        //Asignar los atributos
        $args =$_POST['proyecto'];
    
        $proyecto->sincronizar($args);
        
        //Validacion
        $errores = $proyecto->validar();
        //Subida de archivos
        //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
        if ($_FILES['proyecto']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['proyecto']['tmp_name']['imagen'])->fit(800, 600);
            $proyecto->setImagen($nombreImagen);
            
        }  
        if (empty($errores)) {
            //Almacenar la imagen
            if ($_FILES['proyecto']['tmp_name']['imagen']) {
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $proyecto->guardar();
        }
        
    }

       $router->render('/proyectos/actualizar', [
        'proyecto' => $proyecto,
        'errores' => $errores,
        'contactos' => $contactos
       ]);
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
        
                if (validarTipoContenido($tipo)) {
                    $proyecto = Proyecto::find($id);
                    $proyecto->eliminar();
                }
            }
        }
    }
}
