<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../../includes/conn.php';
    require '../../includes/helper.php';
    session_start();

    $product_ID = intval($_POST['Product_id']); // Corrected key
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : null;
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : null;

    // echo('<pre>');print_r($phone);die;
    if (empty($address) || empty($email)) {
        echo json_encode(['status' => 403, 'message' => 'All fields marked with * are mandatory!']);
        exit();
    }

    $check = $conn->query("SELECT ID FROM contact WHERE Email = '$email'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => 'contact with email ' . $email . ' already exists!']);
        exit();
    }



    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_ID'");
    if (!$product_query || $product_query->num_rows === 0) {
        echo json_encode(['status' => 404, 'message' => 'Selected product does not exist.']);
        exit;
    }

    $product_data = $product_query->fetch_assoc();
  


    $add = $conn->query("INSERT INTO `contact`(`Product_id`, `Address`, `Email`,  `Phone`)
     VALUES ('$product_ID', '$address', '$email',  '$phone')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => 'contact added successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
} else {
    echo json_encode(['status' => 405, 'message' => 'Method Not Allowed']);
}
