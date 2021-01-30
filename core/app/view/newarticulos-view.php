<?php 
  $fabricas = FabricasData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Articulo</h1>
	<br>
  
<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addarticulos" action="index.php?view=addarticulos" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del articulo*</label>
    <div class="col-md-6">
    <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombres del articulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fabrica</label>
    <div class="col-md-6">
      <select name="id_fabrica" class="form-control">
      <option value="">-- NINGUNO --</option>
        <?php foreach($fabricas as $fabrica):?>
          <option value="<?php echo $fabrica->id;?>"><?php echo $fabrica->nombre;?></option>
        <?php endforeach;?>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio costo*</label>
    <div class="col-md-6">
    <input type="number" name="precio_costo" required class="form-control" id="precio_costo" placeholder="Precio costo del articulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio Venta*</label>
    <div class="col-md-6">
    <input type="number" name="precio_venta" required class="form-control" id="precio_venta" placeholder="Precio venta del articulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Existencias*</label>
    <div class="col-md-6">
    <input type="number" name="existencias" required class="form-control" id="existencias" placeholder="Existencias">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
    <input type="text" name="descripcion" required class="form-control" id="descripcion" placeholder="Descripcion">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Articulo</button>
    </div>
  </div>

</form>

	</div>
</div>
