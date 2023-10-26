<?php
function registrar_usuario($Id, $nombre, $apellido, $fecha, $edad, $correo, $contraseña, $sitio){

    $exit = "";// se inicializa la variable
    //se hace la conexion con la base de datos
    $conexion= new mysqli('localhost', 'root', 'root', 'tour_people');
    $sql = "INSERT INTO registro(Id, nombre, apellido, fecha_nacimiento, edad, correo, contraseña, sitio) VALUES ('$Id', '$nombre', '$apellido', '$fecha', '$edad', '$correo', '$contraseña', '$sitio')";//se ejecuta una consulta
    $resultado = $conexion->query($sql);//recorre el recordset
    
  
    
    //Se una fila ha sido afecta, agregada, marque...
    if($resultado == true){

        $exit = 1; //éxito.
        

    }else{

        $exit = 0; //fracaso agregando fila.
    }

    $conexion->close(); //Cerramos la conexion.

    return $exit; // retorna LA FUNCION.
}

echo registrar_usuario();

function perfil($usuario){
    $salida = '';
    $conexion= new mysqli('localhost', 'root', 'root', 'tour_people');
    $mostrar = "SELECT * FROM usuario where id_documento ='$usuario'";
    $resultado = $conexion->query($mostrar);
    if($resultado == true){
    
            while($fila = mysqli_fetch_assoc($resultado)){
                $salida .= "<a href='". $fila['sitio']. "'>";
                $salida .= 've directo a mi sitio';
                $salida .= "</a>";
            }
        
    }
    $conexion->close(); //Cerramos la conexion.

    return $salida;
}


?>