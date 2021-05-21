<?php include 'template/header.php' ?>
<?php include 'oper/lista-itens.php' ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Materiais</h3><hr>

		<?php
			if (!$dados) {
				echo "<h3>Nenhum registro encontrado.</h3>";
			} else {
		?>

		<form class="form-inline" style="float:right;margin-bottom:30px">
			<div class="form-group">
				<input type="text" name="pesquisar" class="form-control" size="40"
					placeholder="Pesquisar...">
				<select class="form-control" name="campo">
					<option value="null">Selecione...</option>
					<option value="descricao">Descrição</option>
					<option value="codigo_erp">Código ERP</option>
					<option value="part_number">Part Number</option>
					<option value="fabricante">Fabricante</option>
					<option value="maquina">Máquina</option>
					<option value="posicao_almox">Posição Almox</option>
				</select>
				<input type="submit" value="Buscar" class="btn btn-primary">
			</div>
		</form>

		<table class="table table-striped" style="border-bottom:1px solid #ccc">
			<thead>
				<tr>
					<th scope="col">Descrição</th>
					<th scope="col">Cód. ERP</th>
					<th scope="col">Pos. Almox.</th>
					<th scope="col">Máquina</th>
					<th scope="col">Qtde</th>
					<th scope="col">Valor unit.</th>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dados as $item) : ?>
				<tr>
					<td><?php echo $item['descricao'] ?></td>
					<td><?php echo $item['codigo_erp'] ?></td>
					<td><?php echo $item['posicao_almox'] ?></td>
					<td><?php echo $item['maquina'] ?></td>
					<td><?php echo $item['quantidade'] ?></td>
					<td><?php echo "R$ ".number_format($item['custo_unitario'], 2,",", ".") ?></td>
					<?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == "admin") { ?>
					<td>
						<a href="item.php?id=<?php echo $item['id_item'] ?>">
							<small>Atualizar</small></a>
					</td>
						<?php } ?>
					<td><a href="#" data-toggle="modal" 
							data-target="#exampleModal">
							<small id="detalhes"
								data-descricao="<?php echo $item['descricao'] ?>"
								data-codigo="<?php echo $item['codigo_erp'] ?>"
								data-number="<?php echo $item['part_number'] ?>"
								data-fab="<?php echo $item['fabricante'] ?>"
								data-maquina="<?php echo $item['maquina'] ?>"
								data-dimensoes="<?php echo $item['dimensoes'] ?>"
								data-posicao="<?php echo $item['posicao_almox'] ?>"
								data-quantidade="<?php echo $item['quantidade'] ?>"
								data-unit="<?php echo $item['custo_unitario'] ?>">
								Detalhes
							</small>
						</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<!--<ul class="pagination pagination-sm" style="float:right">
			<li class="page-item"><a class="page-link" href="#">Primeiro</a></li>
			<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
			<li class="page-item active" aria-current="page">
				<span class="page-link">1</span>
			</li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" >...</a></li>
			<li class="page-item"><a class="page-link" href="#">11</a></li>
			<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
			<li class="page-item"><a class="page-link" href="#">Último</a></li>
		</ul>-->
		<?php } ?>
	</div>

	<!-- modal detalhes -->
	<?php include 'modal-itens.php' ?>

<?php include 'template/footer.php' ?>
