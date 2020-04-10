<?php

require_once "global.php";

//string de conexion a la bd
//TAREA DE INVESTIGACION SOBRE mysqli

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//query de conexion
mysqli_query($conexion, 'SET NAME "'.DB_ENCODE.'"');

//EJEMPLO SIN CONCATENAR
//mysqli_query($conexion, 'SET NAME utf8');

//tenemos que validar si hay un error al realizar la conexion
if(mysqli_connect_errno()){

    printf("No se pudo realizar la conexion a la base de datos %s\n", mysqli_connect_errno());
    exit();
}

if(!function_exists('ejecutarConsulta')){

    //ejecutar la funcion consulta
    function ejecutarConsulta($sql){

        global $conexion;
        //query ejemplo: select * from tabla
        $query = $conexion->query($sql);
        return $query;
    }

    function ejecutarConsultaSimpleFila($sql){

        global $conexon;
        //ejemplo query: select * from tabla WHERE IDTABLA = $VARIABLE
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function limpiarCandena($str){

        global $conexion;
        $str = mysqli_real_scape_string($conexion, trim(str));
        return htmlspecialchars($str);
    }
}