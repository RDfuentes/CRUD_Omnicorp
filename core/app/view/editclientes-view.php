<?php
$cliente = ClientesData::getById($_GET["id"]);

if($cliente!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><small>Editar Cliente </small><?php echo $cliente->nombres?> </h1>
  
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion del cliente se ha actualizado exitosamente.</p>
    <a href="index.php?view=clientes" class="btn btn-danger btn-block"><i class="fa fa-arrow-right"></i> Regresar </a>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="addclientes" enctype="multipart/form-data" action="index.php?view=updateclientes" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo*</label>
    <div class="col-md-6">
    <input type="text" name="codigo" required class="form-control"  value="<?php echo $cliente->codigo; ?>" id="codigo" placeholder="Codigo del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
    <div class="col-md-6">
    <input type="text" name="nombres" required class="form-control" value="<?php echo $cliente->nombres; ?>"  id="nombres" placeholder="Nombres del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
    <div class="col-md-6">
    <input type="text" name="apellidos" required class="form-control" value="<?php echo $cliente->apellidos; ?>"  id="apellidos" placeholder="Apellidos del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Credito*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000"  name="credito" required class="form-control" value="<?php echo $cliente->credito; ?>"  id="credito" placeholder="Credito del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descuento*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000"  name="descuento" required class="form-control" value="<?php echo $cliente->descuento; ?>"  id="descuento" placeholder="Descuento del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Saldo*</label>
    <div class="col-md-6">
    <input type="number" min="0" max="3000"  name="saldo" required class="form-control" value="<?php echo $cliente->saldo; ?>" id="saldo" placeholder="Saldo del cliente">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_active" <?php if($cliente->is_active){ echo "checked";}?>> 
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="cliente_id" value="<?php echo $cliente->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Cliente</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>