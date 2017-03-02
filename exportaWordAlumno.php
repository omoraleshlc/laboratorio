<?PHP require('/Constantes.php');
//*****************CONEXION  A SIMA***************
require(CONSTANT_PATH_CONFIGURACION.'/baseDatos.php');
$base=new MYSQL();
$basedatos=$base->basedatos();
$conexionManual=new MYSQL();
$conexionManual->conecta();
//**************************************************

$entidad = $_GET['entidad'];
  // file name for download
  $filename = "Matricula-" .date("Y-m-d").".xls";

  //header("Content-Disposition: attachment; filename=\"$filename\"");
  //header("Content-Type: application/vnd.ms-excel");

  
  
  

    ?>

<table width="700" class="table table-bordered" >

      
      
   
<th>#</th>
    
     <th >Tipo</th>
      <th >Descripcion</th>

 <th ><div align="right">CostoxCaja</div></th>  
  <th ><div align="right">CostoxUnidad</div></th>
    <th >Cajacon</th>
    <th >ConfGranel</th>
 <th>Existencia</th>

 


 


 <th ><div align="right">TotalInversion</div></th>
 
<?php	

//filtrar por anaquel
if($myrow3['anaquel']=='*'){
    
    
    
$sSQL1= "SELECT 
*
FROM 

existencias
WHERE
entidad='".$entidad."' 
and
almacen='".$myrow3['almacen']."'

group by codigo
order by descripcion ASC
";

    
    
} else { 

$sSQL1= "SELECT 
*
FROM 

existencias
WHERE
entidad='".$entidad."' 
and
almacen='".$myrow3['almacen']."'
and
anaquel='".$myrow3['anaquel']."'
and
descripcion!=''
group by codigo
order by descripcion ASC
";

}










$result1=mysql_db_query($basedatos,$sSQL1);
while($myrow1 = mysql_fetch_array($result1)){

$a+=1;










    $sSQL8ac= "
SELECT * 
FROM
articulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow1['codigo']."'
";
$result8ac=mysql_db_query($basedatos,$sSQL8ac);
$myrow8ac = mysql_fetch_array($result8ac);

$sSQL8acb= "
SELECT * 
FROM
precioArticulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow1['codigo']."'
and
fecha<='".$_GET['fechaInicial']."'
    order by fecha DESC
";
$result8acb=mysql_db_query($basedatos,$sSQL8acb);
$myrow8acb = mysql_fetch_array($result8acb);


$sSQL2= "
SELECT * 
FROM
listasinventarios
WHERE
entidad='".$entidad."'
and
keylistas='".$_GET['keylistas']."'
and
codigo='".$myrow1['codigo']."'
    and
almacen='".$myrow3['almacen']."'
";
$result2=mysql_db_query($basedatos,$sSQL2);
$myrow2 = mysql_fetch_array($result2);


$tipoEntrada = "";
if($_POST['fechaInicial']!=''){
  $tipoEntrada   = " SELECT cantidad FROM ajustes_hist WHERE codigo='" . $myrow1['codigo'] . "' and 
  almacen='" . $myrow3['almacen'] . "' and fecha <='".$_POST['fechaInicial']."'
  order by fecha DESC, hora DESC";
}
  $resultCantidad=mysql_db_query($basedatos,$tipoEntrada);
  $cantidadRow = mysql_fetch_array($resultCantidad);

  $sumaExistencia = $cantidadRow['cantidad'];

//echo $myrow8ac1e['entrada'];
//echo '<br>';

//SOLO DEBE MOSTRAR LOS ARTICULOS ACTIVOS
if( $myrow8ac['activo']=='A'){
?>
 <input name="codigoAlfa[]" type="hidden"  value="<?php echo $codigo=$myrow1['codigo']; ?>" />      
      
      
      
<?php if($myrow['cbarra']){ echo ltrim($myrow['cbarra']);} ?>
    <tr >
      
        <td  ><?php echo $a;?></td>
        
        
       
<td ><?php if($myrow1['ventaGranel']){echo 'Granel';} ?></td>


      <td ><input name="keyPA[]" type="hidden"  value="<?php echo $myrow1['keyPA']; ?>" />



    <?php 
    /*
    if($myrow1['anaquel']!=NULL){
echo ucwords(strtolower(ltrim($myrow1['descripcion']))).'  '.ucwords(strtolower($myrow8ac['sustancia'])).'  '.ucwords(strtolower($myrow8ac['sustancia'])).' '.ucwords(strtolower($myrow8ac['gpoProducto'])).' '.'<span >Anaquel: '.$myrow1['anaquel'].'</span>';
    }else{
echo ucwords(strtolower(ltrim($myrow1['descripcion']))).'  '.ucwords(strtolower($myrow8ac['sustancia'])).'  '.ucwords(strtolower($myrow8ac['sustancia'])).' '.ucwords(strtolower($myrow8ac['gpoProducto']));        
    }
*/
  echo utf8_decode(ucwords(strtolower(ltrim($myrow8ac['descripcion']))));            
          
?>     


      </td>




<td >
<?php #COSTO BASE

	  echo '$'.number_format($myrow8acb['costo'],2);

		?>


</td>



    <td><div align="right">
<?php /* costo x unidad */


if($myrow29p['almacen']==$myrow3['almacen']){
if($myrow8ac['cajaCon']>0){
    
    $costoUnit = $myrow8acb['costo']/$myrow8ac['cajaCon'];
    
    echo '$'.number_format($myrow8acb['costo']/$myrow8ac['cajaCon'],2);
}else{
    echo '$'.number_format($myrow8acb['costo'],2); 
    $costoUnit = $myrow8acb['costo'];
}
}else{
    //echo '$'.number_format($myrow8acb['costo'],2); 
    if($myrow8ac['cajaCon']>0){
    $costoUnit = $myrow8acb['costo']/$myrow8ac['cajaCon'];
    }else{
    $costoUnit = $myrow8acb['costo'];
    }
    
    echo '$'.number_format($costoUnit,2); 
}

        ?>  </div>          
        </td>










        
  
      <td >
        
<?php 
	if($myrow8ac['cajaCon']>0){
	  echo $myrow8ac['cajaCon'];
        }else{
            echo 1;
        }
	 
		?>
 
</td>




<td>
    <?php if($myrow1['cantidadSurtir']>0){echo $myrow1['cantidadSurtir'];}?>
</td>
        
        
        
              <td >
<?php 
	 if($sumaExistencia>0){
      $totalExistencias[0]+=$sumaExistencia;
      echo number_format($sumaExistencia,2);
    } else {
      echo "0.0";
    }
		?>


</td>
        
        
        

         
     
        


        
        





        






      <td >
     
        <div align="right">
<?php #Total inversion

if($sumaExistencia>0){
                  if($myrow29p['almacen']==$myrow3['almacen'] && $myrow8ac['cajaCon']>0){
                    echo '$'.number_format(($myrow8acb['costo']/$myrow8ac['cajaCon'])*$sumaExistencia,2);
                  }else if($myrow29p['almacen']==$myrow3['almacen'] && $myrow8ac['cajaCon']<0){
                    echo '$'.number_format($myrow8acb['costo']*$sumaExistencia,2);
                  }else{
                      echo '$'.number_format($costoUnit*$sumaExistencia,2);
          //echo $costoUnit. '  ->  '.$myrow8ac1e['entrada'];
                  }
                }else{
                  echo '$0.0';
                }
		?>
        </div>
     </td>


        
        

        
        
    
        
        
        
        


     
    </tr>
<?php  }}?>
    <tr>
        <td></td>
        <td></td>
        <td><!--TOTAL--></td>
        <td></td>
        <td></td>
        <td><?php #echo (int) ($totalExistencias[0]);?></td>
        <td><div align="right"><?php #echo '$'.number_format($totalCosto[0],2);?></div></td>
        <td><div align="right"><?php #echo '$'.number_format( $total[0],2);?></div></td>        
    </tr>
  </table>