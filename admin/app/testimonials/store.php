<?php

if (isset($_POST['name'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';
    session_start();

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_ID = intval($_POST['Product_id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    
    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Fields are required']);
        exit;
    }


    if (!empty($_FILES["photo"]["name"])) {
        $filename = uploadImage($conn, "photo", "testimonial");
    } else {
        $filename = "/admin-assets/img/default-program.jpg";
    }


   
    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_ID'");
    if (!$product_query || $product_query->num_rows === 0) {
        echo json_encode(['status' => 404, 'message' => 'Selected product does not exist.']);
        exit;
    }

    $product_data = $product_query->fetch_assoc();
    $slug = baseurl($product_data['Name'] . ' ' . $name);


    $query = "INSERT INTO  testimonials (`Name`,`Product_id`,`Image`, `Title`, `Content`) 
              VALUES ('$name','$product_ID','$filename','$title','$content')";

    $insert = $conn->query($query);

    if ($insert) {
        echo json_encode(['status' => 200, 'message' => $name . ' added successfully!']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Failed to insert testimonial.']);
    }
}
?>