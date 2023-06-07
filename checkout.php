<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'ORDER PLACED SCROLL DOWN TO PAY 🤗';
   }else{
      $message[] = 'ITS A LITTLE LONELY IN HERE';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CHECKOUT</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="checkout-orders">

   <form action="checkout.php" method="POST">

   <h3>YOUR ORDERS</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= 'R'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">ITS A LITTLE LONELY IN HERE!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">GRAND TOTAL <span>R<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>PLACE YOUR ORDERS</h3>

      <div class="flex">
         <div class="inputBox">
            <span>NAME</span>
            <input type="text" name="name" placeholder="NAME" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>NUMBER</span>
            <input type="number" name="number" placeholder="NUMBER" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>EMAIL</span>
            <input type="email" name="email" placeholder="EMAIL" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>PAYMENT METHOD</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">CASH ON DELIVERY</option>
               <option value="credit card">CREDIT CARD</option>
               <option value="paytm">PAY TO MASTERCARD</option>
               <option value="paypal">PAYPAL</option>
            </select>
         </div>
         <div class="inputBox">
            <span>ADDRESS LINE ONE</span>
            <input type="text" name="flat" placeholder="E.G. UNIT 32" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>ADDRESS LINE TWO</span>
            <input type="text" name="street" placeholder="E.G. 17 FERERO STREET" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>CITY</span>
            <input type="text" name="city" placeholder="E.G. CAPE TOWN" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>PROVINCE</span>
            <input type="text" name="state" placeholder="E.G. WESTERN CAPE" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>COUNTRY</span>
            <input type="text" name="country" placeholder="E.G. SOUTH AFRICA" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>POSTAL CODE</span>
            <input type="number" min="0" name="pin_code" placeholder="E.G. 209161" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
         </div>
      </div>    
  <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="ORDER">
  <a href="payments/payments.php" class="btn" id="pay-button">ENTER PAYMENT DETAILS</a>
   </form>
</section>
<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
</body>
</html>

<?php
$showPayButton = false;

if (isset($_POST['order'])) {
    // Form is submitted
    $showPayButton = true;
}
?>

<script>
  window.onload = function() {
    <?php if ($showPayButton) { ?>
      document.getElementById("pay-button").style.display = "block";
    <?php } ?>
  }
</script>
