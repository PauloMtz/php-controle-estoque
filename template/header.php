<?php
session_start();

if (isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id'])) {
	$id_usuario = $_SESSION['usuario_id'];
	$nome = $_SESSION['usuario_nome'];
	$perfil = $_SESSION['usuario_perfil'];
} else {
	echo "<script type='text/javascript'>
		window.location.href='login.php'
	</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" 
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Controle de Estoque</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					<img src="assets/img/logo.png">
				</a>
			</div>

			<div id="navbar" class="navbar-collapse collapse" style="margin-top:10px">
				<ul class="nav navbar-nav">
					<li ><a href="index.php">Início</a></li>
					<?php if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == 'admin') : ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
							aria-haspopup="true" aria-expanded="false">Cadastros 
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="usuario.php">Novo Usuário</a></li>
							<li><a href="item.php">Cadastrar Item</a></li>
						</ul>
					</li>
					<?php endif ?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
							aria-haspopup="true" aria-expanded="false">Operações 
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == 'admin') : ?>
							<li><a href="receber-material.php">Recebimento de Materiais</a></li>
							<?php endif ?>
							<li><a href="saida-material.php">Saída de Materiais</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
							aria-haspopup="true" aria-expanded="false">Consultas 
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="recebimentos.php">Recebimentos</a></li>
							<li><a href="saidas.php">Saídas</a></li>
							<?php if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_perfil'] == 'admin') : ?>
							<li><a href="usuarios.php">Usuários</a></li>
							<?php endif ?>
						</ul>
					</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<?php if(isset($_SESSION['usuario_nome'])) : ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
							aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario_nome'] ?>
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="alterar-senha.php">Alterar Senha</a></li>
							<li><a href="oper/logout.php">Sair</a></li>
						</ul>
					</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
