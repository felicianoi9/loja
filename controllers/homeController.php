<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $prod = new Produtos();

        $dados['produtos'] = $prod->listar(8);

        $codigo_pagina = 0;

        if ($codigo_pagina==0){
        	$pagina = "home";
        	$this->loadTemplate($pagina, $dados);
        }elseif ($codigo_pagina==1) {
        	$pagina = "teste";
        	$this->loadView($pagina, $dados);
        }        
        
    }

}