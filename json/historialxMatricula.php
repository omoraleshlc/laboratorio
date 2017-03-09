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
$id_escuela = $obj_d->id_escuela;

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


   
if($matricula and $id_escuela){
 $sql = "select 
DATE_FORMAT(fecha, '%d/%m/%Y') fecha,

/* FICHA ANTROPROMETRICA */
(select talla from fichaAntropometrica 
where
matricula = fa.matricula 

 order by keyFA DESC limit 1) 
talla,

(select peso from fichaAntropometrica 
where
matricula = fa.matricula 

 order by keyFA DESC limit 1) 
peso,

(select cMuneca from fichaAntropometrica 
where
matricula = fa.matricula 

 order by keyFA DESC limit 1) 
cMuneca,

(select cCadera from fichaAntropometrica 
where
matricula = fa.matricula 

 order by keyFA DESC limit 1) 
cCadera,

(select cGC from fichaAntropometrica 
where
matricula = fa.matricula 

 order by keyFA DESC limit 1) 
cGC,
/* TERMINA FICHA ANTROPROMETRICA */



/* FICHA CLINICA */
(select toma1BrazoDerecho from fichaClinica 
where
matricula = fa.matricula 

 order by keyFC DESC limit 1) 
toma1BrazoDerecho,

(select toma1BrazoIzquierdo from fichaClinica 
where
matricula = fa.matricula 

 order by keyFC DESC limit 1) 
toma1BrazoIzquierdo,

(select toma2BrazoDerecho from fichaClinica 
where
matricula = fa.matricula 

 order by keyFC DESC limit 1) 
toma2BrazoDerecho,

(select toma2BrazoIzquierdo from fichaClinica 
where
matricula = fa.matricula 

 order by keyFC DESC limit 1) 
toma2BrazoIzquierdo,
/* TERMINA FICHA ANTROPROMETRICA */


/* FICHA BIOQUIMICA */
(select colesterol from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
colesterol,

(select trigliceridos from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
trigliceridos,

(select hdl from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
hdl,

(select ldl from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
ldl,

(select vdl from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
vdl,

(select ldlvdl  from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
ldlvdl ,



(select glucosaBasal  from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
glucosaBasal ,

(select insulinaBasal  from fichaBioquimica 
where
matricula = fa.matricula 

 order by keyFB DESC limit 1) 
insulinaBasal 
/* TERMINA FICHA BIOQUIMICA */


from fichaBioquimica fa where 
matricula ='$matricula' and id_escuela='$id_escuela'
group by fecha
order by keyFB DESC";



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
            'cMuneca'               => $rPx['cMuneca'],
            'cCadera'                 => $rPx['cCadera'],
            'cGC'                 => $rPx['cGC'],
            
            'toma1BrazoDerecho'                => $rPx['toma1BrazoDerecho'],
            'toma1BrazoIzquierdo'                => $rPx['toma1BrazoIzquierdo'],
            'toma2BrazoIzquierdo'                => $rPx['toma2BrazoIzquierdo'],
            'toma2BrazoDerecho'                => $rPx['toma2BrazoDerecho'],
            
            'colesterol'                => $rPx['colesterol'],
            'trigliceridos'                => $rPx['trigliceridos'],
            'hdl'                => $rPx['hdl'],
            'ldl'                    => $rPx['ldl'],
            'ldlvdl'                => $rPx['ldlvdl'],
            'vdl'                => $rPx['vdl'],
            'insulinaBasal'                => $rPx['insulinaBasal'],
            'glucosaBasal'                    => $rPx['glucosaBasal']
        );
        
    }
   
    

   
        print json_encode($data);
       
   
}
}


 