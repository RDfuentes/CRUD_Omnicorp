<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addclientes" action="index.php?view=addclientes" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo*</label>
    <div class="col-md-6">
    <input type="text" name="codigo" required class="form-control" id="codigo" placeholder="Codigo del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
    <div class="col-md-6">
    <input type="text" name="nombres" required class="form-control" id="nombres" placeholder="Nombres del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
    <div class="col-md-6">
    <input type="text" name="apellidos" required class="form-control" id="apellidos" placeholder="Apellidos del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Credito*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000" name="credito" required class="form-control" id="credito" placeholder="Credito del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descuento*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000"  name="descuento"  required class="form-control" id="descuento" placeholder="Descuento del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Saldo*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000"  name="saldo"  required class="form-control" id="saldo" placeholder="Saldo del cliente">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Cliente</button>
    </div>
  </div>
</form>

	</div>
</div>

<script>
  $(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});

</script>