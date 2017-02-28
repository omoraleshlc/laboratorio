<?php require_once('menuPrincipal.php'); ?>

<script>
var inicia = angular.module('inicia', []);

</script>
<style type="text/css">
table {
   font-size: 12px;
}
</style>

<div  class="container" ng-app ="inicia" ng-cloak=""
ng-controller="ctrlLab" 
ng-init="listaEscuelaFunction();">
<h1 class="h1 text-center" >
Lista de Alumnos 
</h1>




<!-- Button trigger modal -->
<div class="row">
<div class="col-xs-12">
<div class="text-right">
<a style="cursor:pointer;"

data-toggle="modal"    data-target="#agregarAlumno">
<span class="glyphicon glyphicon-plus-sign " aria-hidden="true"></span>
Nuevo
</a> <br>
</div>

</div>
</div>


<div class="panel panel-default">
































<div class="panel panel-body">


<div class="row">
<div class="col-xs-6">
<input type="text" class="form-control input-md" 
ng-model="q"
ng-change="buscarAlumnoxNombre();"
placeholder="Buscar Alumno" />
</div>




</div><br>
<div class="label label-danger" ng-hide="listaAlumnos">
    No hay registros!
</div>

<table class="table table-striped table-hover" ng-show="listaAlumnos">

<th>#</th>
<th class="text-left" data-toggle="tooltip" data-placement="top" title="Matricula">Matrícula</th>
<th class="text-left" data-toggle="tooltip" data-placement="top" title="Nombre">Nombre</th>
<th class="text-left" data-toggle="tooltip" data-placement="top" title="Escuela">Escuela</th>
<th></th>


<tr ng-repeat="arrayAlumnos in listaAlumnos">
<td>{{$index+1}}</td>
<td data-toggle="tooltip" data-placement="top" title="Matrícula">
    <label data-toggle="tooltip" data-placement="top" title="Editar alumno">
<!-- Button trigger modal -->
<a ng-click="buscarAlumno(arrayAlumnos.matricula);"
style="cursor:pointer;"

data-toggle="modal" data-target="#editarAlumnoM">
{{arrayAlumnos.matricula}}
</a>

</label>
    </td>
<td data-toggle="tooltip" data-placement="top" title="Nombre del alumno">{{arrayAlumnos.nombreCompleto}}</td>
<td data-toggle="tooltip" data-placement="top" title="Escuela">{{arrayAlumnos.escuela}}</td>
<td >









<label data-toggle="tooltip"
data-placement="top" title="Agregar ficha antropométrica">
<!-- Button trigger modal -->
<a ng-click="mostrarFichaAntro(arrayAlumnos.matricula,arrayAlumnos.id_escuela);"
style="cursor:pointer;"

data-toggle="modal" data-target="#fichaAntroModal">
<span class="glyphicon glyphicon-briefcase " aria-hidden="true"></span>
</a>

</label>


&nbsp;&nbsp;

<label data-toggle="tooltip"   data-placement="top" title="Agregar Ficha Clínica">
<!-- Button trigger modal -->
<a ng-click="cargarFichaClinica(arrayAlumnos.matricula,arrayAlumnos.id_escuela);"
style="cursor:pointer;"

data-toggle="modal" data-target="#fichaClinica">
<span class="glyphicon glyphicon-list-alt " aria-hidden="true"></span>
</a>

</label>



&nbsp;&nbsp;


<label data-toggle="tooltip"   data-placement="top" title="Agregar Ficha Bioquímica">
<!-- Button trigger modal -->
<a ng-click="cargarFichaBio(arrayAlumnos.matricula,arrayAlumnos.id_escuela);"
style="cursor:pointer;"

data-toggle="modal" data-target="#fichaBioModal">
<span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>
</a>

</label>



&nbsp;&nbsp;



<label data-toggle="tooltip"   data-placement="top" title="Historial">
<!-- Button trigger modal -->
<a ng-click="mostrarHistorial(arrayAlumnos.nombreCompleto,arrayAlumnos.matricula,arrayAlumnos.id_escuela);"
style="cursor:pointer;"

data-toggle="modal" data-target="#historialAlumnoModal">
<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
</a>

</label>



&nbsp;&nbsp;



<label data-toggle="tooltip" data-placement="top" title="Eliminar Alumno">
<a ng-click="eliminarAlumno(arrayAlumnos.matricula);"
onclick="if(confirm('Esta seguro que deseas quitar este alumno?') == false){return false;}" 
style="cursor:pointer;color:red" 
>
<span class="glyphicon glyphicon-trash  " aria-hidden="true"></span>
</a>                        

</label>




</td>
</tr>



</table>


</div>
</div>

































<!--MODALS -->

<div class="modal fade " id="historialAlumnoModal" tabindex="-1" 
role="dialog" aria-labelledby="historialAlumnoModal">
<div class="modal-dialog" role="document">





<div class="modal-content">



<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Historial del Alumno <strong>{{nombreCompleto}}</strong></h4>

<div class="alert alert-success" ng-show="mensajeAgregar">
{{mensajeAgregar}}
</div>
</div>










<div class="modal-body">




    <section ng-repeat="arrH in listaHistorial">
    <div class="panel panel-info">
        <div class="panel panel-heading text-left">
            {{arrH.fecha}}
            <a style="cursor:pointer"
               class="pull-right"
               onClick="javascript:nueva('exportaWordAlumno.php?entidad=01&status=Revision&almacenDestino=*&excel=si', 'resumenClinico', '800', '800', 'yes')"
               >
               <span class="glyphicon glyphicon-export " aria-hidden="true"></span>

        </a>
        </div>
       
        
        <div class="panel panel-body">
            
            <label>Datos Antropométricos</label>
            <table class="table table-striped table-hover ">
                
                <tr>
                <th>
                    Peso 
                </th>
                <th>
                    Talla
                </th>
                <th>
                    IMC
                </th>
                </tr>
                
                
                <tr>
                    <td>{{arrH.peso}}</td>
                    <td>{{arrH.talla}}</td>
                    <td>{{arrH.cCadera}}</td>
                </tr>
            </table> 
            
            <hr>
            
            
<label>Datos Bioquimicos</label>
            <table class="table table-striped table-hover">
                
                <tr>
                <th>
                    Descripción 
                </th>
                <th>
                    Resultados
                </th>
                <th>
                    Rangos Normales
                </th>
                </tr>
                
                
                <tr>
                    <td>Colesterol</td>
                    <td>{{arrH.colesterol}}mg/dl</td>
                    <td><200mg/dl</td>
                </tr>
    <tr>
                    <td>Trigliceridos</td>
                    <td>{{arrH.trigliceridos}}mg/dl</td>
                    <td><=130mg/dl</td>
                </tr>   
                
                <tr>
                    <td>Colesterol HDL</td>
                    <td>{{arrH.hdl}}mg/dl</td>
                    <td>>35mg/dl</td>
                </tr>  
                
                <tr>
                    <td>Colesterol LDL</td>
                    <td>{{arrH.ldl}}mg/dl</td>
                    <td><=130mg/dl</td>
                </tr> 
                
                <tr>
                    <td>Insulina Basal</td>
                    <td>{{arrH.insulinaBasal}}mg/dl</td>
                    <td>2 6 24 9  uUI/ml</td>
                </tr> 
                
                <tr>
                    <td>Glucosa Basal</td>
                    <td>{{arrH.glucosaBasal }}mg/dl</td>
                    <td><100mg/dl</td>
                </tr> 
                
                <tr>
                    <td>Presion Arterial</td>
                    <td>{{arrH.presionArterial }}mg/dl</td>
                    <td>---</td>
                </tr>
            </table>   







<hr>


<label>Datos Clinicos</label>
            <table class="table table-striped table-hover">
                
                <tr>
                <th>
                    Presión Arterial 
                </th>
                <th>
                    108/57
                </th>
                <th>
                   NORMAL
                </th>
                </tr>
                
                
                <tr>
                    <td></td>
                </tr>
            </table>    



        </div>
    </div>
    </section>







</div>        











<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">






<button type="submit" class="btn btn-default" 
ng-click="listaEscuelaFunction();buscarAlumnoxNombre();"
data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>





</div>
</div>
</div><!--cierra modal agregar dpo -->

















<div class="modal fade " id="editarAlumnoM" tabindex="-1" 
role="dialog" aria-labelledby="editALumno">
<div class="modal-dialog" role="document">





<div class="modal-content">



<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Editar Alumno</h4>

<div class="alert alert-success" ng-show="mensajeAgregar">
{{mensajeAgregar}}
</div>
</div>











<div class="modal-body">









<!-- Form Name -->


<!-- Text input-->




<!-- Text input-->
<div class="form-group" 
ng-class="!editarAlumno.matricula ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label " for="cod">Matricula: </label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="editarAlumno.matricula"
class="form-control input-md" type="text" required=""
readonly=""
>

</div>
</div>

<br><br>       



<div   ng-class="!editarAlumno.nombre?'form-group input-md has-error' :  'form-group  ';" >
<label class="col-md-4 control-label" for="nome">Nombre(s):</label>  
<div class="col-md-4">
<input id="nome" name="nome" placeholder=""
ng-model="editarAlumno.nombre"
class="form-control"  required="" type="text">

</div>

</div>      


<br><br>





<!-- Text input-->
<div class="form-group" ng-class="!editarAlumno.apellidoPaterno?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="nome">Apellido Paterno:</label>  
<div class="col-md-4">
<input id="nome" name="nome" placeholder=""
ng-model="editarAlumno.apellidoPaterno"
class="form-control input-md" required="" type="text">

</div>
</div>

<br><br>

<!-- Text input-->
<div ng-class="!editarAlumno.apellidoMaterno?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="nome">Apellido Materno:</label>  
<div class="col-md-4">
<input id="nome" name="nome"
ng-model="editarAlumno.apellidoMaterno"
placeholder="" class="form-control input-md" required="" type="text">

</div>
</div>

<br><br>
<!-- Text input-->
<div ng-class="!editarAlumno.edad ?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="idade">Edad: </label>  
<div class="col-md-4">
<input id="idade" name="idade"
ng-model="editarAlumno.edad"
placeholder=""
class="form-control input-md" 
maxlength="2"

required="" type="text"
onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>

</div>
</div>
<br><br>
<!-- Select Basic -->
<div ng-class="!editarAlumno.escuela?'form-group  has-error' :  'form-group';">
<label class="col-md-4 control-label" for="escuela">Escuela: </label>
<div class="col-md-4">
<select required=""
ng-model="editarAlumno.escuela"
class="form-control" >
<option 
ng-repeat="arrEscuelaFI in listaEscuelas"
value="{{arrEscuelaFI.id_escuela}}">{{arrEscuelaFI.descripcion}}</option>

</select>
</div>
</div>
<br><br>
<!-- Select Basic -->
<div ng-class="!editarAlumno.grado?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="academia_descr">Grado: </label>
<div class="col-md-4">
<select id="academia_descr"  required=""
ng-model="editarAlumno.grado"
name="academia_descr" class="form-control">
<option value="1">2 Secundaria</option>
<option value="2">3 Secundaria</option>
</select>
</div>
</div>
<br><br>
<!-- Multiple Radios -->
<!-- Select Basic -->
<div ng-class="!editarAlumno.sexo?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="sexo">Sexo: {{sexo}}</label>
<div class="col-md-4">
<select id="sexo"  required=""
ng-model="editarAlumno.sexo"
name="sexo" class="form-control">
<option value="M">M</option>
<option value="F">F</option>
</select>
</div>
</div>

</div>


<br><br>




<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">


<button id="button1id" 

ng-if="
editarAlumno.matricula && 
editarAlumno.nombre && 
editarAlumno.apellidoPaterno && 
editarAlumno.apellidoMaterno && 
editarAlumno.edad > 0 &&
editarAlumno.escuela && 
editarAlumno.grado && 
editarAlumno.sexo  
"
name="button1id" 
ng-click="actualizarDatosAlumno();listaEscuelaFunction();buscarAlumnoxNombre();"
class="btn btn-success"
data-dismiss="modal"
>
Guardar
</button>



<button type="submit" class="btn btn-default" 
ng-click="listaEscuelaFunction();buscarAlumnoxNombre();"
data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>





</div>
</div>
</div><!--cierra modal agregar dpo -->






















<div class="modal fade " id="fichaBioModal" tabindex="-1" 
role="dialog" aria-labelledby="fichaBioModal">
<div class="modal-dialog" role="document">
<div class="modal-content">


<form name="formafichaBio" method="post" class="form-horizontal">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Ficha Bioquímica </h4>

<div class="alert alert-success" ng-show="mensajeFichaBio">
{{mensajeFichaBio}}
</div>
</div>




<div class="modal-body" ng-show="fichaBio.matricula">









<div class="form-group" 
ng-class="!fichaBio.matricula ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Matricula:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaBio.matricula"
class="form-control input-md" type="text" required=""
readonly=""
>

</div>
</div>





<div class="form-group" 
ng-class="!fichaBio.colesterol ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Colesterol:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.colesterol"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>          







<div class="form-group" 
ng-class="!fichaBio.trigliceridos ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Triglicéridos:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.trigliceridos"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div> 




<div class="form-group" 
ng-class="!fichaBio.hdl ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">HDL:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.hdl"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>           




<div class="form-group" 
ng-class="!fichaBio.ldl ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">LDL:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.ldl"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>    





<div class="form-group" 
ng-class="!fichaBio.vdl ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">VDL:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.vdl"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>






<div class="form-group" 
ng-class="!fichaBio.ldlvdl ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">LDLVDL:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.ldlvdl"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>     




<div class="form-group" 
ng-class="!fichaBio.insulinaBasal ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Insulina Basal:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.insulinaBasal"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>            





<div class="form-group" 
ng-class="!fichaBio.glucosaBasal ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Glucosa Basal:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
autocomplete="off"
ng-model="fichaBio.glucosaBasal"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>          


<input type="text" class="hidden" ng-model="fichaBio.keyFB">
<input type="text" class="hidden" ng-model="fichaBio.id_escuela">

</fieldset>
</form>          


</div>











<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">


<button 

ng-show="
fichaBio.matricula && 
fichaBio.colesterol>0 && 
fichaBio.trigliceridos>0 && 
fichaBio.hdl>0 && 
fichaBio.ldl > 0 &&
fichaBio.vdl > 0 &&
fichaBio.ldlvdl > 0 &&
fichaBio.insulinaBasal > 0 &&
fichaBio.glucosaBasal > 0 &&
fichaBio.id_escuela 

"

ng-click="guardarFichaBio();listaEscuelaFunction();"
class="btn btn-success"
data-dismiss="modal"
>
Guardar
</button>

<button type="button" class="btn btn-primary" 
        ng-show="fichaBio.keyFB"
ng-click="nuevaFichaBio(fichaBio.matricula);"
>Nuevo</button>  

<button type="submit" class="btn btn-default" 
ng-click="listaEscuelaFunction();"
data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>



</form>
</div>
</div>
</div><!--cierra ficha antropometrica -->

























<div class="modal fade " id="fichaAntroModal" tabindex="-1" 
role="dialog" aria-labelledby="fichaAntroModal">
<div class="modal-dialog" role="document">
<div class="modal-content">


<form name="formafichaAntro" method="post" class="form-horizontal">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Ficha Antroprométrica </h4>

<div class="alert alert-success" ng-show="mensajeFichaAntro">
{{mensajeFichaAntro}}
</div>
</div>




<div class="modal-body">









<div class="form-group" 
ng-class="!fichaAntro.matricula?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Matricula:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaAntro.matricula"
class="form-control input-md" type="text" 
readonly=""
>


<input id="keyFA" name="keyFA" placeholder="KEY" 
ng-model="fichaAntro.keyFA"
class="form-control input-md hidden" type="text" required=""
readonly=""
>
</div>
</div>



<script>
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode == 46){
var inputValue = $(".numericos").val();
var count = (inputValue.match(/'.'/g) || []).length;
if(count<1){
if (inputValue.indexOf('.') < 1){
return true;
}
return false;
}else{
return false;
}
}
if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
return false;
}
return true;
}          
</script>

<div class="form-group" 
ng-class="!fichaAntro.talla ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Talla:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="000" 
ng-model="fichaAntro.talla"
class="form-control input-md numericos" type="text" required=""

maxlength="3"
onkeyup="this.value=this.value.replace(/[^\d]/,'')"
>

</div>
</div>          





<div class="form-group" 
ng-class="!fichaAntro.peso ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Peso:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="000.00" 
ng-model="fichaAntro.peso"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
maxlength="6"
>

</div>
</div>              





<div class="form-group" 
ng-class="!fichaAntro.cMuneca ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Cintura:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaAntro.cMuneca"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div>             






<div class="form-group" 
ng-class="!fichaAntro.cCadera ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Cadera:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaAntro.cCadera"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>

</div>
</div> 



<div class="form-group">
<label class="col-md-4 control-label" for="cod">IMC:</label>  
<div class="col-md-4" ng-if="fichaAntro.peso>0 && fichaAntro.talla>0">
    <div class="form-control">    
{{fichaAntro.peso/(fichaAntro.talla*2) | number: 2}}
    </div>
</div>
</div>






<div class="form-group" 
ng-class="!fichaAntro.cGC ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Grasa Corporal:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaAntro.cGC"
class="form-control input-md numericos" type="text" required=""
onkeypress="return isNumberKey(event)" 
>
</div>
</div>



<div class="form-group" 
ng-class="!fichaAntro.presionArterial ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Presión Arterial:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaAntro.presionArterial"
class="form-control input-md numericos" type="text" required=""

>
</div>
</div>


<input type="text" class="hidden" ng-model="fichaAntro.id_escuela">
</fieldset>
</form>          


</div>











<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">


<button id="button1id" 

ng-if="
fichaAntro.matricula && 
fichaAntro.peso && 
fichaAntro.cMuneca && 
fichaAntro.cCadera && 
fichaAntro.talla > 0 
"
name="button1id" 
ng-click="guardarFichaAntro();listaEscuelaFunction();"
class="btn btn-success"
data-dismiss="modal"
>
Guardar
</button>

   
<button type="button" class="btn btn-primary" 
        ng-show="fichaAntro.keyFA"
ng-click="nuevaFichaAntro(fichaAntro.matricula);"
>Nuevo</button>    
    


<button type="submit" class="btn btn-default" 
ng-click="listaEscuelaFunction();"
data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>



</form>
</div>
</div>
</div><!--cierra ficha antropometrica -->













<!--FICHA CLINICA-->
<div class="modal fade " id="fichaClinica" tabindex="-1" 
role="dialog" aria-labelledby="fichaClinica">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Ficha Clínica </h4>

<div class="alert alert-success" ng-show="mensajeFichaClinica">
{{mensajeFichaClinica}}
</div>
</div>


<form class="form-horizontal ">




<!-- Text input-->



<div class="modal-body">

<div class="form-group" 
ng-class="!fichaClinica.matricula ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Matrícula:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.matricula"
class="form-control input-md numericos" type="text" required=""
readonly=""
>

<input id="keyFC" name="keyFC" placeholder="" 
ng-model="fichaClinica.keyFC"
class="form-control input-md numericos hidden" type="text" required=""
readonly=""
>

</div>
</div> 


<div class="form-group">
<label class="col-md-4 control-label" for="nome">TOMA 1</label> 
</div>





<div class="form-group" 
ng-class="!fichaClinica.toma1BrazoDerecho ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Brazo Derecho:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.toma1BrazoDerecho"
class="form-control input-md numericos" type="text" required=""

>

</div>
</div>





<div class="form-group" 
ng-class="!fichaClinica.toma1BrazoIzquierdo ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Brazo Izquierdo:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.toma1BrazoIzquierdo"
class="form-control input-md numericos" type="text" required=""

>

</div>
</div>










<div class="form-group">
<label class="col-md-4 control-label" for="nome">TOMA 2</label> 
</div>




<div class="form-group" 
ng-class="!fichaClinica.toma2BrazoDerecho ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Brazo Derecho:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.toma2BrazoDerecho"
class="form-control input-md numericos" type="text" required=""

>

</div>
</div>


<div class="form-group" 
ng-class="!fichaClinica.toma2BrazoIzquierdo ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Brazo Izquierdo:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.toma2BrazoIzquierdo"
class="form-control input-md numericos" type="text" required=""

>
<input id="cod" name="cod" placeholder="" 
ng-model="fichaClinica.id_escuela"
class="form-control input-md numericos hidden" type="text" required=""

>
</div>
</div>

</div>








<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">


<button id="button1id" 

ng-if="
fichaClinica.matricula && 
fichaClinica.toma2BrazoDerecho && 
fichaClinica.toma2BrazoIzquierdo && 
fichaClinica.toma1BrazoIzquierdo && 
fichaClinica.toma1BrazoDerecho &&
fichaClinica.id_escuela  

"
name="button1id" 
ng-click="guardarFichaClinica();"
class="btn btn-success"
data-dismiss="modal"
>
Guardar
</button>

<button type="button" class="btn btn-primary" 
        ng-show="fichaClinica.keyFC"
ng-click="nuevaFichaClinica(fichaClinica.matricula);"
>Nuevo</button> 

<button type="submit" class="btn btn-default" 

data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>           

</form>








</div>
</div><!--cierra ficha clinica -->
</div>

































<!-- Modal AGREGAR DP-->
<div class="modal fade " id="agregarAlumno" tabindex="-1" 
role="dialog" aria-labelledby="agregarAlumno">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Ficha de Identificación</h4>

<div class="alert alert-success" ng-show="mensajeAgregar">
{{mensajeAgregar}}
</div>
</div>
<div class="modal-body">




<form name="forma"  class="form-horizontal">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<div class="form-group" 
ng-class="!agregarAlumno.matricula ?'form-group  has-error' :  'form-group ';">
<label class="col-md-4 control-label" for="cod">Matricula:</label>  
<div class="col-md-4">
<input id="cod" name="cod" placeholder="" 
ng-model="agregarAlumno.matricula"
class="form-control input-md" type="text" required=""

>

</div>
</div>



<!-- Text input-->
<div   ng-class="!agregarAlumno.nombre?'form-group input-md has-error' :  'form-group  ';" >
<label class="col-md-4 control-label" for="nome">Nombre(s):</label>  
<div class="col-md-4">
<input id="nome" name="nome" placeholder=""
ng-model="agregarAlumno.nombre"
class="form-control"  required="" type="text">

</div>

</div>








<!-- Text input-->
<div class="form-group" ng-class="!agregarAlumno.apellidoPaterno?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="nome">Apellido Paterno:</label>  
<div class="col-md-4">
<input id="nome" name="nome" placeholder=""
ng-model="agregarAlumno.apellidoPaterno"
class="form-control input-md" required="" type="text">

</div>
</div>



<!-- Text input-->
<div ng-class="!agregarAlumno.apellidoMaterno?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="nome">Apellido Materno:</label>  
<div class="col-md-4">
<input id="nome" name="nome"
ng-model="agregarAlumno.apellidoMaterno"
placeholder="" class="form-control input-md" required="" type="text">

</div>
</div>


<!-- Text input-->
<div ng-class="!agregarAlumno.edad ?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="idade">Edad: </label>  
<div class="col-md-4">
<input id="idade" name="idade"
ng-model="agregarAlumno.edad"
placeholder=""
class="form-control input-md" 
maxlength="2"

required="" type="text"
onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>

</div>
</div>

<!-- Select Basic -->
<div ng-class="!agregarAlumno.escuela?'form-group  has-error' :  'form-group';">
<label class="col-md-4 control-label" for="escuela">Escuela: </label>
<div class="col-md-4">
<select required=""
ng-model="agregarAlumno.escuela"
class="form-control" >
<option 
ng-repeat="arrEscuelaFI in listaEscuelas"
value="{{arrEscuelaFI.id_escuela}}">{{arrEscuelaFI.descripcion}}</option>

</select>
</div>
</div>

<!-- Select Basic -->
<div ng-class="!agregarAlumno.grado?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="academia_descr">Grado: </label>
<div class="col-md-4">
<select id="academia_descr"  required=""
ng-model="agregarAlumno.grado"
name="academia_descr" class="form-control">
<option value="1">2 Secundaria</option>
<option value="2">3 Secundaria</option>
</select>
</div>
</div>

<!-- Multiple Radios -->
<!-- Select Basic -->
<div ng-class="!agregarAlumno.sexo?'form-group  has-error' :  'form-group  ';">
<label class="col-md-4 control-label" for="sexo">Sexo: {{sexo}}</label>
<div class="col-md-4">
<select id="sexo"  required=""
ng-model="agregarAlumno.sexo"
name="sexo" class="form-control">
<option value="M">M</option>
<option value="F">F</option>
</select>
</div>
</div>

<!-- Multiple Checkboxes -->




</fieldset>
</form>
</div>
<div class="modal-footer">


<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">


<button id="button1id" 

ng-if="
agregarAlumno.matricula && 
agregarAlumno.nombre && 
agregarAlumno.apellidoPaterno && 
agregarAlumno.apellidoMaterno && 
agregarAlumno.edad > 0 &&
agregarAlumno.escuela && 
agregarAlumno.grado && 
agregarAlumno.sexo  
"
name="button1id" 
ng-click="guardarDatos();mensajeAgregar='ALUMNO AGREGADO';"
class="btn btn-success"
data-dismiss="modal"

>
Guardar
</button>



<button type="Submit" class="btn btn-default" 

data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
</div>
</div><!--cierra modal agregar dpo -->

























</div>




<script>



inicia.factory('$exceptionHandler', function($log) {
return function(exception, cause) {
$log.warn(exception, cause);
};
});






inicia.controller('ctrlLab', function ctrlLab($scope, $http){

//Definir objetos
$scope.fichaAntro = {};
$scope.fichaClinica = {};
$scope.fichaAntroReadonly = true;
$scope.fichaBio = {};



$scope.nuevaFichaBio = function(matricula){
  
  $scope.fichaBio = {};
  $scope.fichaBio.matricula = matricula;

};



$scope.nuevaFichaClinica = function(matricula){
  
  $scope.fichaClinica = {};
  $scope.fichaClinica.matricula = matricula;

};


$scope.nuevaFichaAntro = function(matricula){
  
  $scope.fichaAntro = {};
  $scope.fichaAntro.matricula = matricula;

};





/* Mostrar y actualizar la ultima ficha clinica*/
$scope.cargarFichaClinica = function(matricula,id_escuela){ 

var params = {matricula:matricula};

$http({
url: 'json/mostrarFichaClinica.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  

if(res.data.length>0){
   
$scope.fichaClinica = res.data[0];   


}else{
    $scope.fichaClinica.matricula = matricula;   
$scope.fichaClinica.id_escuela = id_escuela; 
}




$scope.mensaje = "Actualizado";
});
};






/* mostrar la ultima ficha antro */
$scope.mostrarFichaAntro = function(matricula) {

var params = {matricula:matricula};

$http({
url: 'json/mostrarFichaAntro.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  

if(res.data.length>0){
$scope.fichaAntro = res.data[0]; 
}else{
    $scope.fichaAntro.matricula = matricula;   
$scope.fichaAntro.id_escuela = id_escuela; 
}




$scope.mensaje = "Actualizado";
});
};







/* guardar ficha de identificacion */
$scope.guardarFichaBio = function() {

var params = {fichaAntro:$scope.fichaBio};
$http({
url: 'json/guardarFichaBio.php',
method: 'POST',
data: angular.toJson( $scope.fichaBio),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function(response) {


//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
$scope.fichaBio = {};
};




/* guardar ficha o actualiza de identificacion */
$scope.guardarFichaClinica = function() {

var params = {fichaAntro:$scope.fichaAntro};
$http({
url: 'json/guardarFichaClinica.php',
method: 'POST',
data: angular.toJson( $scope.fichaClinica),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function(response) {
$scope.guardarFichaClinica = {};

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
};





/* guardar ficha de identificacion */
$scope.guardarFichaAntro = function() {
var params = {fichaAntro:$scope.fichaAntro};
$http({
url: 'json/guardarFichaAntro.php',
method: 'POST',
data: angular.toJson( $scope.fichaAntro ),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function(response) {
$scope.fichaAntro = {};
});

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 

};





$scope.cargarFichaBio = function(matricula,id_escuela){ 

var params = {matricula:matricula};

$http({
url: 'json/mostrarFichaBio.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  

if(res.data.length>0){
   
$scope.fichaBio = res.data[0];   


}else{
    $scope.fichaBio.matricula = matricula;   
$scope.fichaBio.id_escuela = id_escuela; 
}




$scope.mensaje = "Actualizado";
});
};










$scope.mostrarHistorial = function(nombreCompleto,matricula,id_escuela){ 
$scope.fichaAntro.matricula = matricula;   
$scope.fichaAntro.id_escuela = id_escuela; 
$scope.nombreCompleto = nombreCompleto; 


var params = {matricula:matricula};

$http({
url: 'json/historialxAlumno.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  
$scope.listaHistorial = res.data; 

$scope.mensaje = "";
});

}; 











$scope.vaciarAlumnos = function (){
$scope.agregarAlumno = "";
};





/* mostrar lista de escuelas */
$scope.buscarAlumnoxNombre = function() {

var params = {q:$scope.q};

$http({
url: 'json/buscarAlumnoxNombre.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  
$scope.listaAlumnos = res.data; 

$scope.mensaje = "";
});
};







/* mostrar lista de escuelas */
$scope.eliminarAlumno = function(matricula) {

var params = {matricula:matricula};

$http({
url: 'json/eliminarAlumno.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  
$scope.listaAlumnosFunction();
$scope.listaEscuelaFunction();
$scope.agregarAlumno = "";
$scope.mensaje = "";
});
};







/* mostrar lista de escuelas */
$scope.listaEscuelaFunction = function() {

$http({
url: 'json/listaEscuelas.php',
method: 'POST'
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function( res,data) {   

$scope.listaEscuelas = res.data;
});
};






/* mostrar lista de escuelas */
$scope.buscarAlumno = function(matricula) {

var params = {matricula:matricula};

$http({
url: 'json/buscarAlumno.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  

$scope.editarAlumno = res.data[0];
$scope.mensaje = "ACTUALIZAR ALUMNO";
});
};









/*  guardar escuela */
$scope.guardarEscuela = function() {

//console.log($scope.url);
$http({
url: 'json/catalogoEscuela.php',
method: 'POST',
data: angular.toJson( $scope.escuelas ),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function( response) {
$scope.listaEscuelaFunction();


});
//ABRE MOSTRAR TRANSACCIONES    
};




/* guardar ficha de identificacion */
$scope.guardarDatos = function() {


$http({
url: 'json/fichaIdentificacion.php',
method: 'POST',
data: angular.toJson( $scope.agregarAlumno ),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function(data,res) {

$scope.mensajeAgregar = 'ALUMNO AGREGADO!'; // 



});
};
//ABRE MOSTRAR TRANSACCIONES 


$scope.actualizarDatosAlumno = function() {
var params = {matricula:$scope.editarAlumno.matricula};
$http({
url: 'json/actualizarAlumno.php',
method: 'POST',
data: angular.toJson( $scope.editarAlumno ),
transformRequest: false,
headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  

$scope.mensaje = 'ALUMNO ACTUALIZADO!'; // 
$scope.editarAlumno = "";
$scope.editarAlumno = res.data[0];
});
//ABRE MOSTRAR TRANSACCIONES 

};











/* mostrar lista de alumnos */
$scope.listaAlumnosFunction = function() {


$http({
url: 'json/listaAlumnos.php',
//method: 'POST'
//data: angular.toJson( $scope.agregarAlumno ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function( res,data) {

$scope.listaAlumnos = res.data; 

});
};






});  

</script>




<?php require_once('footer.php'); ?> 