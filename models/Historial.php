<?php
namespace Model;

use Model\ActiveRecord;

class Historial extends ActiveRecord
{
    protected static $tabla = 'historial';
    protected static $columnasDB = ['id', 'titulo', 'descripcion', 'contacto3_id', 'imagen', 'documento', 'fecha_inicio', 'fecha_actualizacion'];
    
    public $id;
    public $titulo;
    public $descripcion;
    public $contacto3_id;
    public $imagen;
    public $documento;
    public $fecha_inicio;
    public $fecha_actualizacion;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->contacto3_id = $args['contacto3_id'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->documento = $args['documento'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? null;
        $this->fecha_actualizacion = date('Y/m/d');
    }

    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
    
        if (!$this->contacto3_id) {
            self::$errores[] = "Debes añadir un contacto";
        }

        if (!$this->imagen) {
            self::$errores[] = 'La imagen del proyecto es obligatoria';
        }

        if (!$this->fecha_inicio) {
            self::$errores[] = "La Fecha de inicio es obligatoria";
        }

        
        //  if (!$this->documento) {
        //      self::$errores[] = "El documento es obligatorio";
        //  }
    
        return self::$errores;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }
}