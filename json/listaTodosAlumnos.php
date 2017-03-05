<?php require_once '../config.inc.php';

$json_d = array();
$json_d = file_get_contents('php://input');
$obj_d = json_decode($json_d);



   
$sql = "SELECT *,"
        . "(select descripcion from listaEscuelas where "
        . "id_escuela = ia.id_escuela ) descripcion "
        . " FROM identificacionAlumno ia order by fecha ASC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($rPx = $result->fetch_assoc()) {
      
        $nombreCompleto   = $rPx['nombre']." ".$rPx['nombre2']
                ." ".$rPx['apellidoPaterno']." ".$rPx['apellidoMaterno'];
        $nombre =  utf8_encode($rPx['nombre']);
        $aPaterno = utf8_encode( $rPx['apellidoPaterno']);
        $aMaterno = utf8_encode( $rPx['apellidoMaterno']);
        
        $data[] = array(
            'matricula'=>$rPx['matricula'],
            'escuela'               => $rPx['descripcion'],
            'id_escuela'            => $rPx['id_escuela'],
            'nombre'                => $nombre,
            'apellidoPaterno'       => $aPaterno,
            'apellidoMaterno'       => $aMaterno,
            'fecha'                 => $rPx['fecha']
            );
        
        
    }
}
 
       
        print json_encode($data);
       
    


 