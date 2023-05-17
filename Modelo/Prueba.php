<?php
require 'Conexion.php';

$id=0;
$modelo= new Conexion();
$conexion=$modelo->obtener_conexion_oracle();
$sql="insert into pais values(pais_pk.nextval, 'Holanda9') returning id_pais into :id";

$estado=$conexion->prepare($sql);
$estado->bindParam(':id',$id,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);

$estado->execute();
echo $id;
?>