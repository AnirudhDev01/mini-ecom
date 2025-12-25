<?php include 'includes/db_con.php';
include 'includes/header.php';

$sql = "SELECT * FROM `products`";
$res = mysqli_query($conn, $sql);
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sno = 1;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $img = $row['imageUrl'];
                            ?>

                            <tr>
                                <th scope="row"><?php echo $sno++; ?></th>
                                <td><img src="../<?php echo $img; ?>" alt="prod_img" class="img-fluid" width="100px;"></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $description; ?></td>
                                <td>
                                    <form action="edit_product.php" method="post" class="mb-3">
                                <button type="submit" class="btn btn-warning">Edit</button>
                                <input type="hidden" name="edit_id" value="<?php echo $id;?>">
                                </form>
                                <a href="delete_product.php?delete_id=<?php echo $id?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>



                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>