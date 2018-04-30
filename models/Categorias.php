<?php
class Categorias extends Model {

	public function __construct() {
        parent::__construct();
    }

    public function getNome($id){

    	
    	 $sql = "SELECT titulo FROM categorias WHERE id='$id'";
        $sql = $this->db->query($sql) ;

        $nome = '';

        if($sql->rowCount()>0){
            $nome = $sql->fetch();
        } $sql = "SELECT titulo FROM categorias WHERE id='$id'";
        $sql = $this->db->query($sql) ;

        $nome = '';

        if($sql->rowCount()>0){
            $nome = $sql->fetch();
        }

		return $nome;

    	
    }
	

}
?>