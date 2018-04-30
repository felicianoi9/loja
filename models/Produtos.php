<?php
class Produtos extends Model {

	 public function __construct() {
        parent::__construct();
    }

	public function listar($qt = 0)  {

		$sql = " SELECT * FROM produtos ORDER BY RAND() ";

		if( $qt > 0){
			$sql.=" LIMIT ".$qt;
		}

		$sql = $this->db->query($sql);

		$produtos = array();

		if($sql->rowCount()>0){
			$produtos = $sql->fetchAll();
		}

		return $produtos;
		
	}

	public function listarCategoria($cat){
		$sql = " SELECT * FROM produtos WHERE id_categoria = '$cat' ";
		$sql = $this->db->query($sql);

		$produtos = array();

		if($sql->rowCount()>0){
			$produtos = $sql->fetchAll();
		}

		return $produtos;
	}

	public function getProduto($id){
        $sql = "SELECT * FROM produtos WHERE id='$id' ";
        $sql = $this->db->query($sql);

        $produto = array();

        if ($sql->rowCount()>0) {
            $produto=$sql->fetch();
        }else{
            header("Location: ".BASE."naoencontrado");

        }

        return $produto;

    } 

    public function get_produtos_by_id($prods = array()){
    	$array = array();
    	if(is_array($prods) && count($prods)>0){
    		$sql = "SELECT * FROM produtos WHERE id IN (".implode(',', $prods).")" ;
        	$sql = $this->db->query($sql);
      
        	if($sql->rowCount()>0){
         		 $array = $sql->fetchAll();
       		 }

    	}

    	return $array;

    	

    }

}
?>