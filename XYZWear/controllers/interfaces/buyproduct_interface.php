<?php
	interface BuyProductInterface{
		public function index();
		public function checkAvailable();
		public function checkCredit();
		public function buy();
		public function orderType();
		public function order();
	}
?>