<?php

require 'database/crud-mysqli.php';

$pesquisar = isset($_GET['pesquisar']) ? strtoupper($_GET['pesquisar']) : "";
$campo = isset($_GET['campo']) ? $_GET['campo'] : null;

if ($pesquisar == "") {
	$dados = consultar("itens", " left join estoque on itens.id_item = estoque.item_id");
} else {
	$dados = consultar("itens", " left join estoque on itens.id_item = estoque.item_id where $campo like '%$pesquisar%'");
}