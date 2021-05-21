<?php include 'oper/lista-itens.php' ?>

	<table class="table table-striped" style="border-bottom:1px solid #ccc">
		<thead>
			<tr>
				<th scope="col">Descrição</th>
				<th scope="col">Cód. ERP</th>
				<th scope="col">Part Number</th>
				<th scope="col">Dimensões</th>
				<th scope="col">Máquina</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dados as $item) : ?>
			<tr>
				<td><?php echo $item['descricao'] ?></td>
				<td><?php echo $item['codigo_erp'] ?></td>
				<td><?php echo $item['part_number'] ?></td>
				<td><?php echo $item['dimensoes'] ?></td>
				<td><?php echo $item['maquina'] ?></td>
				<td><a href="#modal-material" data-toggle="modal">
						<small class="selecionar" 
							data-id="<?php echo $item['id_item'] ?>"
							data-descricao="<?php echo $item['descricao'] ?>"
							data-codigo="<?php echo $item['codigo_erp'] ?>"
							data-number="<?php echo $item['part_number'] ?>"
							data-fab="<?php echo $item['fabricante'] ?>"
							data-maquina="<?php echo $item['maquina'] ?>"
							data-dimensoes="<?php echo $item['dimensoes'] ?>"
							data-posicao="<?php echo $item['posicao_almox'] ?>"
							data-quantidade="<?php echo $item['quantidade'] ?>"
							data-unit="<?php echo $item['custo_unitario'] ?>">
							Selecionar
						</small>
					</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>