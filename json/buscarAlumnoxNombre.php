<?php require_once '../config.inc.php';

$json_d = array();
$json_d = file_get_contents('php://input');
$obj_d = json_decode($json_d);
//$usuario = mysql_real_escape_string($obj_d->usuario);
//$q = mysql_real_escape_string($obj_d->q);
//$result_codigos = array();
//$entidad  = mysql_real_escape_string($obj_d->entidad);
//$data = mysql_real_escape_string($data['matricula']);

$q = $obj_d->q;


#variables
$detectar= substr($q,0,1);
$detectarN= substr($q,1,2);

$string = array();




 
/*
    $split      = explode(" ", $q);
    $sql_like   = "";
    foreach ($split as $row){
        $sql_like .= " 
            UPPER(
                CONCAT_WS(' ', 
                    COALESCE(nombre1,''), 
                    COALESCE(nombre2,''), 
                    COALESCE(apellido1,''), 
                    COALESCE(apellido2,'')
                )
            ) LIKE '%$row%' AND";
    }
    if($sql_like != ""){
        $sql_like = substr($sql_like, 0, -3);
    }
    */
   
if($q){
$sql = "SELECT *, "
        . "(select descripcion from listaEscuelas where "
        . "id_escuela = identificacionAlumno.id_escuela) descripcionEscuela, id_escuela "
        . " FROM identificacionAlumno where (matricula = '$q') or ("
        . "nombre like '%$q%' or "
        . "apellidoPaterno like '%$q%' or "
            . "apellidoMaterno like '%$q%' "
        . ") or (id_escuela = (select id_escuela from listaEscuelas where descripcion like '%$q%' limit 1))";



$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($rPx = $result->fetch_assoc()) {
      
        $nombreCompleto   = $rPx['nombre']." ".$rPx['nombre2']
                ." ".$rPx['apellidoPaterno']." ".$rPx['apellidoMaterno'];
        $nombreCompleto   = utf8_encode(str_replace("  ", " ", $nombreCompleto));

        $data[] = array(
            'matricula'             => $rPx['matricula'],
            'grado'                 => $rPx['grado'],
            'nombre'                => $rPx['nombre'],
            'escuela'               => $rPx['descripcionEscuela'],
            'fecha'                 => $rPx['fecha'],
            'nombre'                => $rPx['nombre'],
            'edad'                => $rPx['edad'],
            'sexo'                => $rPx['sexo'],
            'nombre2'                => $rPx['nombre2'],
            'apellidoPaterno'                => $rPx['apellidoPaterno'],
            'apellidoMaterno'                => $rPx['apellidoMaterno'],
            'nombreCompleto'                => $nombreCompleto,
            'id_escuela'                    => $rPx['id_escuela'],
        );
        
    }
   
    

   
        print json_encode($data);
       
   
}
}


 