<?php include 'template/header.php' ?>
<?php include 'oper/lista-saidas.php' ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Saídas</h3><hr>

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
					<option value="descricao">Item</option>
					<option value="codigo_erp">Código ERP</option>
					<option value="part_number">Part Number</option>
					<option value="solicitante">Solicitante</option>
					<option value="maquina">Máquina</option>
					<option value="finalidade">Finalidade</option>
				</select>
				<input type="submit" value="Buscar" class="btn btn-primary">
			</div>
		</form>

		<table class="table table-striped" style="border-bottom:1px solid #ccc">
			<thead>
				<tr>
					<th scope="col">Item</th>
					<th scope="col">Código ERP</th>
					<th scope="col">Part Number</th>
					<th scope="col">Solicitante</th>
					<th scope="col">Máquina</th>
					<th scope="col" style="text-align: center">Quantidade</th>
					<th scope="col">Finalidade</th>
					<th scope="col">Observação</th>
					<th scope="col">Data</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php foreach ($dados as $s) : ?>
					<td><?php echo $s['descricao'] ?></td>
					<td><?php echo $s['codigo_erp'] ?></td>
					<td><?php echo $s['part_number'] ?></td>
					<td><?php echo $s['solicitante'] ?></td>
					<td><?php echo $s['maquina'] ?></td>
					<td align="center"><?php echo $s['quantidade'] ?></td>
					<td><?php echo $s['finalidade'] ?></td>
					<td><?php echo $s['observacao'] ?></td>
					<td><?php echo date('d/m/Y', strtotime($s['data_saida'])); ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php } ?>
	</div>

<?php include 'template/footer.php' ?>