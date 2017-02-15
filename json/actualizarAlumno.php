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
   
if($matricula){

$sql = "UPDATE `laboratorio`.`identificacionAlumno` ".
" set ".
" nombre =  '$obj_d->nombre', ".
"        apellidoPaterno = '$obj_d->apellidoPaterno', ".
"        apellidoMaterno = '$obj_d->apellidoMaterno', ".
"        edad = '$obj_d->edad', ".
"        sexo =  '$obj_d->sexo', ".
"        id_escuela = '$obj_d->escuela',".
"        grado =  '$obj_d->grado' ".
"        ".
"       where matricula = '$matricula' "; 
if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $conn->error;
}
  
   
    

   
        //print json_encode($data);
       
     }




 