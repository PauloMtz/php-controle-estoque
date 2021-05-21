<?php include 'template/header.php' ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Saída de Material</h3><hr>

		<div class="card">
			<div class="card-header" align="right">
				<a class="btn btn-primary" href="" 
					data-toggle="modal" data-target="#modal-material">Buscar Item</a>
			</div>
			
			<div class="card-body">
				<form id="form-saida" action="oper/saida-item.php" method="post">
					<div class="row">
						<div class="form-group col-md-3">
							<label>Descrição</label>
							<input type="text" class="form-control" name="sai_descricao" 
								id="sai_descricao" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Código ERP</label>
							<input type="text" class="form-control" name="sai_codigo" 
								id="sai_codigo" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Part Number</label>
							<input type="text" class="form-control" name="sai_number"
								id="sai_number" disabled>
						</div>

						<div class="form-group col-md-3">
							<label>Dimensões</label>
							<input type="text" class="form-control" name="sai_dimensoes"
								id="sai_dimensoes" disabled>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4">
							<label>Quantidade</label>
							<input type="text" class="form-control" name="sai_qtde"
								id="sai_qtde" onblur="calcula_saida()">
						</div>

						<div class="form-group col-md-4">
							<label>Finalidade</label>
							<select class="form-control" name="sai_fim">
								<option value="null">Selecione...</option>
								<option value="os">Ordem de Serviço</option>
								<option value="transf">Transferência</option>
								<option value="manut">Conserto</option>
								<option value="emp">Empréstimo</option>
							</select>
						</div>

						<div class="form-group col-md-4">
							<label>Observação</label>
							<input type="text" class="form-control" name="sai_obs">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-1">
							<input type="hidden" class="form-control" name="sai_id" 
								id="sai_id">
						</div>

						<div class="form-group col-md-1">
							<input type="hidden" class="form-control" name="sai_total" 
								id="sai_total">
						</div>

						<div class="form-group col-md-1">
							<input type="hidden" class="form-control" name="sai_unit" 
								id="sai_unit">
						</div>
					</div>

					<button type="submit" class="btn btn-primary" name="sai_submit">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>

	<?php include 'modal-material.php' ?>

<?php include 'template/footer.php' ?>
