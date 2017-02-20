<?php require_once('menuPrincipal.php'); ?>
    
    
    
    
    <script>
         var inicia = angular.module('inicia', []);
        
        </script>
        
        <div  class="container" ng-app ="inicia" ng-cloak=""
                              ng-controller="ctrlLab" 
                              ng-init="listaEscuelaFunction();">


<h1 class="h1 text-center" ng-init="listaEscuelaFunction();">
Catálogo de Escuelas
</h1>






<style type="text/css">
table {
   font-size: 12px;
}
</style>


<!-- Button trigger modal -->
<div class="row">
    <div class="col-xs-12">
        <div class="text-right">
            <a style="cursor: pointer"   data-toggle="modal" 
        data-target="#catalogoEscuela">
<span class="glyphicon glyphicon-plus-sign " aria-hidden="true"></span> Agregar
            </a></br>
        </div>
        
    </div>


   <div class="col-xs-12">
<div class="panel panel-default">
    
    
    <div class="panel panel-body">
        
        
        <table class="table table-striped table-hover">
    
            <th width="10%" >#</th>
            <th class="text-left" width="70%">Nombre</th>
            
            <th class="text-left"></th>
            <th></th>
           
            
            <tr ng-repeat="arrayEscuelas in listaEscuelas">
                <td>{{$index+1}}</td>
                <td>{{arrayEscuelas.descripcion}}</td>

                <td></td>
                   <td></td>
            </tr>
                  
                
            
        </table>
        
        
    </div>
    
    </div>
    
</div>
    
    
    
    
</div>









<!-- Modal -->
<div class="modal fade" id="catalogoEscuela" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Escuela</h4>
      </div>
      <div class="modal-body">
          
          
          
          
  <form name="formaEscuelas" id="formaEscuelas" class="form-horizontal">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
  <div class="col-md-8" ng-class="!escuelas.nombreEscuela?'form-group  has-error' :  'form-group  ';">
  <label class="control-label" for="cod">Nombre:</label>  

  <input id="nombreEscuela" ng-model="escuelas.nombreEscuela" 
         name="cod" placeholder="Escriba el nombre completo de la escuela" 
         
         class="form-control input-md" type="text">
    
  </div>








</fieldset>
</form>
          
          
          
      </div>
        
        
        
        
        
      <div class="modal-footer">
       
        <button type="button" class="btn btn-success"
                ng-click="guardarEscuela();"
                ng-show="escuelas.nombreEscuela" data-dismiss="modal">Guardar</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
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
$scope.fichaBio = {};




/* guardar ficha de identificacion */
$scope.guardarFichaBio = function() {
    
var params = {fichaAntro:$scope.fichaAntro};
$http({
           url: 'json/guardarFichaBio.php',
           method: 'POST',
           data: angular.toJson( $scope.fichaBio),
           transformRequest: false,
           headers: {'Content-Type': 'application/json'}
       })
.then(function(response) {
    console.log(response)
  Object.getOwnPropertyNames(fichaBio).forEach(function (prop) {
  delete fichaBio[prop];
});

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
};




/* guardar ficha de identificacion */
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
    console.log(response)
  Object.getOwnPropertyNames(fichaClinica).forEach(function (prop) {
  delete fichaClinica[prop];
});

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
.then(function(data,res) {
  Object.getOwnPropertyNames(fichaAntro).forEach(function (prop) {
  delete fichaAntro[prop];
});

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
};

$scope.cargarFichaBio = function(matricula,id_escuela){ 
    $scope.fichaBio.matricula = matricula;   
    $scope.fichaBio.id_escuela = id_escuela; 
};


$scope.cargarFichaAntro = function(matricula,id_escuela){ 
    $scope.fichaAntro.matricula = matricula;   
    $scope.fichaAntro.id_escuela = id_escuela; 
};



$scope.cargarFichaClinica = function(matricula,id_escuela){ 
    $scope.fichaClinica.matricula = matricula;   
    $scope.fichaClinica.id_escuela = id_escuela; 
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

