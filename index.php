<?php
include 'includes/db_con.php';
include 'includes/header.php';
$limit = 6;

?>
<!-- Hero Section -->
<section class="py-5 hero-bg">
  <div class="container py-5">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Welcome to LaceUp</h1>
      </div>
    </div>
  </div>
</section>
<!-- End of Hero Section -->

<!-- All Products -->
<div class="container py-5">
  <div class="row py-3">
    <div class="col-12">
      <h2>All Products</h2>
    </div>
  </div>
  <div class="row py-3">
    <?php
    $sql = "SELECT * FROM `products` LIMIT $limit";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
      $id = $row['id'];
      $name = $row['name'];
      $price = $row['price'];
      $desc = $row['description'];
      $img = $row['imageUrl'];
      // echo $name;
      ?>
      <div class="col-lg-4 my-3">
        <div class="card" style="width: 22rem">
          <img src="<?php echo $img;?>" class="card-img-top" alt="product-img" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $name; ?></h5>
            <p class="card-text">$<?php echo $price; ?></p>
            <p><?php echo $desc; ?></p>
            <?php if (isset($_SESSION['user_id'])) {
              $user_id = $_SESSION['user_id'];
              echo "<a href='insert.php?product_id=$id&user_id=$user_id' class='btn btn-primary'>Add to cart</a>";
            } else {
              echo "<a href='login.php' class='btn btn-primary'>Add to cart</a>";
            }
            ?>
            <a href="product-detail.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">View</a>
          </div>
        </div>
      </div>
      <?php
    }

    ?>

  </div>
  <div class="row">
    <div class="col-12 text-center">
      <a href="products.php" class="btn btn-primary">View All Products</a>
    </div>
  </div>
</div>

<!-- End of All Products -->
<?php include 'includes/footer.php'; ?>