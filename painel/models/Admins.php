<?php
class Admins extends Model {
	
	public function isLogged() {

		if(isset($_SESSION['admlogin']) && !empty($_SESSION['admlogin'])) {
			return true;
		} else {
			return false;
		}

	}

	public function logar($u, $s){

		$id =0;

		$sql = "SELECT * FROM admins WHERE usuario = '$u' AND senha = '$s'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
        	$sql = $sql->fetch();
        	$id = $sql['id'];
        }

        return $id;	

	}

}