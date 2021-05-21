<?php

session_start();

require '../database/crud-mysqli.php';

$matricula = isset($_POST['matricula']) ? addslashes($_POST['matricula']) : null;
$senha = isset($_POST['senha']) ? addslashes($_POST['senha']) : null;

if ($matricula != "" && $senha != "") {
	$usuario = consultar("usuarios", " where matricula = $matricula and senha = md5($senha)");

	// se encontrar o usuário e ele estiver ativo
	if ($usuario && $usuario[0]['ativo'] == 1) {
		$_SESSION['usuario_id'] = $usuario[0]['id_usuario'];
		$_SESSION['usuario_nome'] = $usuario[0]['nome'];
		$_SESSION['usuario_perfil'] = $usuario[0]['perfil'];

		echo "<script type='text/javascript'>
				window.location.href='../index.php'
			</script>";
	} else {
		echo "<script type='text/javascript'>
				alert('Dados invalidos e/ou acesso negado.')
			</script>";

		echo "<script type='text/javascript'>
				window.location.href='../login.php'
			</script>";
	}
} else {
	unset($_SESSION['usuario_id']);
	unset($_SESSION['usuario_nome']);
	unset($_SESSION['usuario_perfil']);

	echo "<script type='text/javascript'>
			alert('Preencha os campos para acesso.')
		</script>";

	echo "<script type='text/javascript'>
			window.location.href='../login.php'
		</script>";
}
