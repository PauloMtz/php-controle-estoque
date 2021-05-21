<?php include 'template/header.php' ?>

<?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == "admin") { ?>

<?php
	require 'database/crud-mysqli.php';

	// esse 'id' vem da lista, quando clica em editar usuário
	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$dados = consultar("itens", "where id_item = '$id'");

	if ($dados) {
		foreach ($dados as $item) {}
	} else {
		$dados = "";
	}
	
?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Cadastro Item</h3><hr>
		
		<form action="oper/cadastro-item.php" method="post">
			<div class="row">
				<div class="form-group col-md-4">
					<label>Descrição</label>
					<input type="text" class="form-control" name="descricao" required
						value="<?php echo $item['descricao'] ?>">
				</div>

				<div class="form-group col-md-4">
					<label>Part Number</label>
					<input type="text" class="form-control" name="part-number"
						value="<?php echo $item['part_number'] ?>">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-2">
					<label>Código ERP</label>
					<input type="text" class="form-control" name="cod-erp" required
						value="<?php echo $item['codigo_erp'] ?>">
				</div>

				<div class="form-group col-md-3">
					<label>Dimensões</label>
					<input type="text" class="form-control" name="dimensoes"
						value="<?php echo $item['dimensoes'] ?>">
				</div>

				<div class="form-group col-md-3">
					<label>Posição Almox</label>
					<input type="text" class="form-control" name="posicao"
						value="<?php echo $item['posicao_almox'] ?>">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					<label>Máquina</label>
					<select class="form-control" name="maquina">
						<option value="0">Selecione...</option>
						<option value="Crisplant"
						<?php if(isset($item['maquina']) && $item['maquina'] == "Crisplant")
							{ echo "selected";}  ?>>Crisplant</option>
						<option value="Crossbelt"
						<?php if(isset($item['maquina']) && $item['maquina'] == "Crossbelt")
							{ echo "selected";}  ?>>Crossbelt</option>
						<option value="DBCS"
						<?php if(isset($item['maquina']) && $item['maquina'] == "DBCS")
							{ echo "selected";}  ?>>DBCS</option>
						<option value="OVIS"
						<?php if(isset($item['maquina']) && $item['maquina'] == "OVIS")
							{ echo "selected";}  ?>>OVIS</option>
					</select>
				</div>

				<div class="form-group col-md-4">
					<label>Fabricante</label>
					<input type="text" class="form-control" name="fabricante"
						value="<?php echo $item['fabricante'] ?>">
				</div>
			</div>

			<input type="hidden" name="id" value="<?php echo $item['id_item'] ?>">
			<button type="submit" class="btn btn-primary" name="submit">Salvar</button>
		</form>
	</div>

<?php
} else {
	echo "<script type='text/javascript'>
			window.location.href='index.php'
		</script>";
}
?>

<?php include 'template/footer.php' ?>
