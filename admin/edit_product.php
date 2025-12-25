<?php include 'includes/db_con.php';
include 'includes/header.php';

if (!isset($_POST['edit_id'])) {
    header('location:view.php');
    exit;
}
$id = $_POST['edit_id'];
$sql = "SELECT * FROM `products` WHERE id=$id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
?>
<div class="container py-3">
    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="card">
                <div class="card-body">
                    <h3>Update Product Details</h3>
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="prod_id" value="<?= $row['id']; ?>">
                        <input type="hidden" name="old_image" value="<?= $row['imageUrl']; ?>">
                        <div class="mb-3">
                            <label for="edit_prod_name">Product Name</label>
                            <input type="text" class="form-control" name="edit_prod_name"
                                value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="edit_prod_name">Price</label>
                            <input type="text" class="form-control" name="edit_prod_price"
                                value="<?php echo $row['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="edit_prod_name">Description</label>
                            <textarea name="edit_prod_desc" id=""
                                class="form-control"><?php echo $row['description'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="old_img_val">Old Image</label>
                            <img src="../<?= $row['imageUrl'] ?>" alt="" class="img-fluid" width="150px">
                        </div>
                        <div class="mb-3">
                            <label for="edit_prod_img">New Image</label>
                            <input type="file" name="edit_prod_img" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="edit_prod_btn" class="btn btn-primary w-100">Update Product</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>