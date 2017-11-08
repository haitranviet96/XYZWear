<?php 
	class Product{
		private $id;
		private $name;
		private $price;
		private $noofgoods;

		public function __construct($id, $name, $price, $noofgoods) {
	      $this->id = $id;
	      $this->name = $name;
	      $this->price = $price;
	      $this->noofgoods = $noofgoods;
	  }

	  	public static function displayAll(){
	  		$db = Db::getInstance();
	  		$req = $db->prepare('SELECT * FROM product');
	  		$req->execute();
	  		$product = $req->fetchAll();
	  		return $product;
	  	}

   	 	public static function updateNumber($id, $noofgoods){
   	 	  $noofgoods = $noofgoods - 1;
   		  $db = Db::getInstance();
	      $req = $db->prepare('UPDATE product SET noofgoods = :noofgoods WHERE id = :id');
	      return $req->execute(array('id' => $id,'noofgoods' => $noofgoods));
   	 	}

   	 	public static function find($id, $keyword){
   	 		$db = Db::getInstance();
   	 		$req = $db->prepare('SELECT :keyword FROM product WHERE id = :id');
   	 		return $req->execute(array('id' => $id,'keyword' => $keyword));
   	 	}
    }
	

 ?>