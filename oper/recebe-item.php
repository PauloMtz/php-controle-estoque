<?php

require '../database/crud-mysqli.php';

if (isset($_POST['rec_submit'])) {
	$id = isset($_POST['rec_id']) ? $_POST['rec_id'] : 0;
	$fornecedor = isset($_POST['rec_fornecedor']) ? htmlspecialchars(strtoupper($_POST['rec_fornecedor'])) : null;
	$contrato = isset($_POST['rec_contrato']) ? htmlspecialchars(strtoupper($_POST['rec_contrato'])) : null;
	$qtde = isset($_POST['rec_qtde']) ? htmlspecialchars($_POST['rec_qtde']) : null;
	$total = isset($_POST['rec_total']) ? htmlspecialchars($_POST['rec_total']) : null;
	$unitario = isset($_POST['rec_unit']) ? $_POST['rec_unit'] : null;

	$dados = array(
		"item_id" => $id,
		"fornecedor" => $fornecedor,
		"contrato" => $contrato,
		"quantidade" => $qtde,
		"valor_total" => $total,
		"custo_unitario" => $unitario
	);

	$qtde_rec = intval($qtde);

	// a atualização do estoque é feita por trigger e stored procedure no banco de dados

	if ($qtde_rec <= 0) {
		echo "<script type='text/javascript'>
				alert('Informe um valor valido na quantidade.');
			</script>";

		echo "<script type='text/javascript'>
				window.location.href='../receber-material.php'
			</script>";
	} else {
		$inserir_dados = inserir("entrada_item", $dados);

		if ($inserir_dados) {
			echo "<script type='text/javascript'>
					alert('Item recebido com sucesso!');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../index.php'
				</script>";
		} else {
			echo "<script type='text/javascript'>
					alert('Nao foi possivel efetuar operacao.');
				</script>";

			echo "<script type='text/javascript'>
					window.location.href='../receber-material.php'
				</script>";
		}
	}	
}