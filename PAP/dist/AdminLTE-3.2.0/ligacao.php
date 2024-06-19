<?php
$con = mysqli_connect("localhost","root","") or die (mysqli_error()."Erro ao tentar ligar-se a base de dados");

$selecionar = mysqli_select_db($con,"motospeed") or die (mysqli_error()."Erro ao tentar ligar-se a base de dados");
?>