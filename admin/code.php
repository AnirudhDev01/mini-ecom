<?php include 'includes/db_con.php';
if (isset($_POST['admin_login_btn'])) {
    $email = trim($_POST['admin_email']);
    $password = trim($_POST['admin_password']);

    // Check for empty values
    if ($email === '' || $password === '') {
        echo "<script>alert('All fields are required to login!')</script>";
        exit;
    }

    // checking if email exists
    $sql = "SELECT * FROM `admin` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            // Login successful

            // session_regenerate_id(true);

            $_SESSION['email'] = $user['email'];
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $user['id'];
            header('location: view.php');
            exit;
        } else {
            echo "<script>alert('Email or password incorrect')</script>";
        }
    } else {
        echo "<script>alert('Email or password incorrect')</script>";
    }
}
if (isset($_POST['add_prod_btn'])) {
    $name = $_POST['prod_name'];
    $description = $_POST['prod_description'];
    $price = $_POST['prod_price'];

    $img_name = $_FILES['prod_img']['name'];
    $img_tmp = $_FILES['prod_img']['tmp_name'];
    $path = "../images/";

    $new_img_name = "PROD" . "_" . time() . "_" . $img_name;
    $db_path = "images/" . $new_img_name;

    if (move_uploaded_file($img_tmp, $path . $new_img_name)) {
        $sql = "INSERT INTO `products` (name,price,description,imageUrl) VALUES('$name','$price','$description','$db_path')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script>alert('Product added successfully')</script>";
            header('location: dashboard.php');
            exit;
        } else {
            echo "<script>alert('Failed to add product')</script>";
            exit;
        }
    } else {
        echo "<script>alert('Image upload failed!')</script>";
    }


}
if (isset($_POST['edit_prod_btn'])) {
    $id = $_POST['prod_id'];
    $name = $_POST['edit_prod_name'];
    $price = $_POST['edit_prod_price'];
    $description = $_POST['edit_prod_desc'];
    $old_image = $_POST['old_image'];

    if (!empty($_FILES['edit_prod_img']['name'])) {
        $img_name = $_FILES['edit_prod_img']['name'];
        $img_tmp = $_FILES['edit_prod_img']['tmp_name'];
        $path = "../images/";

        $new_img_name = "PROD" . "_" . time() . "_" . $img_name;
        $db_path = "images/" . $new_img_name;
        if (move_uploaded_file($img_tmp, $path . $new_img_name)) {
            $oldPath = "../" . $old_image;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $sql = "UPDATE `products` SET name='$name', price='$price',description='$description',imageUrl='$db_path' WHERE id=$id";
        }

    } else {
        $sql = "UPDATE `products` SET name='$name', price='$price',description='$description' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    header('location:view.php');
    exit;
}
?>