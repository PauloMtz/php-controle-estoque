<?php

require 'database/crud-mysqli.php';

$pesquisar = isset($_GET['pesquisar']) ? strtoupper($_GET['pesquisar']) : "";
$campo = isset($_GET['campo']) ? $_GET['campo'] : null;

if ($pesquisar == "") {
	$dados = consultar("saida_item", " left join itens on saida_item.item_id = itens.id_item order by data_saida desc");
} else {
	$dados = consultar("saida_item", " left join itens on saida_item.item_id = itens.id_item where $campo like '%$pesquisar%' order by data_saida desc");
}
