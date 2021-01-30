<?php
$direccion = DireccionesData::getById($_GET["id"]);

if($direccion!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><small>Editar Direccion de Envio </small><?php echo $direccion->nombre ?> </h1>
  
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion de la Direccion de Envio se ha actualizado exitosamente.</p>
    <a href="index.php?view=direcciones" class="btn btn-danger btn-block"><i class="fa fa-arrow-right"></i> Regresar </a>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="adddirecciones" enctype="multipart/form-data" action="index.php?view=updatedirecciones" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
    <input type="text" name="nombre" required class="form-control" value="<?php echo $direccion->nombre; ?>" id="nombre" placeholder="Nombre direccion de envio">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Calle*</label>
    <div class="col-md-6">
    <input type="text" name="calle" required class="form-control" value="<?php echo $direccion->calle; ?>" id="calle" placeholder="Calle">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Comuna*</label>
    <div class="col-md-6">
    <input type="text" name="comuna" required class="form-control" value="<?php echo $direccion->comuna; ?>" id="comuna" placeholder="Comuna">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ciudad*</label>
    <div class="col-md-6">
    <input type="text" name="ciudad" required class="form-control" value="<?php echo $direccion->ciudad; ?>" id="ciudad" placeholder="Ciudad">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_active" <?php if($direccion->is_active){ echo "checked";}?>> 
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="direccion_id" value="<?php echo $direccion->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Direccion de envio</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>