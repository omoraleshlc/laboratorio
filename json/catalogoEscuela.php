<?php require_once '../config.inc.php';

$json_d = array();
$json_d = file_get_contents('php://input');
$obj_d = json_decode($json_d);
$usuario = mysql_real_escape_string($obj_d->usuario);
$q = mysql_real_escape_string($obj_d->q);
$result_codigos = array();
$entidad  = mysql_real_escape_string($obj_d->entidad);
$data = mysql_real_escape_string($data['matricula']);



// Debug

#Conecta
if($obj_d->nombreEscuela!=''){
$sql = "INSERT INTO  `laboratorio`.`listaEscuelas` (

`descripcion` ,
`referencia`
)
VALUES (
  '$obj_d->nombreEscuela',  ''
);";


//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Agregado!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

/*
#variables
$detectar= substr($q,0,1);
$detectarN= substr($q,1,2);

$string = array();




if(is_string($q) or is_numeric($q)){ 

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
    
    $sql_pacientes  = " select *
                        from pacientes 
                        where entidad = '$entidad'
                        and (
                            $sql_like
                        ) or (
                            numCliente like '%$q%'
                        ) limit 100 ";
    $rs_pacientes   = mysql_db_query($basedatos, $sql_pacientes);
    while($rPx  = mysql_fetch_array($rs_pacientes)){
        
        $nombreCompleto   = $rPx['nombre1']." ".$rPx['nombre2']." ".$rPx['apellido1']." ".$rPx['apellido2'];
        $nombreCompleto   = utf8_encode(str_replace("  ", " ", $nombreCompleto));

        $string[] = array(
            'numCliente'            => $rPx['numCliente'],
            'nombreCompleto'        => $nombreCompleto,
            'fechaNacimiento'       => cambia_a_normal($rPx['fechaNacimiento']),
            'tipoBusqueda'          => 'folioVenta',
            'tipoPaciente'          => substr($rPx['folioVenta'],0,1),
            'tipoBoton'             => 'btn btn-xs btn-primary',
            'keyPacientes'          => $rPx['keyPacientes'],
            'fechaCreacion'         => cambia_a_normal($rPx['fechaCreacion']),
            'fechaModificacion'     => cambia_a_normal($rPx['fechaModificacion']),
            'usuario'               => $rPx['usuario']
        );
        
    }

    
    
    if(count($string)>0){
        print json_encode($string);
    }else{
       $string[] = array(
              'numCliente' => null
            );
        print json_encode($string);       
    }
}*/


 