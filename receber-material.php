<?php include 'template/header.php' ?>

<?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == "admin") { ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Recebimento de Material</h3><hr>

		<div class="card">
			<div class="card-header" align="right">
				<a class="btn btn-primary" href="" 
					data-toggle="modal" data-target="#modal-material">Buscar Item</a>
			</div>

			<div class="card-body">
				<form id="form-receber" action="oper/recebe-item.php" method="post">
					<div class="row">
						<div class="form-group col-md-3">
							<label>Descrição</label>
							<input type="text" class="form-control" name="rec_descricao" 
								id="rec_descricao" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Código ERP</label>
							<input type="text" class="form-control" name="rec_codigo" 
								id="rec_codigo" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Part Number</label>
							<input type="text" class="form-control" name="rec_number"
								id="rec_number" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Dimensões</label>
							<input type="text" class="form-control" name="rec_dimensoes"
								id="rec_dimensoes" disabled>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>Fornecedor</label>
							<input type="text" class="form-control" name="rec_fornecedor">
						</div>

						<div class="form-group col-md-6">
							<label>Contrato</label>
							<input type="text" class="form-control" name="rec_contrato">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-3">
							<label>Quantidade</label>
							<input type="text" class="form-control" name="rec_qtde"
								id="rec_qtde">
						</div>

						<div class="form-group col-md-3">
							<label>Valor Total</label>
							<input type="text" class="form-control" name="rec_total"
								id="rec_total" onblur="calcular()">
						</div>

						<div class="form-group col-md-3">
							<input type="hidden" class="form-control" name="rec_unit" 
								id="rec_unit">
						</div>

						<div class="form-group col-md-3">
							<input type="hidden" class="form-control" name="rec_id" 
								id="rec_id">
						</div>
					</div>

					<button type="submit" name="rec_submit" class="btn btn-primary">Receber Item</button>
				</form>
			</div><!-- fecha card-body -->
		</div><!-- fecha card -->
	</div><!-- fecha container -->

	<?php include 'modal-material.php' ?>

	<?php
	} else {
		echo "<script type='text/javascript'>
				window.location.href='index.php'
			</script>";
	}
	?>

<?php include 'template/footer.php' ?>
