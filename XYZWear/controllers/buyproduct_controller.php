<?php 

	require_once('controllers/interfaces/buyproduct_interface.php');

	class BuyProductController implements BuyProductInterface{

		private $products;

		function __construct(){
			$this->products = Product::displayAll();
		}

		public function index(){
			if(isset($_POST['id'])){
				$_SESSION['id'] = $_POST['id'];
			}
			require_once('views/buyproduct/index.php');
		}

		public function checkAvailable(){
			if(!isset($_POST['id']) || $_POST['id'] == "" || !isset($_POST['noofgoods']) || $_POST['noofgoods'] == "" && isset($_POST['buy'])){
				$_SESSION['errMsg']="W4nn4 7ry 7o h4ck m3???\n";
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
			if($_POST['noofgoods'] == 0){
				$_SESSION['errMsg']="Out of stock\n";
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
		}

		public function checkCredit(){
			if(!isset($_POST['creditcardno']) || $_POST['creditcardno'] == ""){
				$_SESSION['errMsg']="W4nn4 7ry 7o h4ck m3???\n";
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
			if(!ctype_digit($_POST['creditcardno'])){
				$_SESSION['errMsg']="Invalid credit card number";
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
		}

		public function buy(){
			$this->checkAvailable();
			$_SESSION['id'] = $_POST['id'];
			$_SESSION['displayChoice'] = 1;
			die(require_once('views/buyproduct/index.php'));
		}

		public function orderType(){
			if(isset($_POST['bycredit'])){
				$_SESSION['credit'] = 1;
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
			if(isset($_POST['byship'])){
				$_SESSION['ship'] = 1;
				$_SESSION['id'] = $_POST['id'];
				die(require_once('views/buyproduct/index.php'));
			}
		}	

		public function order(){
			if(isset($_POST['order'])){
				$_SESSION['id'] = $_POST['id'];
				if(isset($_POST['creditcardno'])){
					$this->checkCredit();
					$_SESSION['errMsg'] = "Buy Successfully\nThe goods will be shipped to ".htmlspecialchars($_POST['address'])." after at most 48 hours";
				}
				if(isset($_POST['time'])){
					$_SESSION['errMsg'] = "Buy Successfully\nThe goods will be shipped to ".htmlspecialchars($_POST['address'])." at ".htmlspecialchars($_POST['time']) . ". The total price is " . htmlspecialchars($_POST['price']);
				}
				Product::updateNumber($_POST['id'],$_POST['noofgoods']);
				header('Location: http://localhost/XYZWear/index.php?controller=buyproduct&action=index');
			}
		}
	}