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
        $errores = Historial::getErrores();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $historial = new Historial($_POST['historial']);
    
            // Manejo de la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['historial']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['historial']['tmp_name']['imagen'])->fit(800, 600);
                $historial->setImagen($nombreImagen);
            }
    
            // Manejo del documento
            if ($_FILES['historial']['tmp_name']['documento']) {
                $nombreDocumento = md5(uniqid(rand(), true)) . "_" . $_FILES['historial']['name']['documento'];
                $historial->setDocumento($nombreDocumento);
            }
    
            $errores = $historial->validar();
    
            if (empty($errores)) {
                // Crear carpetas si no existen
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                if (!is_dir(CARPETA_DOCUMENTOS)) {
                    mkdir(CARPETA_DOCUMENTOS);
                }
    
                // Guardar la imagen
                if ($_FILES['historial']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
    
                // Guardar el documento
                if ($_FILES['historial']['tmp_name']['documento']) {
                    move_uploaded_file($_FILES['historial']['tmp_name']['documento'], CARPETA_DOCUMENTOS . $nombreDocumento);
                }
    
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
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['historial'];
            $historial->sincronizar($args);
            
            // Validación
            $errores = $historial->validar();
    
            // Subida de archivos
            // Manejo de la imagen
            if ($_FILES['historial']['tmp_name']['imagen']) {
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                $image = Image::make($_FILES['historial']['tmp_name']['imagen'])->fit(800, 600);
                $historial->setImagen($nombreImagen);
            }
    
            // Manejo del documento
            if ($_FILES['historial']['tmp_name']['documento']) {
                $nombreDocumento = md5(uniqid(rand(), true)) . "_" . $_FILES['historial']['name']['documento'];
                $historial->setDocumento($nombreDocumento);
            }
    
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['historial']['tmp_name']['imagen']) {
                    $image->save(\CARPETA_IMAGENES . $nombreImagen);
                }
    
                // Almacenar el documento
                if ($_FILES['historial']['tmp_name']['documento']) {
                    move_uploaded_file($_FILES['historial']['tmp_name']['documento'], \CARPETA_DOCUMENTOS . $nombreDocumento);
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
