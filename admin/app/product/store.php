<?php

if (isset($_POST['name'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = baseurl($name);
    $services = mysqli_real_escape_string($conn, $_POST['services']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    //   $meta_title =mysqli_real_escape_string($conn, $_POST['meta_title']);
    //   $meta_key =mysqli_real_escape_string($conn, $_POST['meta_key']);
    //   $meta_description =mysqli_real_escape_string($conn, $_POST['meta_description']);

    if ($_FILES['photo']['name']) {
        $filename = uploadImage($conn, 'photo', 'product');
    } else {
        $filename = '/admin-assets/img/default-program.jpg';
    }

    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    $check = $conn->query("SELECT ID FROM product WHERE ( Name like '$name')");

    if (($check !== false && $check->num_rows > 0)) {
        echo json_encode(['status' => 400, 'message' => $name . 'already exists!']);
        exit();
    }

    $add = $conn->query("INSERT INTO `product`(`Name`, `Slug`, `Image`,`Services`,`Content`) 
                                    VALUES ('$name', '$slug','$filename','$services', '$content')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $name . 'added successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
