<?php


class Empleado
{
    /**
     * Atributos de la clase
     *
     * @var object
     */
    protected $id;
    protected $id_departamento;
    protected $nombre;
    protected $apellido;
    protected $horas;
    protected $pago_hora;
    protected $datasource;

     /**
     * Setter de los atributos
     *
     * @param string nombre del atributo
     * @param object valor para el atributo
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Getter de los atributos
     *
     * @param string nombre del atributo
     * @return object valor del atributo
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Constructor de la clase
     *
     * @param PDO conexion con la base de datos
     */
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
    }
}
