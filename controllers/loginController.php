<?php
class loginController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array(

            'erro'=>''


            );

        if(isset($_POST['email'])&& !empty($_POST['email']) ){

            $u = new Usuario();

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if($u->isExiste($email, $senha )){
                $_SESSION['cliente'] = $u->getId($email);

                header("Location: ".BASE."pedidos");
            }else{

                $dados['erro'] = "E-mail e/ou senha inválidos ";

                
            }



        }

        

        
        $this->loadTemplate('login', $dados);
              
        
    }

    public function sair(){
        unset($_SESSION['cliente']);
        header("Location: ".BASE."login");
    }

}