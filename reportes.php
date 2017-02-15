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





$scope.mostrarGraficaLaboratorio = function(){
  
  
Highcharts.chart('graficaLaboratorio', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Año 2017',
        data: [107, 31, 635, 203, 2]
    }]
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
.then(function(response) {
    console.log(response)
  Object.getOwnPropertyNames(fichaBio).forEach(function (prop) {
  delete fichaBio[prop];
});

//$scope.mensajeFichaAntro = 'Ficha Antropométrica agregada!'; // 
});
};     
     
    });  
     </script>
        
     
     
     
     
       

