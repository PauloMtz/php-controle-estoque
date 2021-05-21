<?php

session_start();

require '../database/crud-mysqli.php';

if (isset($_POST['sai_submit'])) {
	$id = isset($_POST['sai_id']) ? $_POST['sai_id'] : 0;
	$solicitante = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_nome'] : null;
	$qtde = isset($_POST['sai_qtde']) ? htmlspecialchars($_POST['sai_qtde']) : null;
	$fim = isset($_POST['sai_fim']) ? $_POST['sai_fim'] : null;
	$obs = isset($_POST['sai_obs']) ? htmlspecialchars(strtoupper($_POST['sai_obs'])) : null;
	$unitario = isset($_POST['sai_unit']) ? $_POST['sai_unit'] : null;
	$total = isset($_POST['sai_total']) ? $_POST['sai_total'] : null;

	$dados = array(
		"item_id" => $id,
		"solicitante" => $solicitante,
		"quantidade" => $qtde,
		"finalidade" => $fim,
		"observacao" => $obs,
		"custo_unitario" => $unitario,
		"valor_total" => $total
	);

	$consulta_quantidade = consultar("estoque", "where item_id = '$id'", "quantidade");

	$qtde_estoque = $consulta_quantidade[0]['quantidade'];
	$qtde_solic = intval($qtde);

	// a atualização do estoque é feita por trigger e stored procedure no banco de dados

	if ($qtde_solic > $qtde_estoque) {
		echo "<script type='text/javascript'>
				alert('Quantidade indisponivel para retirada.');
			</script>";

		echo "<script type='text/javascript'>
			window.location.href='../saida-material.php'
		</script>";
	} elseif ($qtde_solic <= 0) {
		echo "<script type='text/javascript'>
				alert('Informe um valor valido.');
			</script>";

		echo "<script type='text/javascript'>
				window.location.href='../saida-material.php'
			</script>";
	} else {
		$inserir_dados = inserir("saida_item", $dados);

		if ($inserir_dados) {
			echo "<script type='text/javascript'>
					alert('Saida registrada com sucesso!');
				</script>";

			echo "<script type='text/javascript'>
				window.location.href='../saida-material.php'
			</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Nao foi possivel efetuar operacao.');
				</script>";

			echo "<script type='text/javascript'>
				window.location.href='../saida-material.php'
			</script>";
		}
	}
}