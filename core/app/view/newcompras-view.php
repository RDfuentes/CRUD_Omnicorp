<?php 
  $clientes = ClientesData::getAll();
  $envios = DireccionesData::getAll();
  $articulos = ArticulosData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nueva Compra</h1>
	<br> 
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addcompras" action="index.php?view=addcompras" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-md-6">
      <select name="id_cliente" class="form-control">
      <option value="">-- NINGUNO --</option>
        <?php foreach($clientes as $cliente):?>
          <option value="<?php echo $cliente->id;?>"><?php echo $cliente->nombres;?></option>
        <?php endforeach;?>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion de Envio</label>
    <div class="col-md-6">
      <select name="id_envio" class="form-control">
      <option value="">-- NINGUNO --</option>
        <?php foreach($envios as $envio):?>
          <option value="<?php echo $envio->id;?>"><?php echo $envio->nombre;?></option>
        <?php endforeach;?>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Articulo</label>
    <div class="col-md-6">
      <select name="id_articulo" class="form-control">
      <option value="">-- NINGUNO --</option>
        <?php foreach($articulos as $articulo):?>
          <option value="<?php echo $articulo->id;?>"><?php echo $articulo->nombre;?></option>
        <?php endforeach;?>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad*</label>
    <div class="col-md-6">
    <input type="text" name="cantidad" required class="form-control" id="cantidad" placeholder="Cantidad de productos">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Total*</label>
    <div class="col-md-6">
    <input type="text" name="total" required class="form-control" id="total" placeholder="Total de la compra">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Anotaciones*</label>
    <div class="col-md-6">
    <input type="text" name="nota" required class="form-control" id="nota" placeholder="Anotaciones">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Compra</button>
    </div>
  </div>
</form>

	</div>
</div>
