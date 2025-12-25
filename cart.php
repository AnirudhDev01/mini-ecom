<?php
include 'includes/db_con.php';
include 'includes/header.php'; 
 ?>


<!-- add to cart -->
<div class="container py-5">
  <div class="row">
    <div class="col-lg-12">


      <div class="row py-3">
        <div class="col-12">
          <h2>Your Cart</h2>
        </div>
      </div>
      <div class="row py-3">
        <div class="col-12">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 200px;">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col" style="width: 200px;">Quantity</th>
                <th scope="col" style="width: 200px;">Price</th>
                <th scope="col" style="width: 200px;">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
        $user_id = $_SESSION['user_id'];
      
        


              $sql = "SELECT 
                     c.product_id,
                     c.quantity,
                     p.id,
                     p.name,
                     p.imageUrl,
                     p.price
                     FROM cart c
                     JOIN products p ON c.product_id = p.id
                     WHERE c.user_id = $user_id";
              $res = mysqli_query($conn, $sql);
              $sno = 1;
              $sub_total = 0;
              while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $name = $row['name'];
                $img = $row['imageUrl'];
                $price = $row['price'];
                $quantity = $row['quantity'];
              
                $t = $quantity * $price;
                $sub_total =  $sub_total + ($price * $quantity);
                ?>
                <form action="update.php" method="post">
                <tr>
                  <th scope="row"> <?php echo $sno++ ?> </th>
                  <td> <img src="<?php echo $img?>" class="img-fluid" width="150px" alt="..." />
                  </td>
                  <td><strong> <?php echo $name ?> </strong></td>
                  <td>
                    <input type="number" name="qty" id="qtya" min="1" class="form-control w-50"
                      value="<?php echo $quantity ?>">
                      <input type="hidden" name="product_id" value="<?php echo $id?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                    </td>
                  <td>$<?php echo $t ?></td>

                  <td>
                    
                    <button name="update_qty" type="submit" class="btn btn-warning">Update</button>
                    <a href="delete.php?delete_id=<?php echo $id?>&user_id=<?php echo $user_id?>" class="btn btn-danger">Remove</a>
                  </td>
                </tr>
                </form>
                <?php

              }
              ?>
              <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td>Subtotal: </td>
                <td>$<?php echo $sub_total;?></td>
                <td></td>
              </tr>
              <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td>GST: </td>
                <td>8%</td>
                <td></td>
              </tr>
              <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td>Total: </td>
                <?php $gst_rate = 0.08;
                $gst_amt = $sub_total * $gst_rate;
                $total_price = $sub_total + $gst_amt; ?>
                <td>$<?php echo $total_price ?></td>
                <td></td>
              </tr>
              <tr>
  <td colspan="6" class="text-end">
    <form action="checkout.php" method="post">
      <input type="hidden" name="subtotal" value="<?php echo $sub_total; ?>">
      <input type="hidden" name="total" value="<?php echo $total_price; ?>">
      <button type="submit" class="btn btn-success" <?php if ($sub_total == 0) echo 'disabled'; ?>>Proceed to Checkout</button>
    </form>
  </td>
</tr>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- End of add to cart -->

<?php include 'includes/footer.php' ?>