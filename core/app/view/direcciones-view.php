<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newdirecciones" class="btn btn-danger"> <i class='fa fa-plus'> Añadir Direccion</i></a>
<div class="btn-group pull-right">

</div>
</div>
		<h1>Direcciones de envio</h1>
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

$direcciones = DireccionesData::getAll();
if(count($direcciones)>0){

if($page==1){
$curr_direcciones = DireccionesData::getAllByPage($direcciones[0]->id,$limit);
}else{
$curr_direcciones = DireccionesData::getAllByPage($direcciones[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($direcciones)/$limit);
 $spaginas = count($direcciones)%$limit;

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
		<th>Nombre</th>
		<th>Calle</th>
		<th>Comuna</th>
		<th>Ciudad</th>	
		<th>Fecha</th>
		<th></th>
	</thead>
	<?php foreach($curr_direcciones as $direccion):?>
	<tr>
		<td><?php echo $direccion->id; ?></td>
		<td><?php echo $direccion->nombre; ?></td>
		<td><?php echo $direccion->calle; ?></td>
		<td><?php echo $direccion->comuna; ?></td>
		<td><?php echo $direccion->ciudad; ?></td>
		<td><?php echo $direccion->created_at; ?></td>

		<td style="width:70px;">
		<a href="index.php?view=editdirecciones&id=<?php echo $direccion->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=deldirecciones&id=<?php echo $direccion->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=direcciones&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
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
		<h2>No hay direcciones de envio registradas</h2>
		<p>No se han agregado direcciones de envio a la base de datos, puedes agregar una dando click en el boton <b>"Añadir Direccion"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>