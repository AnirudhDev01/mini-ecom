<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaceUp</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom css -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/site-logo.jpg" class="img-fluid"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <?php if (isset($_SESSION['user_id'])) {
            ?>
            <li class="nav-item">
              <!-- <form action="profile.php" method="post">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>"/>
              <button type="submit" class="nav-link"><?php echo $_SESSION['user_name']; ?></button>
              </form> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">My Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            
          <?php
          } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="cart.php">My Cart</a>
            </li> -->
          <?php } ?>
        </ul>
        <!-- <form class="d-flex" role="search" action="code.php">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search Products"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit" name="search_btn">
              Search
            </button>
          </form> -->
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->