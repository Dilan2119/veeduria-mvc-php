<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Contacto;
use Model\Historial;
use Intervention\Image\ImageManagerStatic as Image;
use Model\ProyectosEjecucion;

class Proyectos_ejecucionController
{

    public static function crear(Router $router)
    {

        $proyectos_ejecucion = new ProyectosEjecucion();
        $contactos = Contacto::all();

        //Arreglo con mensajes de errores 

        $errores = ProyectosEjecucion::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            /**Crea una nueva instancia */
            $proyectos_ejecucion = new ProyectosEjecucion($_POST['proyectos_ejecucion']);
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //Setear la imagen
            //Realiza un resize a la imagen con intervention
            if ($_FILES['proyectos_ejecucion']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['proyectos_ejecucion']['tmp_name']['imagen'])->fit(800, 600);
                $proyectos_ejecucion->setImagen($nombreImagen);
            }
        
            //Validar
            $errores = $proyectos_ejecucion->validar();
        
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
                $proyectos_ejecucion->guardar();
        
                
            }
        }
       
        $router->render('/proyectos_ejecucion/crear', [
            'proyectos_ejecucion' => $proyectos_ejecucion,
            'contactos' => $contactos,
            'errores' => $errores
        ]);
    }



    public static function actualizar(Router $router)
    {
       $id = validarORedireccionar('/admin');
       $proyectos_ejecucion = ProyectosEjecucion::find($id);

       $contactos = Contacto::all();

       $errores = ProyectosEjecucion::getErrores();



       //Metodo POST para actualizar
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        //Asignar los atributos
        $args =$_POST['proyectos_ejecucion'];
    
        $proyectos_ejecucion->sincronizar($args);
        
        //Validacion
        $errores = $proyectos_ejecucion->validar();
        //Subida de archivos
        //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
        if ($_FILES['proyectos_ejecucion']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['proyectos_ejecucion']['tmp_name']['imagen'])->fit(800, 600);
            $proyectos_ejecucion->setImagen($nombreImagen);
            
        }  
        if (empty($errores)) {
            //Almacenar la imagen
            if ($_FILES['proyectos_ejecucion']['tmp_name']['imagen']) {
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $proyectos_ejecucion->guardar();
        }
        
    }

       $router->render('/proyectos_ejecucion/actualizar', [
        'proyectos_ejecucion' => $proyectos_ejecucion,
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
                    $proyectos_ejecucion = ProyectosEjecucion::find($id);
                    $proyectos_ejecucion->eliminar();
                }
            }
        }
    }
}
