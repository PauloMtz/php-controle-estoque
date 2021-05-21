<?php include 'template/header.php' ?>
<?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == "admin") { ?>
<?php include 'oper/lista-usuarios.php' ?>

	<div class="container" style="min-height:630px;margin-top:60px">
		<h3 style="margin-top:50px">Usuários</h3><hr>

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
					<option value="nome">Nome</option>
					<option value="email">E-mail</option>
					<option value="perfil">Perfil</option>
				</select>
				<input type="submit" value="Buscar" class="btn btn-primary">
			</div>
		</form>

		<table class="table table-striped" style="border-bottom:1px solid #ccc">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Matrícula</th>
					<th scope="col">E-mail</th>
					<th scope="col">Perfil</th>
					<th scope="col">Ativo</th>
					<th>Alterar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dados as $u) : ?>
				<tr>
					<td><?php echo $u['nome'] ?></td>
					<td><?php echo $u['matricula'] ?></td>
					<td><?php echo $u['email'] ?></td>
					<td><?php echo $u['perfil'] ?></td>
					<td><?php if ($u['ativo'] == 1) 
						{ echo 'S'; } else { echo 'N'; } ?></td>
					<td>
						<a href="usuario.php?id=<?php echo $u['id_usuario'] ?>">
							<img src="assets/img/edit.png" alt="editar" title="Editar">
						</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php } ?>
	</div>

	<?php
	} else {
		echo "<script type='text/javascript'>
				window.location.href='index.php'
			</script>";
	}
	?>

<?php include 'template/footer.php' ?>