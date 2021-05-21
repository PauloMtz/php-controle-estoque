<?php

require '../database/crud-mysqli.php';

if (isset($_POST['submit'])) {
	// esse id vem do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : 0;

	$nome = isset($_POST['nome']) ? addslashes(strtoupper($_POST['nome'])) : null;
	$perfil = isset($_POST['perfil']) ? $_POST['perfil'] : null;
	$matricula = isset($_POST['matricula']) ? addslashes($_POST['matricula']) : null;
	$email = isset($_POST['email']) ? addslashes(strtolower($_POST['email'])) : null;
	$ativo = isset($_POST['ativo']) ? 1 : 0;
	$senha = md5('123');

	if ($id == 0) {
		$dados = array(
			"nome" => $nome,
			"matricula" => $matricula,
			"email" => $email,
			"senha" => $senha,
			"perfil" => $perfil,
			"ativo" => $ativo
		);

		$inserir_dados = inserir("usuarios", $dados);

		if ($inserir_dados) {
			echo "<script type='text/javascript'>
					window.location.href='../usuarios.php'
				</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Não foi possível cadastrar usuario.');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../usuario.php'
				</script>";
		}
	} else {
		$dados = array(
			"nome" => $nome,
			"matricula" => $matricula,
			"email" => $email,
			"senha" => $senha,
			"perfil" => $perfil,
			"ativo" => $ativo,
			"id_usuario" => $id
		);

		$atualizar_dados = atualizar("usuarios", $dados, "id_usuario = '$id'");

		if ($atualizar_dados) {
			echo "<script type='text/javascript'>
					window.location.href='../usuarios.php'
				</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Não foi possível atualizar registro.');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../usuario.php'
				</script>";
		}
	}
} else {
	echo "<script type='text/javascript'>
			alert('Não foi possível realizar operacao.');
		</script>";

	echo "<script type='text/javascript'>
			window.location.href='../usuario.php'
		</script>";
}
