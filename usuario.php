<?php include 'template/header.php' ?>

<?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == "admin") { ?>

<?php
	require 'database/crud-mysqli.php';

	// esse 'id' vem da lista, quando clica em editar usuário
	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$dados = consultar("usuarios", "where id_usuario = '$id'");

	if ($dados) {
		foreach ($dados as $u) {}
	} else {
		$dados = "";
	}
	
?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Dados do Usuário</h3><hr>	
			
		<form action="oper/cadastro-usuario.php" method="post">
			<div class="row">
				<div class="form-group col-md-5">
					<label>Nome</label>
					<input type="text" class="form-control" name="nome" required
						value="<?php echo $u['nome'] ?>">
				</div>

				<div class="form-group col-md-3">
					<label>Perfil</label>
					<select class="form-control" name="perfil">
						<option value="0">Selecione...</option>
						<option value="admin" 
							<?php if($u['perfil']=="admin") echo 'selected="selected"'; ?>>Admin
						</option>
						<option value="user" 
							<?php if($u['perfil']=="user") echo 'selected="selected"'; ?>>User
						</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					<label>Matrícula</label>
					<input type="text" class="form-control" name="matricula" required
						value="<?php echo $u['matricula'] ?>">
				</div>

				<div class="form-group col-md-4">
					<label>E-mail</label>
					<input type="email" class="form-control" name="email" required
						value="<?php echo $u['email'] ?>">
				</div>
			</div>

			<div class="checkbox" style="margin-bottom:20px">
			    <label>
			      <input type="checkbox" name="ativo" 
			      	<?php echo ($u['ativo'] == 1) ? 'checked' : '' ?>> Ativo
			    </label>
			</div><hr>

			<button type="submit" name="submit" class="btn btn-primary">Salvar</button>
			<span style="margin-left:10px"></span>
			<a href="usuarios.php" class="btn btn-warning">Cancelar</a>
			<input type="hidden" name="id" value="<?php echo $u['id_usuario'] ?>">
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
