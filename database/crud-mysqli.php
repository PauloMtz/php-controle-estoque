<?php

/*
	arquivo desenvolvido no curso de PHP do site mjailton.com.br
*/

/*error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);*/
date_default_timezone_set('America/Sao_Paulo');

// abre uma conexão
function abrirConexao()
{
	// conectar (host, usuario, senha, banco)
	$conexao = @mysqli_connect("localhost", "root", "", "estoque")
		or die(mysqli_connect_error());

	return $conexao;
}

// fecha conexão
function fecharConexao($conexao)
{
	@mysqli_close($conexao)
		or die(mysqli_error($conexao));
}

// executa uma função sql
function executar($sql)
{
	$conexao = abrirConexao();

	$qry = @mysqli_query($conexao, $sql)
		or die(@mysqli_error($conexao));

	fecharConexao($conexao);

	return $qry;
}

// lista todos os registros da tabela
function consultar($tabela, $condicao = null, $campos = "*")
{
	$sql = "SELECT {$campos} FROM {$tabela} {$condicao}";
	$qry = executar($sql);

	if (!mysqli_num_rows($qry)) {
		return false;
	} else {
		while ($linha = @mysqli_fetch_assoc($qry)) {
			$dados[] = $linha;
		}

		return $dados;
	}
}

// inserir de dados
function inserir($tabela, array $dados)
{
	// array de dados
	$campos = implode(", ", array_keys($dados));

	// os dados são passados entre aspas simples
	$valores = "'" . implode("', '", $dados) . "'";

	$sql = "INSERT INTO $tabela ({$campos}) VALUES ({$valores})";

	return executar($sql);	
}

// atualizar registro
function atualizar($tabela, array $dados, $condicao)
{
	foreach ($dados as $chave => $valor) {
		$campos[] = "{$chave} = '{$valor}'";
	}

	$campos = implode(", ", $campos);

	$sql = "UPDATE {$tabela} SET {$campos} WHERE {$condicao}";

	return executar($sql);
}

// excluir registro
function excluir($tabela, $condicao)
{
	$sql = "DELETE FROM {$tabela} WHERE {$condicao}";

	return executar($sql);
}

// escapar de sql injection
function escapar($data)
{
	$link = abrirConexao();

	if (!is_array($data)) {
		$dados = mysqli_real_escape_string($link, $data);
	} else {
		$arr = $data;

		foreach ($arr as $chave => $valor) {
			$chave = mysqli_real_escape_string($link, $chave);
			$valor = mysqli_real_escape_string($link, $valor);

			$data[$chave] = $valor;
		}
	}

	fecharConexao($link);
	return $data;
}

// total de registros
function total($sql)
{
	$qry = executar($sql);
	return mysqli_num_rows($qry);
}
