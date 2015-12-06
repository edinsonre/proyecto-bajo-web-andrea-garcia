<?php 

	include("funciones.php");


	/*$CodigoUsuario = $_GET["CodigoUsuario"];
	$Nombre1 = $_GET["Nombre1"];
	$Nombre2 = $_GET["Nombre2"];
	$Apellido1 = $_GET["Apellido1"];
	$Apellido2 = $_GET["Apellido2"];
	$Mail = $_GET["Mail"];
	$Contraseña = $_GET["Contraseña"];
	$FechaNacimiento = $_GET["FechaNacimiento"];
	$Ciudades_CodigoCiudad = $_GET["Ciudades_CodigoCiudad"];
	$Sexo = $_GET["Sexo"];*/


	
	$CodigoUsuario = "1065641890";
	$Nombre1 = "edison";
	$Nombre2 = "Alberto";
	$Apellido1 = "ramos";
	$Apellido2 = "Ramos";
	$Mail = "edison@outlook.com";
	$Contraseña = "920624";
	$FechaNacimiento = "24/06/1992";
	$Ciudades_CodigoCiudad = "1";
	$Sexo = "M";
 
 echo	InsertUsuario($CodigoUsuario, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $Mail, $Contraseña, $FechaNacimiento, $Ciudades_CodigoCiudad, $Sexo);


 ?>