<?php

require '../database/crud-mysqli.php';

if (isset($_POST['submit'])) {
	// esse id vem do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : 0;

	$descricao = isset($_POST['descricao']) ? htmlspecialchars(strtoupper($_POST['descricao'])) : null;
	$part_number = isset($_POST['part-number']) ? htmlspecialchars(strtoupper($_POST['part-number'])) : null;
	$cod_erp = isset($_POST['cod-erp']) ? htmlspecialchars(strtoupper($_POST['cod-erp'])) : null;
	$dimensoes = isset($_POST['dimensoes']) ? htmlspecialchars(strtolower($_POST['dimensoes'])) : null;
	$posicao = isset($_POST['posicao']) ? htmlspecialchars(strtoupper($_POST['posicao'])) : null;
	$maquina = isset($_POST['maquina']) ? $_POST['maquina'] : null;
	$fabricante = isset($_POST['fabricante']) ? htmlspecialchars(strtoupper($_POST['fabricante'])) : null;

	if ($id == 0) {
		$dados = array(
			"descricao" => $descricao,
			"codigo_erp" => $cod_erp,
			"part_number" => $part_number,
			"fabricante" => $fabricante,
			"maquina" => $maquina,
			"dimensoes" => $dimensoes,
			"posicao_almox" => $posicao
		);

		$inserir_dados = inserir("itens", $dados);

		if ($inserir_dados) {
			echo "<script type='text/javascript'>
					alert('Item cadastrado com sucesso!');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../index.php'
				</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Não foi possivel cadastrar item.');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../item.php'
				</script>";
		}
	} else {
		$dados = array(
			"descricao" => $descricao,
			"codigo_erp" => $cod_erp,
			"part_number" => $part_number,
			"fabricante" => $fabricante,
			"maquina" => $maquina,
			"dimensoes" => $dimensoes,
			"posicao_almox" => $posicao,
			"id_item" => $id
		);

		$atualizar_dados = atualizar("itens", $dados, "id_item = '$id'");

		if ($atualizar_dados) {
			echo "<script type='text/javascript'>
					window.location.href='../index.php'
				</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Não foi possível atualizar registro.');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../item.php'
				</script>";
		}
	}
} else {
	echo "<script type='text/javascript'>
			alert('Não foi possível realizar operacao.');
		</script>";

	echo "<script type='text/javascript'>
			window.location.href='../item.php'
		</script>";
}
