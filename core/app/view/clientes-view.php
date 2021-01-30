<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newclientes" class="btn btn-danger"> <i class='fa fa-plus'> Añadir Cliente</i></a>
<div class="btn-group pull-right">

</div>
</div>
		<h1>Clientes</h1>
		<div class="clearfix"></div>


<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$clientes = ClientesData::getAll();
if(count($clientes)>0){

if($page==1){
$curr_clientes = ClientesData::getAllByPage($clientes[0]->id,$limit);
}else{
$curr_clientes = ClientesData::getAllByPage($clientes[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($clientes)/$limit);
 $spaginas = count($clientes)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=direcciones&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=direcciones&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Id</th>
		<th>Codigo</th>
		<th>Nombres</th>
		<th>Apellido</th>
		<th>Credito</th>
		<th>Descuento</th>
		<th>Saldo</th>
		<th>Fecha</th>
		<th></th>
	</thead>
	<?php foreach($curr_clientes as $cliente):?>
	<tr>
		<td><?php echo $cliente->id; ?></td>
		<td><?php echo $cliente->codigo; ?></td>
		<td><?php echo $cliente->nombres; ?></td>
		<td><?php echo $cliente->apellidos; ?></td>
		<td>Q. <?php echo $cliente->credito; ?></td>
		<td>Q. <?php echo $cliente->descuento; ?></td>
		<td>Q. <?php echo $cliente->saldo; ?></td>
		<td><?php echo $cliente->created_at; ?></td>

		<td style="width:70px;">
		<a href="index.php?view=editclientes&id=<?php echo $cliente->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=delclientes&id=<?php echo $cliente->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=clientes&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="notas">
	<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay clientes registrados</h2>
		<p>No se han agregado clientes a la base de datos, puedes agregar uno dando click en el boton <b>"Añadir Cliente"</b>.</p>
	</div>
	<?php
}

?>
	</div>
</div>