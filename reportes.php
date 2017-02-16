<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php require_once('menuPrincipal.php'); ?>

    <script>
         var inicia = angular.module('inicia', []);
        
        </script>
    
        
                        <div  class="container" ng-app ="inicia" ng-cloak=""
                              ng-controller="ctrlLab" 
                              ng-init="mostrarGraficaLaboratorio();">


                            <h1 class="text-center">
                                Reportes
                            </h1>
                            
                            
                            
                            


<div id="graficaLaboratorio"
     style="min-width: 310px; 
     max-width: 800px; height: 400px; margin: 0 auto"></div>


    
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


$scope.llenarValores = function(data){
    
var hombres = [];
var mujeres = [];



for (var i in data){
    
    if(data[i].sexo=='F'){
        
        mujeres.push([parseFloat(data[i].talla), parseFloat(data[i].peso)]);
    }
    
    if(data[i].sexo=='M'){
        hombres.push([parseFloat(data[i].talla), parseFloat(data[i].peso)]);
    }
}    
  
    
    
/*dibujar grafica*/    
Highcharts.chart('graficaLaboratorio', {
    chart: {
        type: 'scatter',
        zoomType: 'xy'
    },
    title: {
        text: 'Estatura y Peso de alumnos por genero'
    },
    subtitle: {
        text: 'Todas las Escuelas'
    },
    xAxis: {
        title: {
            enabled: true,
            text: 'Estatura (cm)'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'Peso (kg)'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 100,
        y: 70,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },
    plotOptions: {
        scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.x} cm, {point.y} kg'
            }
        }
    },
    series: [{
        name: 'Femenino',
        color: 'rgba(223, 83, 83, .5)',
        data: mujeres

    }, {
        name: 'Masculino',
        color: 'rgba(119, 152, 191, .5)',
        data: hombres
    }]
});
};






$scope.mostrarGraficaLaboratorio = function(){
  
  
  
var arreglo = {};  
var params = {tipoReporte:$scope.tipoReporte};
$http({
           url: 'json/historialGlobalPeso.php',
           method: 'POST',
           data: params
       })
.then(function(res,data) {
   $scope.arreglo = res.data;
 $scope.llenarValores($scope.arreglo);

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});  
  
  
  
    
    
};











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
.then(function(res,data) {
    console.log(response)
 

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
};     
     
    });  
     </script>
        
     
     
     
     
       

