<?php include 'template/header.php' ?>

<?php
	require 'database/crud-mysqli.php';

	if (isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id'])) {
		$id = $_SESSION['usuario_id'];
		$dados = consultar("usuarios", " where id_usuario = $id");

		if ($dados) {
			foreach ($dados as $u) {}
		} else {
			$dados = "";
		}
	}
	
?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Alterar Senha</h3><hr>	
			
		<form action="oper/alterar-senha.php" method="post">
			<div class="row">
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text" class="form-control" name="nome" disabled
						value="<?php echo $u['nome'] ?>">
				</div>

				<div class="form-group col-md-4">
					<label>Matrícula</label>
					<input type="text" class="form-control" name="matricula" disabled
						value="<?php echo $u['matricula'] ?>">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					<label>Senha</label>
					<input type="password" class="form-control" name="senha" required
						value="<?php echo $u['senha'] ?>">
				</div>

				<div class="form-group col-md-4">
					<label>E-mail</label>
					<input type="email" class="form-control" name="email" disabled
						value="<?php echo $u['email'] ?>">
				</div>
			</div><hr>

			<button type="submit" name="submit" class="btn btn-primary">Salvar</button>
			<span style="margin-left:10px"></span>
			<a href="index.php" class="btn btn-warning">Cancelar</a>
			<input type="hidden" name="id" value="<?php echo $u['id_usuario'] ?>">
		</form>
	</div>

<?php include 'template/footer.php' ?>
