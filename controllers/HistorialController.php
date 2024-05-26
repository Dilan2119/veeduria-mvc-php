<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Contacto;
use Model\Historial;
use Intervention\Image\ImageManagerStatic as Image;
use Model\ProyectosEjecucion;

class HistorialController
{

    public static function participacionCiudadana(Router $router)
    {
        $historial = Historial::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('/historial/participacionCiudadana', [
            'historial' => $historial,
            'resultado' => $resultado
            
        ]);
    }

    public static function crear(Router $router)
    {

        $historial = new Historial();
        $contactos = Contacto::all();

        //Arreglo con mensajes de errores 

        $errores = Historial::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            /**Crea una nueva instancia */
            $historial = new Historial($_POST['historial']);
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //Setear la imagen
            //Realiza un resize a la imagen con intervention
            if ($_FILES['historial']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['historial']['tmp_name']['imagen'])->fit(800, 600);
                $historial->setImagen($nombreImagen);
            }
        
            //Validar
            $errores = $historial->validar();
        
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
                $historial->guardar();
        
                
            }
        }
       
        $router->render('/historial/crear', [
            'historial' => $historial,
            'contactos' => $contactos,
            'errores' => $errores
        ]);
    }



    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $historial = Historial::find($id);
        $contactos = Contacto::all();
        $errores = Historial::getErrores();
    
        // Método POST para actualizar
       
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        //Asignar los atributos
        $args =$_POST['historial'];
    
        $historial->sincronizar($args);
        
        //Validacion
        $errores = $historial->validar();
        //Subida de archivos
        //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
        if ($_FILES['historial']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['historial']['tmp_name']['imagen'])->fit(800, 600);
            $historial->setImagen($nombreImagen);
            
        }  
        if (empty($errores)) {
            //Almacenar la imagen
            if ($_FILES['historial']['tmp_name']['imagen']) {
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $historial->guardar();
        }
        
    }
    
        $router->render('/historial/actualizar', [
            'historial' => $historial,
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
                    $historial = Historial::find($id);
                    $historial->eliminar();
                }
            }
        }
    }
}
