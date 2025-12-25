<?php
include 'includes/db_con.php';
include 'includes/header.php';

$limit = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$count_sql = "SELECT COUNT(*) AS total FROM `products`";
$count_res = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_assoc($count_res);
$total_products = (int) $count_row['total'];
$total_pages = $total_products > 0 ? ceil($total_products / $limit) : 1;
?>



<!-- All Products -->
<div class="container py-5">
  <div class="row py-3">
    <div class="col-12">
      <h2>All Products</h2>
    </div>
  </div>
  <div class="row py-3">
    <?php
    $sql = "SELECT * FROM `products` LIMIT $limit OFFSET $offset";
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
        <div class="card" style="width: 18rem">
          <img src="<?php echo $img; ?>" class="card-img-top" alt="product-img" width="auto" height="350px" />
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
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
          <?php
          for ($i = 1; $i <= $total_pages; $i++) {
            ?>
            <li class="page-item <?php if ($i == $page){ echo 'active'; }?>">
              <a class="page-link" href="?page=<?php echo $i?>"><?php echo $i?></a>
            </li>
            <?php
          }
          ?>
          <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- End of All Products -->
<?php include 'includes/footer.php' ?>