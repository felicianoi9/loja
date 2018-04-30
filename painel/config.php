<?php
require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	define("BASE", "http://localhost/loja/painel/");
	define("BASE2", "http://localhost/loja/");
} else {
	define("BASE","http://felicianoi9.com.br/loja/painel/");
	define("BASE2","http://felicianoi9.com.br/loja/");
	$config['dbname'] = 'felicia1_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'felicia1_control';
	$config['dbpass'] = 'T97ju21@t@t';
}


$config['status_pgto'] = array(
	'1' => 'Aguardando Pgto.',
	'2' => 'Aprovado',
	'3' => 'Cancelado'
);

?>