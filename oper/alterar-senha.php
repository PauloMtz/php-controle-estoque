<?php

require '../database/crud-mysqli.php';

if (isset($_POST['submit'])) {
	// esse id vem do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$senha = isset($_POST['senha']) ? addslashes(md5($_POST['senha'])) : null;;

	$dados = array(
		"senha" => $senha,
		"id_usuario" => $id
	);

	$atualizar_dados = atualizar("usuarios", $dados, "id_usuario = '$id'");

	if ($atualizar_dados) {
		echo "<script type='text/javascript'>
				window.location.href='../usuarios.php'
			</script>";
	} else {
		echo "<script type='text/javascript'>
				alert('Não foi possível alterar a senha.');
			</script>";

		echo "<script type='text/javascript'>
				window.location.href='../usuario.php'
			</script>";
	}
} else {
	echo "<script type='text/javascript'>
			alert('Não foi possível realizar operacao.');
		</script>";

	echo "<script type='text/javascript'>
			window.location.href='../usuario.php'
		</script>";
}
