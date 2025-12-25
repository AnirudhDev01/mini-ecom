<?php include 'includes/db_con.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
$user_id   = $_SESSION['user_id'];
$subtotal  = $_POST['subtotal'];
$total     = $_POST['total'];
$transaction_id = 'TXN' . time();
$order_id = 'ORD'. time();
?>
<?php
if(isset($_POST['order_btn'])){
$card_holder_name = $_POST['card_holder_name'];
$card_number = $_POST['card_number'];
$card_last4 = substr($card_number,-4);
$card_exp_month = $_POST['card_exp_month'];
$card_exp_year = $_POST['card_exp_year'];
$card_cvv = $_POST['card_cvv'];
$billing_address = $_POST['billing_address'];
$card_exp_dt = $card_exp_year . '-' . $card_exp_month . '-01';


// Save the billing details
$sql = "INSERT INTO `order_payments` (order_id,user_id,card_holder_name,card_last4,card_expiry,billing_address) VALUES('$order_id',$user_id,'$card_holder_name','$card_last4','$card_exp_dt','$billing_address')";
$res = mysqli_query($conn,$sql);

// Fetch cart
$cart_items = "SELECT c.product_id, c.quantity, p.price
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = $user_id";
$cart_res = mysqli_query($conn,$cart_items);

while($item = mysqli_fetch_assoc($cart_res)){
$product_id = $item['product_id'];
    $quantity   = $item['quantity'];
    $price      = $item['price'];

    // Insert into order items table
    $order_sql = "INSERT INTO `ordered_items` (order_id,user_id,product_id,quantity,price,status) VALUES('$order_id',$user_id,$product_id,$quantity,$price,'paid')";
    $order_res=mysqli_query($conn,$order_sql);



}

    // Clear the cart
      $clear_cart = "DELETE FROM cart WHERE user_id = $user_id";
      $clear_cart_res = mysqli_query($conn,$clear_cart);

    //   redirect to success.php
    header("Location: success.php?order_id=".$order_id);
    exit;

}
?>
<!-- Bootstrap Checkout Layout -->
<div class="container py-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <h2 class="mb-4">Checkout</h2>
      <span>Amount to be paid: <h5>$<?php echo $total?></h5></span>
      <form method="post" action="checkout.php">
        <!-- Card Details -->
        <div class="card mb-4">
          <div class="card-header">
            Payment Details
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label for="card_holder_name" class="form-label">Name on Card</label>
              <input type="text" name="card_holder_name" id="card_holder_name"
                     class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="card_number" class="form-label">Card Number</label>
              <input type="text" name="card_number" id="card_number"
                     class="form-control" maxlength="19"
                     placeholder="XXXX XXXX XXXX XXXX" required>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Expiry Month</label>
                <select name="card_exp_month" class="form-select" required>
                  <option value="">MM</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Expiry Year</label>
                <select name="card_exp_year" class="form-select" required>
                  <option value="">YYYY</option>
                  <?php
                  $currentYear = date('Y');
                  for ($y = $currentYear; $y <= $currentYear + 10; $y++) {
                      echo "<option value=\"$y\">$y</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="card_cvv" class="form-label">CVV</label>
                <input type="password" name="card_cvv" id="card_cvv"
                       class="form-control" maxlength="4" required>
                <div class="form-text">
                  We never store your CVV.
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Billing Address -->
        <div class="card mb-4">
          <div class="card-header">
            Billing Address
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="billing_address" class="form-label">Address</label>
              <textarea name="billing_address" id="billing_address"
                        class="form-control" rows="3" required></textarea>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="cart.php" class="btn btn-secondary">Back to Cart</a>
          <button type="submit" class="btn btn-primary" name="order_btn">Place Order</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php include 'includes/footer.php';?>