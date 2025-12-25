<?php include 'includes/header.php';
$order_id = $_GET['order_id'];
?>
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
<h2>Order Successful!</h2>
<p>Your Order ID: <strong><?php echo $order_id; ?></strong></p>
<a href="index.php" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php';?>