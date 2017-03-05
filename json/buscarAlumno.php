
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





 //$matricula='L0312';
 //$obj_d->id_escuela = 12;

 
 
 
 
 
 
 
 
   
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
      
        
        
        $nombre =  utf8_encode($rPx['nombre']);
        $aPaterno = utf8_encode( $rPx['apellidoPaterno']);
        $aMaterno = utf8_encode( $rPx['apellidoMaterno']);

         
        $data[] = array(
            'matricula'             => $rPx['matricula'],
            'grado'                 => $rPx['grado'],
            'escuela'               => $rPx['id_escuela'],
            'fecha'                 => $rPx['fecha'],
            'nombre'                => $rPx['nombre'],
            'edad'                => $rPx['edad'],
            'sexo'                => $rPx['sexo'],
            'nombre2'                => $rPx['nombre2'],
            'apellidoPaterno'                => $aPaterno,
            'apellidoMaterno'                => $aMaterno,
        );
        


// $structure is now utf8 encoded

        
    }
   

        print json_encode($data);
       
   
}
}









?>


 