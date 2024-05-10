<?php
namespace Controllers;

use Model\Contacto;
use MVC\Router;

class ContactoController
{
    public static function crear(Router $router)
    {

        $errores = Contacto::getErrores();

        $contacto = new Contacto;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //CREAR UNA NUEVA INSTANCIA
            $contacto = new Contacto($_POST['contacto']);
            //Validar los campos vacios
            $errores = $contacto->validar();
            //No hay errores
            if (empty($errores)) {
                $contacto->guardar();
            }
        }

        $router->render('contactos/crear', [
            'errores' => $errores,
            'contacto' => $contacto,
        ]);
    }
    public static function actualizar(Router $router)
    {
        $errores = Contacto::getErrores();
        $id = validarORedireccionar('/admin');

        //Obtener datos del vendedor a actualizar
        $contacto = Contacto::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //aSIGNAR LOS VALORES
            $args = $_POST['contacto'];
            //Sincornizar onjeto en memoria con lo que el usuario escribio
            $contacto->sincronizar($args);
            //Validacion
            $errores = $contacto->validar();

            if (empty($errores)) {
                $contacto->guardar();
            }
        }

        $router->render('contactos/actualizar', [
            'errores' => $errores,
            'contacto' => $contacto,
        ]);

    }
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //validaar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                //valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    $contacto = Contacto::find($id);
                    $contacto->eliminar();
                }
            }

        }
    }
}
