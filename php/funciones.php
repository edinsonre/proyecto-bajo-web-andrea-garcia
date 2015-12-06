<?php 


function listadoCategorias()
{
	//realizamos la conexion mediante odbc
	$conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

    $consulta="SELECT CODIGOCATEGORIA,UPPER(NOMBRECATEGORIA) As NOMBRECATEGORIA 
    FROM categorias ORDER BY NOMBRECATEGORIA";
    //almacena el resultado de la consulta
    $result = odbc_exec($conn, $consulta)or die(odbc_errormsg());
   
//crea variable de tipo array
    $categotia= array();
    while ($row = odbc_fetch_array($result)){
    	 array_push($categotia, $row);
    }
    return json_encode($categotia);
    odbc_close($conn);
}

function listadoSO()
{
	//realizamos la conexion mediante odbc
	$conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

    $consulta="SELECT CODIGOSO,UPPER(NOMBRESO) As NOMBRESO FROM sistemaop 
    ORDER BY NOMBRESO";
    //almacena el resultado de la consulta
    $result = odbc_exec($conn, $consulta)or die(odbc_errormsg());
   
//crea variable de tipo array
    $SO= array();
    while ($row = odbc_fetch_array($result)){
    	 array_push($SO, $row);
    }
    return json_encode($SO);
    odbc_close($conn);
}

function listadoDepartamentos()
{
	//realizamos la conexion mediante odbc
	$conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

    $consulta="SELECT CODIGODEPART,UPPER(NOMBREDEPART) As NOMBREDEPART 
    FROM departamentos ORDER BY NOMBREDEPART";
    //almacena el resultado de la consulta
    $result = odbc_exec($conn, $consulta)or die(odbc_errormsg());
   
//crea variable de tipo array
    $DEPART= array();
    while ($row = odbc_fetch_array($result)){
    	 array_push($DEPART, $row);
    }
    return json_encode($DEPART);
    odbc_close($conn);
}

function listadoCiudades()
{
	//realizamos la conexion mediante odbc
	$conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

    $consulta="SELECT CODIGOCIUDAD,UPPER(NOMBRECIUDAD) As NOMBRECIUDAD, DEPARTAMENTOS_CODIGODEPART 
    FROM ciudades ORDER BY NOMBRECIUDAD";
    //almacena el resultado de la consulta
    $result = odbc_exec($conn, $consulta)or die(odbc_errormsg());
   
//crea variable de tipo array
    $CIUDAD= array();
    while ($row = odbc_fetch_array($result)){
    	 array_push($CIUDAD, $row);
    }
    return json_encode($CIUDAD);
    odbc_close($conn);
}

function listadoProductosPorSO($CODIGOSO)
{
   //realizamos la conexion mediante odbc
	$conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

    $consulta="SELECT productos.CODIGOPRODUCTO, UPPER(productos.NOMBREPRODUCTO) As NOMBREPRODUCTO, 
    productos.DESCRIPCIONPUB, productos.PRECIOPUBLICO, productos.CANTIDADDISPONIBLE,  
    productos.TIPOPRODUCTO, productos.ESPECIFICACIONTEC, productos.VIDEO,
    FABRICANTES.NOMBREFABRICANTE , CATEGORIAS.NOMBRECATEGORIA
    FROM productos, fabricantes, categorias where  
    productos.FABRICANTES_CODFABRICANTE =FABRICANTES.CODFABRICANTE 
    and categorias.CODIGOCATEGORIA= productos.CATEGORIAS_CODIGOCATEGORIA AND productos.SISTEMAOP_CODIGOSO='".$CODIGOSO."'
    ORDER BY productos.NOMBREPRODUCTO";
    //almacena el resultado de la consulta
    $resultado = odbc_exec($conn, $consulta)or die(odbc_errormsg());
  //exit($resultado);
   // echo get_resource_type ( $resultado);

//crea variable de tipo array
   $SO= array();
    while ($row =  odbc_fetch_array($resultado)){
        array_push($SO, $row);
        
        //$SO = $row;
     // echo $row['CODIGOPRODUCTO'];
      //echo $row['DESCRIPCIONPUB'];
    }
 //return print_r($SO);
   if (!json_encode($SO)){
       exit ("problemas al imprimir con json_encode");
        
    }else{
        return json_encode($SO);
    }
 
    //cierra la conexion
  odbc_close($conn); 

}


function InsertUsuario($CodigoUsuario, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $Mail, $Contraseña, $FechaNacimiento, $Ciudades_CodigoCiudad, $Sexo)
    {
        $conn=odbc_connect("cnx_sistemaBD", "ANDREA", "1234")or die(odbc_errormsg());

        $consulta = "INSERT INTO Usuarios(CODIGOUSUARIO, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MAIL, CONTRASENA, FECHANACIMIENTO, CIUDADES_CODIGOCIUDAD, SEXO) 
                     VALUES ('$CODIGOUSUARIO', '$NOMBRE1', '$NOMBRE2', '$APELLIDO1', '$APELLIDO2', '$MAIL', '$CONTRASENA', '$FECHANACIMIENTO', '$Ciudades_CodigoCiudad', '$SEXO')";
                    
        $query = odbc_exec($conn, $consulta) or die(odbc_errormsg());

        return json_encode($query);
        
        odbc_close($conn);
        
    }






 ?>