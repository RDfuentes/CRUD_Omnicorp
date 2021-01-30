<?php
$compra = ComprasData::getById($_GET["id"]);
$clientes = ClientesData::getAll();
$envios = DireccionesData::getAll();
$articulos = ArticulosData::getAll();

if($compra!=null):
?>

<div class="row">
	<div class="col-md-12">
	<h1><small>COMPROBANTE DE VENTA NUMERO: </small><?php echo $compra->id?> </h1><br>

	<form class="form-horizontal" method="post" id="addcompras" enctype="multipart/form-data" action="index.php?view=updatecompras" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-md-6">
    <input type="text" name="id_cliente" required class="form-control" readonly="readonly" value="<?php if($compra->id_cliente!=null){echo $compra->getCliente()->nombres;}else{ echo "<center>----</center>"; }  ?>" id="total" placeholder="Total de la compra">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion de envio</label>
    <div class="col-md-6">
    <input type="text" name="id_envio" required class="form-control" readonly="readonly" value="<?php if($compra->id_envio!=null){echo $compra->getEnvio()->nombre;}else{ echo "<center>----</center>"; }  ?>" id="total" placeholder="Total de la compra">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Articulo</label>
    <div class="col-md-6">
    <input type="text" name="id_articulo" required class="form-control" readonly="readonly" value="<?php if($compra->id_articulo!=null){echo $compra->getArticulo()->nombre;}else{ echo "<center>----</center>"; }  ?>" id="total" placeholder="Total de la compra">
    </div>
  </div>
  

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad*</label>
    <div class="col-md-6">
    <input type="text" name="cantidad" required class="form-control" readonly="readonly" value="<?php echo $compra->cantidad; ?>" id="cantidad" placeholder="Cantidad de productos">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Total*</label>
    <div class="col-md-6">
    <input type="text" name="total" required class="form-control" readonly="readonly" value="<?php echo $compra->total; ?>" id="total" placeholder="Total de la compra">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Anotaciones*</label>
    <div class="col-md-6">
    <input type="text" name="nota" required class="form-control" readonly="readonly" value="<?php echo $compra->nota; ?>" id="total" placeholder="Anotaciones">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
      <button type="button" class="btn btn-success">IMPRIMIR COMPROBANTE</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>