<a href="index.php?controller=pages&action=home">Home</a>
<h1>BUY GOODS</h1>
<?php 
	$products = $this->products;
	foreach($products as $product){
		 echo "<b>ID:</b> ".$product[0]."<b> Name: </b>".$product[1]."<b>Price:</b> ".$product[2]."<b>NoofGoods:</b> ".$product[3]."<br>";
		 echo '<form action="index.php?controller=buyproduct&action=buy" method="post">
                        <input type="submit" name="buy" value="Buy">
                        <input type="hidden" name="id" value='.$product[0].'>
                        <input type="hidden" name="noofgoods" value='.$product[3].'>
                        </form>';

         if(!empty($_SESSION['errMsg']) && $_SESSION['id'] == $product[0]){
         	echo "<h3 style='color:red;'>".$_SESSION['errMsg']."</h3>";
         	unset($_SESSION['errMsg']);
         	unset($_SESSION['id']);
         }

         if(isset($_SESSION['displayChoice']) && $_SESSION['id'] == $product[0]){
         	echo '<form action="index.php?controller=buyproduct&action=orderType" method="post">
                        <input type="submit" name="bycredit" value="Pay with Credit Card">
                        <input type="submit" name="byship" value="Pay after Shipping">
                        <input type="hidden" name="id" value='.$product[0].'>
                        </form>';
            unset($_SESSION['displayChoice']);
            unset($_SESSION['id']);
         }

         if(isset($_SESSION['credit']) && $_SESSION['id'] == $product[0]){
         	echo '<form action="index.php?controller=buyproduct&action=order" method="post">
                        <input type="text" name="creditcardno" placeholder="Credit Card Number">
                        <input type="text" name="phone" placeholder="Mobile Phone Number">
                        <input type="text" name="address" placeholder="Address">
                        <input type="submit" name="order" value="Order">
                        <input type="hidden" name="id" value='.$product[0].'>
                        <input type="hidden" name="noofgoods" value='.$product[3].'>
                        </form>';
            unset($_SESSION['credit']);
            unset($_SESSION['id']);
         }

         if(isset($_SESSION['ship']) && $_SESSION['id'] == $product[0]){
         	echo '<form action="index.php?controller=buyproduct&action=order" method="post">
                        <input type="text" name="phone" placeholder="Mobile Phone Number">
                        <input type="text" name="address" placeholder="Address">
                        <input type="text" name="time" placeholder="Expected Time">
                        <input type="submit" name="order" value="Order">
                        <input type="hidden" name="id" value='.$product[0].'>
                        <input type="hidden" name="price" value='.$product[2].'>
                        <input type="hidden" name="noofgoods" value='.$product[3].'>
                        </form>';
            unset($_SESSION['ship']);
            unset($_SESSION['id']);
         }

	}
 ?>