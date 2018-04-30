<?php
class loginController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array(
        	'aviso' => ''
        );

        if(isset($_POST['usuario']) && !empty($_POST['usuario'])) {

        	$u = addslashes($_POST['usuario']);
        	$s = md5($_POST['senha']);

            $a = new Admins();

            if($a->logar($u, $s)>0){

                $_SESSION['admlogin'] = $a->logar($u, $s);

                header("Location: ".BASE);

            } else {
        		$dados['aviso'] = 'Usuário e/ou senha errados!';
        	}

        }

        $this->loadView('login', $dados);
    }

    public function sair() {
    	unset($_SESSION['admlogin']);
    	header("Location: ".BASE."login");
    }

}