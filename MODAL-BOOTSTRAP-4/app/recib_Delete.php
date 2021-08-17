<?php
include('config.php');
$idRegistros = $_POST['id'];

$DeleteRegistro = ("DELETE FROM clientes WHERE id= '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);
?>