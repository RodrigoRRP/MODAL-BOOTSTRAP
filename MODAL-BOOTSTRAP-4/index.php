
<?php
include('app/config.php');

$sqlCliente   = ("SELECT * FROM clientes ORDER BY id DESC ");
$queryCliente = mysqli_query($con, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.ico"> <!-- icono en la pestaña -->
  <title>Modal</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="https://kit.fontawesome.com/f14aac7b2c.js" crossorigin="anonymous"></script>


</head>
<body>
  
<nav class="color-navbar">
  <h1 class="nav-titulo" >Modal</h1>
</nav>

<h4 class="titulo-secundario">Clientes Totales <?php echo $cantidad; ?> </h4>

<div class="container">
  <div class="row">
    <!-- formulario -->
    <div class="col-4 border border-1 p-3">
         <h5 class="text-center mb-4">Nuevo Cliente</h5> 
          <form class="" action="app/recibCliente.php" method="POST">
              <div class="form-group">
                  <input type="text"  name="nombre"  placeholder="Nombres" class="form-control" required=""> 
              </div>
              <div class="form-group">
                  <input type="email" name="correo" placeholder="Correo" class="form-control" required="">
              </div>
              <div class="form-group">
                 <input type="text"  name="celular" placeholder="Celular" class="form-control" required="">
              </div>
                   
                <button class=" btn btn-block btn-info mb-1" id="btnEnviar">Guardar</button>
          </form>
        
    </div>
    <!-- tabla -->
    <div class="col-8">
            <table class="table table-bordered text-center">
              <thead class="bg-primary">
                <tr>
                  <th >Nombre</th>
                  <th >Email</th>
                  <th >Celular</th>
                  <th >Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                <tr>
                  <td><?php echo $dataCliente['nombre']; ?></td>
                  <td><?php echo $dataCliente['correo']; ?></td>
                  <td><?php echo $dataCliente['celular']; ?></td>
                  
                  <td> 
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $dataCliente['id']; ?>">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['id']; ?>">
                      <i class="fas fa-edit"></i>
                      </button>
                  </td>
                  </tr>

                                    
                  <!--Ventana Modal para Actualizar--->
                  <?php  include('modals/ModalEditar.php'); ?>

                  <!--Ventana Modal para la Alerta de Eliminar--->
                  <?php include('modals/ModalEliminar.php'); ?>


              <?php } ?>

            </table>         
    </div>
  </div>
</div>


       



  


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/delete.js"></script> <!-- js encargado de eliminar registros -->
</body>
</html>