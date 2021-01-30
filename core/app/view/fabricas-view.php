<div class="row">
	<div class="col-md-12">
		<div class="btn-group  pull-right">
			<a href="index.php?view=newfabricas" class="btn btn-danger"> <i class='fa fa-plus'> Añadir Fabrica</i></a>
		<div class="btn-group pull-right">
	</div>
</div>
		<h1>Fabricas</h1>
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

$fabricas = FabricasData::getAll();
if(count($fabricas)>0){

if($page==1){
$curr_fabricas = FabricasData::getAllByPage($fabricas[0]->id,$limit);
}else{
$curr_fabricas = FabricasData::getAllByPage($fabricas[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($fabricas)/$limit);
 $spaginas = count($fabricas)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=fabricas&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=fabricas&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Id</th>
		<th>Nombre Fabrica</th>
		<th>Telefono 1</th>
		<th>Telefono 2</th>
		<th>Fecha</th>
		<th></th>
	</thead>
	<?php foreach($curr_fabricas as $fabrica):?>
	<tr>
		<td><?php echo $fabrica->id; ?></td>
		<td><?php echo $fabrica->nombre; ?></td>
		<td><?php echo $fabrica->telefono1; ?></td>
		<td><?php echo $fabrica->telefono2; ?></td>
		<td><?php echo $fabrica->created_at; ?></td>
		
		<td style="width:70px;">
		<a href="index.php?view=editfabricas&id=<?php echo $fabrica->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=delfabricas&id=<?php echo $fabrica->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=fabricas&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="fabricas">
	<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay fabricas registradas</h2>
		<p>No se han agregado fabricas a la base de datos, puedes agregar uno dando click en el boton <b>"Añadir Fabrica"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>