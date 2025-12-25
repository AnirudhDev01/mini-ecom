<?php include 'includes/db_con.php';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $q = "SELECT imageUrl FROM `products` WHERE id=$id";
    $img_res = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($img_res);
    $imagePath = "../" . $row['imageUrl'];

    // Delete image from folder
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $sql = "DELETE FROM `products` WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    header('location:view.php');
    exit;
}
?>