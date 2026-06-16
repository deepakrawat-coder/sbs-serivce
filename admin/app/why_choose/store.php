<?php

require '../../includes/conn.php';
require '../../includes/helper.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_id = intval($_POST['Product_id']);

    if (empty($product_id)) {
        echo json_encode([
            'status' => 403,
            'message' => 'Please select a product.'
        ]);
        exit;
    }

    // Upload Image
    if (!empty($_FILES["photo"]["name"])) {
        $filename = uploadImage($conn, "photo", "why_choose");
    } else {
        $filename = "/admin-assets/img/default-program.jpg";
    }

    $titles = $_POST['title'];
    $contents = $_POST['content'];

    if (empty($titles) || empty($contents)) {
        echo json_encode([
            'status' => 403,
            'message' => 'Title and Content are required.'
        ]);
        exit;
    }

    $success = true;

    foreach ($titles as $key => $title) {

        $title = mysqli_real_escape_string($conn, trim($title));

        $content = isset($contents[$key])
            ? mysqli_real_escape_string($conn, trim($contents[$key]))
            : '';

        if ($title == '' || $content == '') {
            continue;
        }

        $query = "INSERT INTO why_choose_us( Title, Product_id, Image, Content)
                     VALUES ('$title','$product_id','$filename','$content' )";

        if (!$conn->query($query)) {
            $success = false;
        }
    }

    if ($success) {
        echo json_encode([
            'status' => 200,
            'message' => 'Why Choose data added successfully.'
        ]);
    } else {
        echo json_encode([
            'status' => 500,
            'message' => 'Failed to insert records.'
        ]);
    }
}