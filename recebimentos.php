<?php include 'template/header.php' ?>
<?php include 'oper/lista-recebimentos.php' ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Recebimentos</h3><hr>

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
					<option value="fornecedor">Fornecedor</option>
					<option value="maquina">Contrato</option>
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
					<th scope="col">Fornecedor</th>
					<th scope="col">Contrato</th>
					<th scope="col" style="text-align: center">Quantidade</th>
					<th scope="col">Valor Total</th>
					<th scope="col">Data</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dados as $r) : ?>
				<tr>
					<td><?php echo $r['descricao'] ?></td>
					<td><?php echo $r['codigo_erp'] ?></td>
					<td><?php echo $r['part_number'] ?></td>
					<td><?php echo $r['fornecedor'] ?></td>
					<td><?php echo $r['contrato'] ?></td>
					<td align="center"><?php echo $r['quantidade'] ?></td>
					<td><?php echo "R$ ".number_format($r['valor_total'], 2, ",", ".") ?></td>
					<td><?php echo date('d/m/Y', strtotime($r['data_recebimento'])); ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php } ?>
	</div>

<?php include 'template/footer.php' ?>
