<?php
$articulo = ArticulosData::getById($_GET["id"]);
$fabricas = FabricasData::getAll();

if($articulo!=null):
?>

<div class="row">
	<div class="col-md-8">
	<h1><small>Editar articulo </small><?php echo $articulo->nombre?> </h1>
  
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion del articulo se ha actualizado exitosamente.</p>
    <a href="index.php?view=articulos" class="btn btn-danger btn-block"><i class="fa fa-arrow-right"></i> Regresar </a>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="addarticulos" enctype="multipart/form-data" action="index.php?view=updatearticulos" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del articulo*</label>
    <div class="col-md-6">
    <input type="text" name="nombre" required class="form-control"  value="<?php echo $articulo->nombre; ?>" id="nombre" placeholder="Nombres del articulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fabrica</label>
    <div class="col-md-6">
    <select name="id_fabrica" class="form-control">
    <option value="">-- NINGUNO --</option>

    <?php foreach($fabricas as $fabrica):?>
      <option value="<?php echo $fabrica->id;?>" 
      <?php if($articulo->id_fabrica!=null&& $articulo->id_fabrica==$fabrica->id)
      { echo "selected";}?>><?php echo $fabrica->nombre;?>
      </option>
    <?php endforeach;?>
      </select>    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio costo*</label>
    <div class="col-md-6">
    <input type="number" name="precio_costo" required class="form-control" value="<?php echo $articulo->precio_costo; ?>"  id="precio_costo" placeholder="Precio costo del articulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio Venta*</label>
    <div class="col-md-6">
    <input type="number" name="precio_venta" required class="form-control" value="<?php echo $articulo->precio_venta; ?>"  id="precio_venta" placeholder="Precio venta del articulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Existencias*</label>
    <div class="col-md-6">
    <input type="number" name="existencias" required class="form-control"  value="<?php echo $articulo->existencias; ?>" id="existencias" placeholder="Existencias">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
    <input type="text" name="descripcion" required class="form-control" value="<?php echo $articulo->descripcion; ?>"  id="descripcion" placeholder="Descripcion">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_active" <?php if($articulo->is_active){ echo "checked";}?>> 
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="articulo_id" value="<?php echo $articulo->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Articulo</button>
    </div>
  </div>
</form>

	</div>
</div>
<?php endif; ?>