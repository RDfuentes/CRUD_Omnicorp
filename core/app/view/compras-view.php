<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newcompras" class="btn btn-danger"> <i class='fa fa-plus'> Añadir Compra</i></a>
<div class="btn-group pull-right">

</div>
</div>
		<h1>Compras</h1>
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

$compras = ComprasData::getAll();
if(count($compras)>0){

if($page==1){
$curr_compras = ComprasData::getAllByPage($compras[0]->id,$limit);
}else{
$curr_compras = ComprasData::getAllByPage($compras[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($compras)/$limit);
 $spaginas = count($compras)%$limit;

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
		<th>Cliente</th>
		<th>Articulo</th>
		<th>Total</th>
		<th>Fecha</th>
		<th></th>
	</thead>
	<?php foreach($curr_compras as $compra):?>
	<tr>
		<td><?php echo $compra->id; ?></td>
		<td><?php if($compra->id_cliente!=null){echo $compra->getCliente()->nombres;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php if($compra->id_articulo!=null){echo $compra->getArticulo()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php echo $compra->total; ?></td>
		<td><?php echo $compra->created_at; ?></td>

		<td style="width:70px;">
		<a href="index.php?view=editcompras&id=<?php echo $compra->id; ?>" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=compras&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
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
		<h2>No hay compras registradas</h2>
		<p>No se han agregado compras a la base de datos, puedes agregar uno dando click en el boton <b>"Añadir Compra"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>