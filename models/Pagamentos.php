<?php

class Pagamentos extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function getPagamentos(){

		$array = array();

		$sql ="SELECT * FROM pagamentos ";
		$sql = $this->db->query($sql);

		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
}