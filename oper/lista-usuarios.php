<?php

require 'database/crud-mysqli.php';

$pesquisar = isset($_GET['pesquisar']) ? strtoupper($_GET['pesquisar']) : "";
$campo = isset($_GET['campo']) ? $_GET['campo'] : null;

if ($pesquisar == "") {
	$dados = consultar("usuarios", " order by ativo desc, nome");
} else {
	$dados = consultar("usuarios", " where $campo like '%$pesquisar%' order by ativo desc, nome");
}
