<?php
include 'includes/db_con.php';

if (isset($_GET['product_id']) && isset($_GET['user_id'])) {

    $product_id = (int) $_GET['product_id'];
    $user_id = (int) $_GET['user_id'];

    $check_sql = "SELECT quantity FROM cart 
                  WHERE user_id = $user_id AND product_id = $product_id";
    $check_res = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_res) > 0) {
       
        $update_sql = "UPDATE cart 
                       SET quantity = quantity + 1 
                       WHERE user_id = $user_id AND product_id = $product_id";
        mysqli_query($conn, $update_sql);
    } else {
       
        $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) 
                       VALUES ($user_id, $product_id, 1)";
        mysqli_query($conn, $insert_sql);
    }

    echo "<script>
            alert('Product added to cart');
            window.location = document.referrer;
          </script>";
}