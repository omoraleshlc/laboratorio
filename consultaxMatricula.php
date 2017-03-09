<!-- Latest compiled and minified CSS -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.0/angular.js" integrity="sha256-g6Xp/JxVpGrPtK67q2kwtrTQNmKEHsBmw04v3ak0dWc=" crossorigin="anonymous"></script>

        


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.6.1/angular-messages.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>
        
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
        
<script>
    
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode == 46){
        var inputValue = $("#floor").val();
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
    
<script language=javascript>
function nueva(URL) {
window.open(URL, "nueva", "width=1024,height=800,scrollbars=YES,resizable=YES, maximizable=YES")
}
</script>
    

<?php

 
?>
     
            
<html>
    <head>

        <meta >
            <body>




      

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
Consulta tu avance </h1>


 



<div class="panel panel-default">
































<div class="panel panel-body">


<div class="row">
    
    
    
<div class="col-xs-6">
<label class="col-md-6 control-label" for="escuela">Introduce tu Escuela: </label>

<select required=""
ng-model="escuela"
class="form-control" >
<option 
ng-repeat="arrEscuelaFI in listaEscuelas"
value="{{arrEscuelaFI.id_escuela}}">{{arrEscuelaFI.descripcion}}</option>

</select>

  </div>
    
    
    
<div class="col-xs-6" ng-show="escuela">
    <label class="col-md-6 control-label" for="escuela">Introduce tu Matrícula: </label>
<input type="text" 
       ng-class="todos?'form-control input-md hidden':'form-control input-md';"
       class="form-control input-md" 
ng-model="q"
ng-change="buscarAlumnoxMatricula('',q,escuela);"
placeholder="Buscar Alumno" />


</div>




</div><br>




<div class="panel panel-body" ng-repeat="arrH in listaHistorico">
            
    
        <div class="h4">Fecha: {{arrH.fecha}}</div>
            
       
    
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
                <th>
                    Grasa Corporal
                </th>
                <!--<th>
                    Presión Arterial
                </th>                -->
                </tr>
                
                
                <tr>
                    <td>{{arrH.peso}}</td>
                    <td>{{arrH.talla}}</td>
                    <td>{{arrH.peso/((arrH.talla/100)*(arrH.talla/100)) | number: 2}}</td>
                    <td>{{arrH.cGC}}</td>
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
                    <td ng-class="arrH.colesterol>=200?'danger':'success'">{{arrH.colesterol}}mg/dl</td>
                    <td><200mg/dl</td>
                </tr>
    <tr>
                    <td>Trigliceridos</td>
                    <td ng-class="arrH.trigliceridos>=130?'danger':'success'">{{arrH.trigliceridos}}mg/dl</td>
                    <td><=130mg/dl</td>
                </tr>   
                
                <tr>
                    <td>Colesterol HDL</td>
                    <td ng-class="arrH.hdl<35?'danger':'success'">{{arrH.hdl}}mg/dl</td>
                    <td>>35mg/dl</td>
                </tr>  
                
                <tr>
                    <td>Colesterol LDL</td>
                    <td ng-class="arrH.ldl>=130?'danger':'success'">{{arrH.ldl}}mg/dl</td>
                    <td><=130mg/dl</td>
                </tr> 
                
                <tr>
                    <td>Insulina Basal</td>
                    <td>{{arrH.insulinaBasal}}mg/dl</td>
                    <td>2 6 24 9  uUI/ml</td>
                </tr> 
                
                <tr>
                    <td>Glucosa Basal</td>
                    <td ng-class="arrH.glucosaBasal>=100?'danger':'success'">{{arrH.glucosaBasal }}mg/dl</td>
                    <td><100mg/dl</td>
                </tr> 
                
                <!--<tr>
                    <td>Presion Arterial</td>
                    <td>{{arrH.presionArterial }}mg/dl</td>
                    <td>---</td>
                </tr>-->
            </table>   








        </div>






</div>
</div>
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


$scope.inicializarAlumnos = function (){
    $scope.agregarAlumno = {};
};


$scope.inicializarFichaClinica = function (){
    $scope.fichaClinica = {};
};


$scope.inicializarFichaBio = function(){
    $scope.fichaBio = {};
};





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










$scope.buscarAlumnoxMatricula = function(nombreCompleto,matricula,id_escuela){ 
$scope.fichaAntro.matricula = matricula;   
$scope.fichaAntro.id_escuela = id_escuela; 
$scope.nombreCompleto = nombreCompleto; 


var params = {matricula:matricula,id_escuela:id_escuela};
$scope.listaHistorico = {};
$http({
url: 'json/historialxMatricula.php',
method: 'POST',
data: params
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function(res,data) {  
$scope.listaHistorial = res.data; 
$scope.listaHistorico = res.data; 
for(var i in res.data){
console.log('paso'+res.data[i].colesterol)
}
$scope.mensaje = res.data[0].colesterol;
});

}; 









/* Mostrar y actualizar la ultima ficha clinica*/
$scope.cargarFichaClinica = function(nombreCompleto,matricula,id_escuela){ 
$scope.nombreCompleto = nombreCompleto; 
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
$scope.mostrarFichaAntro = function(nombreCompleto,matricula,escuela) {
    $scope.nombreCompleto = nombreCompleto; 
$scope.fichaAntro = {};
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





$scope.cargarFichaBio = function(nombreCompleto,matricula,id_escuela){ 
$scope.nombreCompleto = nombreCompleto; 
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
$scope.mostrarTodos = function() {

$http({
url: 'json/listaTodosAlumnos.php',
method: 'POST'
//data: angular.toJson( $scope.escuelas ),
//transformRequest: false,
//headers: {'Content-Type': 'application/json'}
})
.then(function( res,data) {   
$scope.listaAlumnos = res.data;
$scope.editarAlumno = {};
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
$scope.buscarAlumno = function(id_escuela,matricula) {

var params = {matricula:matricula,id_escuela:id_escuela};

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

