<?php
namespace Controllers;

use Model\Historial;
use Model\Proyecto;
use Model\ProyectosEjecucion;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

        $proyectos = Proyecto::get(3);
        $proyectos_ejecucion = ProyectosEjecucion::get(3);
        $inicio = true;

        $router->render('paginas/index', [

            'proyectos' => $proyectos,
            'proyectos_ejecucion' => $proyectos_ejecucion,
            'inicio' => $inicio,

        ]);
    }
    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros');
    }
    public static function proyectos(Router $router)
    {

        $proyectos = Proyecto::all();
        $proyectos_ejecucion = ProyectosEjecucion::all();
        

        $router->render('paginas/proyectos', [
            'proyectos' => $proyectos,
            'proyectos_ejecucion' => $proyectos_ejecucion,

            

        ]);
    }
    public static function proyectos_ejecucion(Router $router)
    {

        $id = validarORedireccionar('/proyectos');
        $proyectos_ejecucion  = ProyectosEjecucion::find($id);

        $router->render('paginas/proyectos_ejecucion', [
            
            'proyectos_ejecucion' => $proyectos_ejecucion,

        ]);
    }
    public static function proyecto(Router $router)
    {

        $id = validarORedireccionar('/proyectos');

        //Buscar la propiedad por su id
        $proyecto = Proyecto::find($id);
        

        $router->render('paginas/proyecto', [
            'proyecto' => $proyecto,
            

        ]);
    }
    public static function HistorialParticipativo(Router $router)
    {
        $router->render('paginas/HistorialParticipativo');
    }
    public static function informar(Router $router)
    {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['informar'];
           // debuguear($respuestas);
            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';

            //Configurando el cntenido del email
            $mail->setFrom('plandedesarrolloelzulia2427@gmail.com');
            $mail->addAddress('plandedesarrolloelzulia2427@gmail.com', 'VeeduriaDigital');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenidoo
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            

            //Enviar de forma condicionar algunos campos de email o telefono

            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligio ser contactado por telefono: </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';

            }else{
                //Es email, entonces agregamos el campo de email
                $contenido .= '<p>Eligio ser contactado por email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';

            }
            
            $contenido .= '<p>Estado del Proyecto: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';
           
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Envial el email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje =  "El mensaje no se pudo enviar...";
            }

        }

        $router->render('paginas/informar', [
            'mensaje' => $mensaje
        ]);
    }
    public static function HistorialPController( Router $router ) {

        //$router->render('paginas/blog');
    
        $historial = Historial::all();
        $router->render('paginas/historial', [
        'historial' => $historial
        ]);
        
        }
        
        public static function entrada( Router $router ) {
        
        //$router->render('paginas/entrada');
        $id = validarORedireccionar('/HistorialParticipativo');
        
        // Obtener los datos de la propiedad
        $historial = Historial::find($id);
        $router->render('paginas/historial', [
        'historial' => $historial
        
        ]);
        
        }
}
