<?php
namespace Model;

use Model\ActiveRecord;

class Proyecto extends ActiveRecord
{
    protected static $tabla ='proyectos';
    protected static $columnasDB =['id', 'titulo', 'precio', 'imagen', 'descripcion', 'creado', 'contacto_id'];
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $creado;
    public $contacto_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        $this->contacto_id = $args['contacto_id'] ?? '';
    }
    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
    
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
    
        if (!$this->contacto_id) {
            self::$errores[] = "Debes añadir un contacto";
        }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen del proyecto es obligatoria';
         }
    
        return self::$errores;
    }
}
