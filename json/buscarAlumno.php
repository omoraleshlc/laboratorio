  <meta charset="UTF-8">
<?php require_once '../config.inc.php';

$json_d = array();
$json_d = file_get_contents('php://input');
$obj_d = json_decode($json_d);
//$usuario = mysql_real_escape_string($obj_d->usuario);
//$q = mysql_real_escape_string($obj_d->q);
//$result_codigos = array();
//$entidad  = mysql_real_escape_string($obj_d->entidad);
//$data = mysql_real_escape_string($data['matricula']);


$matricula = $obj_d->matricula;






 //$matricula='412321312';
 //$obj_d->id_escuela = 15;

   
if($matricula){

 $sql = "SELECT * "
        . ""
        . " FROM identificacionAlumno where matricula = '$matricula' and "
        . " id_escuela = '$obj_d->id_escuela' ";

$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($rPx = $result->fetch_assoc()) {
      
        echo utf8_encode($rPx['nombre']);
        
        $nombreCompleto   = $rPx['nombre']." ".$rPx['nombre2']
                ." ".$rPx['apellidoPaterno']." ".$rPx['apellidoMaterno'];
        $nombreCompleto   = utf8_encode(str_replace("  ", " ", $nombreCompleto));

        $data[] = array(
            'matricula'             => $rPx['matricula'],
            'grado'                 => $rPx['grado'],
            'escuela'               => $rPx['id_escuela'],
            'fecha'                 => $rPx['fecha'],
            'nombre'                => utf8_encode($rPx['nombre']),
            'edad'                => $rPx['edad'],
            'sexo'                => $rPx['sexo'],
            'nombre2'                => utf8_encode($rPx['nombre2']),
            'apellidoPaterno'                => utf8_encode($rPx['apellidoPaterno']),
            'apellidoMaterno'                => utf8_encode($rPx['apellidoMaterno']),
        );
        
    }
   
    

   
        print json_encode($data);
       
   
}
}?>
  </meta>

 