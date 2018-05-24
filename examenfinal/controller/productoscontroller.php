<?php 
require_once "core/DataSource.php";
require_once "model/ProductosModel.php";
require_once "model/DepartamentosModel.php";

if(isset($_GET["action"])){

	if($_GET["action"] == "index"){
		index();
	}elseif ($_GET["action"] == "agregar") {
		agregar();
	
	}elseif ($_GET["action"] == "modificar") {
		modificar();
	
	}elseif ($_GET["action"] == "eliminar") {
		eliminar();
	}else{
		index();
	}
}else{
	index();
}

//Metodo que muestra el listado de productos en la lista de productos

/**
*Metodo que permite agregar un nuevo producto
*@return void
*/

function index(){
	$datasource = new DataSource();
	$empleado = new ProductosModel($datasource->conectar());
	$departamento = new DepartamentosModel($datasource->conectar());
	$empleados = $empleado->all();
	$departamentos = $departamento->all();
	require_once "view/productosView.php";
}
/**
*Metodo que permite agregar un nuevo producto
*@return void
*/

function agregar()
{
	if (isset($_POST["nombre"])) {
		$datasource = new DataSource();
		$empleado = new ProductosModel($datasource->conectar());
		$empleado->id_departamento = $_POST["departamentos"];
		$empleado->nombre = $_POST["nombre"];
		$empleado->apellido = $_POST["apellido"];
		$empleado->pago_hora = $_POST["pago_hora"];
		$empleado->horas = $_POST["horas"];
	    $empleado->save();
	}
	header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);

}

/**
*Metodo que permite agregar un nuevo producto
*@return void
*/

function modificar()
{
	if (isset($_POST["nombre"])) {
		$datasource = new DataSource();
		$empleado = new ProductosModel($datasource->conectar());
		$empleado->id = $_POST["id"];
		$empleado->nombre = $_POST["nombre"];
		$empleado->apellido = $_POST["apellido"];
		$empleado->pago_hora = $_POST["pago_hora"];
		$empleado->horas = $_POST["horas"];
		$empleado->id_departamento = $_POST["departamentos"];
	    $empleado->update();
	    header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
	}
	elseif (isset($_GET["id"]) && $_GET["id"] != null) {
		$datasource = new DataSource();
		$empleado = new ProductosModel($datasource->conectar());
		$empleados = $empleado->find($_GET["id"]);
		require_once "view/modificarproductoView.php";
	}else{
		header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);

	}
    
}

/**
*Metodo que permite agregar un nuevo producto
*@return void
*/

function eliminar()
{
	if (isset($_GET["id"]) && $_GET["id"] != null) {
		$datasource = new DataSource();
		$empleado = new ProductosModel($datasource->conectar());
		$empleado->delete($_GET["id"]);
	}
	header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
}
