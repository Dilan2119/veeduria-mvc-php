<?php
namespace Model;

use Model\ActiveRecord;

class ProyectosEjecucion extends ActiveRecord
{
    protected static $tabla ='proyectos_ejecucion';
    protected static $columnasDB =['id', 'nombre', 'descripcion', 'inversion','contacto2_id', 'imagen', 'fecha_inicio', 'progreso', 'fecha_actualizacion'];
    
    public $id;
    public $nombre;
    public $descripcion;
    public $inversion;
    public $contacto2_id;
    public $imagen;
    public $fecha_inicio;
    public $progreso;
    public $fecha_actualizacion;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->inversion = $args['inversion'] ?? '';
        $this->contacto2_id = $args['contacto2_id'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? null;
        $this->progreso = $args['progreso'] ?? '';
        $this->fecha_actualizacion = date('Y/m/d');
        
        
    }
    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }
    
        if (!$this->progreso) {
            self::$errores[] = "El progreso es obligatorio";
        }
    
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }

        if (!$this->inversion) {
            self::$errores[] = "La inversion es obligatoria";
        }
    
        if (!$this->contacto2_id) {
            self::$errores[] = "Debes añadir un contacto";
        }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen del proyecto es obligatoria';
         }

         if (!$this->fecha_inicio) {
            self::$errores[] = "La Fecha de inicio es obligatoria";
        }
    
        return self::$errores;
    }
}
