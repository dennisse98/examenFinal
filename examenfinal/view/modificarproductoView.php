<!DOCTYPE html>
<html>
<head>
	<title>Modificar el Empleado <?=$empleados->nombre;?></title>
</head>
<body>
    <h1>Modificar el empleado <?=$empleados->nombre;?></h1>
    <form action="index.php?controller=productos&action=modificar" method="post">
    	<label for="nombre">Nombre:</label>
    	<input type="text" name="nombre" id="nombre" value="<?=$empleados->nombre;?>" required>
    	<label for="apellido">Apellido:</label>
    	<input type="text" name="apellido" id="apellido" value="<?=$empleados->apellido;?>" required>
        <label for="departamento">Departamento:</label>
        <input type="text" name="departamento" id="departamentos" value="<?=$empleados->id_departamento;?>" required>
        <label for="pago_hora">Pago por hora:</label>
        <input type="text" name="pago_hora" id="pago_hora" value="<?=$empleados->pago_hora;?>" required>
        <label for="marca">Horas:</label>
        <input type="text" name="horas" id="horas" value="<?=$empleados->horas;?>" required>
    	<input type="hidden" name="id" value="<?=$empleados->id;?>">
    	<input type="submit" name="Modificar">

    </form>

</body>
</html>