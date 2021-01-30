	<div class="row">
		<div class="col-md-12">
			<div class="btn-group  pull-right">
				<a href="index.php?view=newarticulos" class="btn btn-danger"> <i class='fa fa-plus'> Añadir Articulo</i></a>
			<div class="btn-group pull-right">
		</div>
	</div>
	
	<h1>Articulos</h1>

	<?php
	
	$page = 1;
	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}

	$limit=10;
	if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
		$limit=$_GET["limit"];
	}

	$articulos = ArticulosData::getAll();
	if(count($articulos)>0){
		if($page==1){
			$curr_articulos = ArticulosData::getAllByPage($articulos[0]->id,$limit);
		}else{
			$curr_articulos = ArticulosData::getAllByPage($articulos[($page-1)*$limit]->id,$limit);
		}

	$npaginas = floor(count($articulos)/$limit);
	$spaginas = count($articulos)%$limit;
	
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
			<th>Nombre Articulo</th>
			<th>Fabrica</th>
			<th>Precio Costo</th>
			<th>Precio Venta</th>
			<th>Existencias</th>
			<th>Descripcion</th>
			<th>Fecha</th>
			<th></th>
		</thead>
		<?php foreach($curr_articulos as $articulo):?>
		<tr>
			<td><?php echo $articulo->nombre; ?></td>
			<td><?php if($articulo->id_fabrica!=null){echo $articulo->getFabrica()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
			<td><?php echo $articulo->precio_costo; ?></td>
			<td><?php echo $articulo->precio_venta; ?></td>
			<td><?php echo $articulo->existencias; ?></td>
			<td><?php echo $articulo->descripcion; ?></td>
			<td><?php echo $articulo->created_at; ?></td>

			<td style="width:70px;">
			<a href="index.php?view=editarticulos&id=<?php echo $articulo->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
			<a href="index.php?view=delarticulos&id=<?php echo $articulo->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="btn-group pull-right">
	<?php

	for($i=0;$i<$npaginas;$i++){
		echo "<a href='index.php?view=articulos&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
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
				<h2>No hay articulos registrados</h2>
				<p>No se han agregado articulos a la base de datos, puedes agregar uno dando click en el boton <b>"Añadir Articulo"</b>.</p>
			</div>
			<?php
			}
			?>

		</div>
	</div>