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
   
 $sql = "select 
fecha,
talla,peso,
(select sexo from identificacionAlumno
 where matricula=fa.matricula) sexo


from fichaAntropometrica fa
";



$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($rPx = $result->fetch_assoc()) {
      
        $nombreCompleto   = $rPx['nombre']." ".$rPx['nombre2']
                ." ".$rPx['apellidoPaterno']." ".$rPx['apellidoMaterno'];
        $nombreCompleto   = utf8_encode(str_replace("  ", " ", $nombreCompleto));
        
        
        
        
        
        
        

        $data[] = array(
            'fecha'             => $rPx['fecha'],
            'talla'                 => $rPx['talla'],
            'peso'                => $rPx['peso'],
            'sexo'                => $rPx['sexo'],
        );
        
    }
   
    

   
        print json_encode($data);
       
   
}



 