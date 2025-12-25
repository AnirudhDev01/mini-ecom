<?php
include 'includes/db_con.php';
if(isset($_GET['delete_id']) && isset($_GET['user_id'])){
$delete_id = $_GET['delete_id'];
$user_id = $_GET['user_id'];
$sql = "DELETE FROM `cart` WHERE product_id=$delete_id AND user_id=$user_id";
$res = mysqli_query($conn,$sql);
if($res){
    header('location: cart.php');
    exit;
}else{
    header('location: cart.php');
    exit;
}

}
