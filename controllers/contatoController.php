<?php
class contatoController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
      $dados=array('msg'=> '');

      if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $mensagem = addslashes($_POST['mensagem']);

        $html = "Nome : ".utf8_encode($nome)."<br/>E-mail: ".$email."<br/>Mensagem: ".$mensagem;

        $headers = 'From: suporte@felicianoi9.com.br'."\r\n";
        $headers .= 'Replay-To: '.$email."\r\n";
        $headers .= 'X-Mailer: PHP/'.phpversion();

        mail("suporte@felicianoi9.com.br", "Contato pelo Site em ".date('d/m/y'), $html, $headers );
      }

      $dados['msg'] = "E-mail enviado com sucesso! ";

      $dados=array();
      $this->loadTemplate('contato',$dados);
    }

}