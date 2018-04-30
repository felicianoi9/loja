<?php
class categoriaController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function ver($id) {


        if(!empty($id)){

            $dados = array(
            'categoria' => '',
            'produtos' => array()

            );

            $prod = new Produtos();
            $dados['produtos'] = $prod->listarCategoria($id);

            $cat = new Categorias();
            
            $dados['categoria'] = $cat->getNome($id);
            
            $this->loadTemplate('categoria', $dados);  

        }else{

        }
              
    }


}