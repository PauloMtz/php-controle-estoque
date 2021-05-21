<?php

require 'database/crud-mysqli.php';

$pesquisar = isset($_GET['pesquisar']) ? strtoupper($_GET['pesquisar']) : "";
$campo = isset($_GET['campo']) ? $_GET['campo'] : null;

if ($pesquisar == "") {
	$dados = consultar("entrada_item", " left join itens on entrada_item.item_id = itens.id_item order by data_recebimento desc");
} else {
	$dados = consultar("entrada_item", " left join itens on entrada_item.item_id = itens.id_item where $campo like '%$pesquisar%' order by data_recebimento desc");
}
