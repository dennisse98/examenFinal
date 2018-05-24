<?php

require_once "departamentos.php";

/**
 * Clase que representa el modelo de la entidad Producto, heredando de la misma
 * 
 * @author Ing. Guillermo Rafael Vásquez Castaneda <memuxit@gmail.com>
 * @version 1.0
 */
class DepartamentosModel extends Departamento
{
    /**
     * Atributo de la clase
     *
     * @var string
     */
    private $tabla;

    /**
     * Constructor de la clase que a su vez, llama al constructor padre
     *
     * @param PDO conexion con la base de datos
     */
    public function __construct($datasource)
    {
        $this->tabla = "departamentos";
        parent::__construct($datasource);
    }

    
    public function all()
    {
        $departamentos = array();
        $query = "SELECT * FROM {$this->tabla}";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($departamento = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($departamentos, $departamento);
        }
        return $departamentos;
    }

    
}