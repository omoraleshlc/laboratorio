<?php require_once('menuPrincipal.php'); ?>

<h1 class="h1 text-center">
FICHA CLINICA
</h1>








<form class="form-horizontal ">
<fieldset>

<!-- Form Name -->
<legend class="text-center">LABORATORIO</legend>

<!-- Text input-->
  

 




<div class="form-group">
    <label class="col-md-4 control-label" for="nome">TOMA 1</label> 
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Brazo Derecho:</label>  
  <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="120" class="form-control input-md" required="" type="text">
    
  </div>
  
    <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="80" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Brazo Izquierdo:</label>  
  <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="120" class="form-control input-md" required="" type="text">
    
  </div>
  
    <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="4"
         name="nome" placeholder="80" class="form-control input-md" required="" type="text">
    
  </div>
</div>





<div class="form-group">
      <label class="col-md-4 control-label" for="nome">TOMA 2</label> 
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Brazo Derecho:</label>  
  <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="3"
         name="nome" placeholder="120" class="form-control input-md" required="" type="text">
    
  </div>
  
    <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="3"
         name="nome" placeholder="80" class="form-control input-md" required="" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="nome">Brazo Izquierdo:</label>  
  <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="3"
         name="nome" placeholder="120" class="form-control input-md" required="" type="text">
    
  </div>
  
    <div class="col-md-2">
  <input id="nome" 
         onkeypress="return isNumberKey(event)" maxlength="3"
         name="nome" placeholder="80" class="form-control input-md" required="" type="text">
    
  </div>
</div>







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