<?php

require_once "Empleado.php";

/**
 * Clase que representa el modelo de la entidad Producto, heredando de la misma
 * 
 * @author Ing. Guillermo Rafael Vásquez Castaneda <memuxit@gmail.com>
 * @version 1.0
 */
class ProductosModel extends Empleado
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
        $this->tabla = "empleados";
        parent::__construct($datasource);
    }

    /**
     * Metodo que guarda un nuevo registro de la entidad Producto
     *
     * @return void
     */
    public function save()
    {
        //INSERT INTO `empleados` (`id`, `id_departamento`, `nombre`, `apellido`, `pago_hora`, `horas`) VALUES (NULL, '4', 'andrea', 'morales', '10', '20');
        $query = "INSERT INTO {$this->tabla} (id_departamento, nombre, apellido, pago_hora, horas) VALUES (:id_departamento, :nombre, :apellido, :pago_hora, :horas)";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id_departamento" => $this->id_departamento,":nombre" => $this->nombre, ":apellido" => $this->apellido, ":pago_hora" => $this->pago_hora, ":horas" => $this->horas));
    }

    /**
     * Metodo que modifica un registro de la entidad Producto
     *
     * @return void
     */
    public function update()
    {
        $query = "UPDATE {$this->tabla} SET nombre = :nombre, apellido = :apellido, pago_hora = :pago_hora, horas = :horas  WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":nombre" => $this->nombre, ":apellido" => $this->apellido, ":pago_hora" => $this->pago_hora, ":horas" => $this->horas, ":id" => $this->id));
    }

    /**
     * Metodo que devuelve un arreglo de registros de la entidad Producto
     *
     * @return array arreglo de objetos de la entidad Producto
     */
    public function all()
    {
        $empleados = array();
        $query = "SELECT * FROM {$this->tabla}";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($empleado = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($empleados, $empleado);
        }
        return $empleados;
    }

    /**
     * Metodo que elimina un registro de la entidad Producto
     * @param int id de la entidad a eliminar
     * @return void
     */

    public function find($id)
    {
        $query = "SELECT * FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
    }
}