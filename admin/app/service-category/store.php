<?php

if (isset($_POST['name'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';

    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    $check = $conn->query("SELECT ID FROM service_category WHERE ( Name like '$name')");

    if (($check !== false && $check->num_rows > 0)) {
        echo json_encode(['status' => 400, 'message' => $name . 'already exists!']);
        exit();
    }

    $add = $conn->query("INSERT INTO `service_category`(`Product_ID`, `Name`) VALUES ('$product_id', '$name')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $name . 'added successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
