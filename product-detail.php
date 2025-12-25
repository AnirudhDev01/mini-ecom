<?php include 'includes/db_con.php';
include 'includes/header.php';
?>
<div class="container">
    <div class="row">
<?php
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM `products` WHERE id=$product_id";
    $res = mysqli_query($conn,$sql);
    $details = mysqli_fetch_assoc($res);
     $name = $details['name'];
  $price = $details['price'];
  $desc = $details['description'];
  $img = $details['imageUrl'];
?>


        <div class="col-lg-6 my-3">
          
            <img
              src="<?php echo $img;?>"
              class="img-fluid w-50"
              alt="product-img"
            />
          
          
        </div>
    <div class="col-lg-6 my-5">
              <h2><?php echo $name;?></h2>
              <h3>$<?php echo $price;?></h3>
              <p><?php echo $desc; ?></p>           
                  <?php if(isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                echo "<a href='insert.php?product_id=$product_id&user_id=$user_id' class='btn btn-primary'>Add to cart</a>";
              }else{
                echo "<a href='login.php' class='btn btn-primary'>Add to cart</a>";
              }
              ?>
              <!-- <a href="product-detail.php?id=<?php echo $row['id'];?>" class="btn btn-warning">View</a> -->
            </div>
<?php
}
?>
  </div>
</div>
<?php include 'includes/footer.php'?>
