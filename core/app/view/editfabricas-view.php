<?php
$fabrica = FabricasData::getById($_GET["id"]);

if($fabrica!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><small>Editar Fabrica </small><?php echo $fabrica->nombre ?> </h1>
  
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion de la fabrica se ha actualizado exitosamente.</p>
    <a href="index.php?view=fabricas" class="btn btn-danger btn-block"><i class="fa fa-arrow-right"></i> Regresar </a>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="addfabricas" enctype="multipart/form-data" action="index.php?view=updatefabricas" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la fabrica*</label>
    <div class="col-md-6">
    <input type="text" name="nombre" required class="form-control" value="<?php echo $fabrica->nombre; ?>" id="nombre" placeholder="Nombre de la fabrica">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 1*</label>
    <div class="col-md-6">
    <input type="text" name="telefono1" required class="form-control" value="<?php echo $fabrica->telefono1; ?>" id="telefono1" placeholder="Telefono 1">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 2</label>
    <div class="col-md-6">
    <input type="text" name="telefono2" required class="form-control"  value="<?php echo $fabrica->telefono2; ?>" id="telefono2" placeholder="Telefono 2">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_active" <?php if($fabrica->is_active){ echo "checked";}?>> 
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="fabrica_id" value="<?php echo $fabrica->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Fabrica</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>