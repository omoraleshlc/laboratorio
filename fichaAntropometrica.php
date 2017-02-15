<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.6.1/angular-messages.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>


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



<?php require_once('menuPrincipal.php'); ?>

<h1 class="h1 text-center">
FICHA ANTROPOPMETRICA
</h1>








<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend class="text-center">LABORATORIO</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cod">Talla:</label>  
  <div class="col-md-4">
  <input id="cod" name="cod" placeholder="Metros" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Peso:</label>  
  <div class="col-md-4">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="Kilogramos" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Circunferencia de Muñeca:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome"
         onkeypress="return isNumberKey(event)" maxlength="4"
         placeholder="Centímetros" class="form-control input-md" required="" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Circunferencia de cadera:</label>  
  <div class="col-md-4">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="Centímetros" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<!-- Multiple Checkboxes -->


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-success">Guardar</button>
    <button id="button2id" name="button2id" class="btn btn-warning">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
    
    
    
    <?php require_once('footer.php'); ?>   

