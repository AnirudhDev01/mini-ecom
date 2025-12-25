<?php session_start(); 
include 'includes/db_con.php';
if(isset($_POST['update_qty'])){
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $qty = $_POST['qty'];
    if($qty < 1){
        $qty = 1;
    }
    $sql = "UPDATE `cart` SET quantity=$qty WHERE product_id=$product_id AND user_id=$user_id";
    $res = mysqli_query($conn,$sql);
    if($res){
        header('location:cart.php');
        exit;
    }else{
        header('location:cart.php');
        exit;
    }
}
?>