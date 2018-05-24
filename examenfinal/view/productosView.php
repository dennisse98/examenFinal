
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>CRUD para empleados</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="padding-top: 1rem;">Ingreso de empleados</h1>
        <form action="index.php?controller=empleados&action=agregar" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="nombre">Nombres:</label>
                    <input type="text" class="form-control" name="nombres" id="nombre" required autofocus>
                </div>
                <div class="col">
                    <label for="apellido">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="pagora">Pago por hora:</label>
                    <input type="number" class="form-control" name="pago" id="pagora" required>
                </div>
                <div class="col">
                    <label for="horas">Horas trabajadas:</label>
                    <input type="number" class="form-control" name="horas" required>
                </div>
                <div class="col">
                    <label for="departamentos">Departamento:</label>
                    <select class="form-control" name="departamento" id="departamentos">
                                        <?php  foreach ($departamentos as $departamento) { ?>
                                            
                                              <option value="<?=$departamento->id ?>"><?=$departamento->id;?></option>
                                        <?php } ?>
                                        </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col" style="padding-top: 1rem;">
                    <input type="submit" class="btn btn-outline-primary" value="Agregar">
                </div>
            </div>
        </form>
        <h1 class="text-center">Listado de empleados</h1>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Salario neto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($empleados as $empleado) { ?>
                <tr>
                <td><?=$empleado->nombre;?></td>
                <td><?=$empleado->apellido;?></td>
                <td><?=$empleado->id_departamento;?></td>
                <td><?php
                     $salario = $empleado->pago_hora*$empleado->horas;
                     $renta = $salario * 0.10;
                     $afp = $salario * 0.04;
                     $isss = $salario * 0.07;
                     $total = $salario - ($renta + $afp + $isss);
                     echo $total;
                     ?>
                         
                     </td>
                
                <td>
                <button onclick="window.location.href='index.php?controller=empleados&action=modificar&id=<?=$empleado->id;?>'">Modificar</button>
                <button onclick="window.location.href='index.php?controller=empleados&action=eliminar&id=<?=$empleado->id;?>'">Eliminar</button>
                </td>
            </tr>
        <?php $totalf+=$total;  } ?>
        </tbody>
        </table>
        <h3 class="text-center">Total de planilla: $ <?php echo $totalf; ?></h3>

    </div>
</body>
</html>
