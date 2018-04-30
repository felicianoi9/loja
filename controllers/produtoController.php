<?php
class produtoController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function ver($id='') {

        if(!empty($id)){
            $dados = array(
          'produto'=>array()
          );
          $produto = new Produtos();

          $dados['produto']=$produto->getProduto($id);


            $this->loadTemplate('produto', $dados);

        }else{
            header("Location: ".BASE."naoencontrado");

        }
        

        
        
    }

}