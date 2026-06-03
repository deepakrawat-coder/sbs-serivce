<?php

if (isset($_POST['name'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';

    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    mysqli_query($conn, "
    UPDATE service_category
    SET Product_ID = '$product_id',
        Name = '$name'
    WHERE ID = '$id'
");

    echo json_encode([
        'status' => 200,
        'message' => 'Service Category Updated Successfully'
    ]);
}
