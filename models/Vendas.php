<?php

class Vendas extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function getPedido($id, $id_usuario) {
		$array = array();

		$sql = "SELECT *, (select pagamentos.nome from pagamentos where pagamentos.id = vendas.forma_pg) as tipopgto FROM vendas WHERE id = '$id' AND id_usuario = '$id_usuario'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

			$array['produtos'] = $this->getProdutosDoPedido($id);

		}

		return $array;
	}

	public function getProdutosDoPedido($id) {
		$array = array();

		$sql = "SELECT
			vendas_produtos.quantidade,
			vendas_produtos.id_produto,
			produtos.nome,
			produtos.imagem,
			produtos.preco
		FROM vendas_produtos 
		LEFT JOIN produtos ON vendas_produtos.id_produto = produtos.id
		WHERE vendas_produtos.id_venda = '$id'";
		
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		

		return $array;
	}

	public function getPedidosDoUsuario($id_usuario) {
		$array = array();

		if(!empty($id_usuario)) {

			$sql = "SELECT *, (select pagamentos.nome from pagamentos where pagamentos.id = vendas.forma_pg ) as tipopgto FROM vendas WHERE id_usuario = '$id_usuario'";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
			}

		}

		return $array;
	}

	public function setVenda($uid, $endereco, $valor, $pg, $prods){


		/*
			Detalhes sobre status: 
				$status = 1 -> Aguardando Pgto.
				$status = 2 -> Aprovado
				$status = 3 -> Cancelado
		*/

		$status = '1';
		$link = '';

		$sql = "INSERT INTO vendas SET id_usuario = '$uid' , endereco ='$endereco' , valor ='$valor' , forma_pg = '$pg' , status_pg = '$status' , pg_link = '$link' ";
		$this->db->query($sql);
		$id_venda = $this->db->lastInsertId();

		if($pg == '1'){
			$status = '2';
			$link = BASE.'carrinho/obrigado';
			$this->db->query("UPDATE vendas SET status_pg ='$status' WHERE id = '".$id_venda."' ");
		}elseif($pg == '2'){
			// PagSeguro
			require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
			
			$paymentRequest = new PagSeguroPaymentRequest();
			foreach($prods as $prod) {
				$paymentRequest->addItem($prod['id'], $prod['nome'], 1, $prod['preco']);
			}
			$paymentRequest->setCurrency("BRL");
			$paymentRequest->setReference($id_venda);
			$paymentRequest->setRedirectURL("http://www.felicianoi9.com.br/loja/carrinho/obrigado");
			$paymentRequest->addParameter("notificationURL", "http://www.felicianoi9.com.br/loja/carrinho/notificacao");

			try {

				$cred = PagSeguroConfig::getAccountCredentials();
				$link = $paymentRequest->register($cred);

			} catch(PagSeguroServiceException $e) {
				echo $e->getMessage();
			}


		}

		

		foreach ($prods as $prod) {
			//var_dump($p[$prod]);exit;
			$sql = "INSERT INTO vendas_produtos SET id_venda = '$id_venda', id_produto = '".($prod['id'])."' , quantidade = '1' ";

			$this->db->query($sql);
		}

		//$_SESSION['carrinho']= array();  ou unset($_SESSION['carrinho']);

		unset($_SESSION['carrinho']);

		return $link;

		

	}

	public function verificarVendas(){
		require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';

		$code = '';
		$type = '';

		if(isset($_POST['notificationCode']) && isset($_POST['notificationType'])){
			$code = trim($_POST['notificationCode']);
			$type = trim($_POST['notificationType']);

			$notificationType= new NotificationType($type);
			$strType = $notificationType->getTypeFromValue();

			$credentials = PagSeguroConfig::getAccountCredentials();

			try {

				$transaction = PagSeguroNotificationService::checkTransaction($credentials,$code);
				$ref = $transaction->getReference();
				$status = $transaction->getStatus()->getValue();

				$novoStatus = 0;
				switch($status) {
					case '1': // Aguardando Pgto.
					case '2': // Em análise
						$novoStatus = '1';
						break;
					case '3': // Paga
					case '4': // Disponível
						$novoStatus = '2';
					case '6': // Devolvida
					case '7': // Cancelada
						$novoStatus = '3';
						break;
				}

				$this->db->query("UPDATE vendas SET status_pg = '$novoStatus' WHERE id = '$ref'");

			} catch(PagSeguroServiceException $e) {
				echo $e->getMessage();
			}


		}

	}
}