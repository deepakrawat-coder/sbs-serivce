<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require '../../includes/conn.php';
    require '../../includes/helper.php';
    session_start();

    $id = intval($_POST['id']);
    $product_ID = intval($_POST['Product_id']);

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $check = $conn->query("
        SELECT ID
        FROM contact
        WHERE Email = '$email'
        AND ID != '$id'
    ");

    if ($check && $check->num_rows > 0) {
        echo json_encode([
            'status' => 400,
            'message' => 'Contact with email ' . $email . ' already exists!'
        ]);
        exit();
    }

    $update = $conn->query("
        UPDATE contact
        SET
            Product_id = '$product_ID',
            Address = '$address',
            Email = '$email',
            Phone = '$phone'
        WHERE ID = '$id'
    ");

    if ($update) {
        echo json_encode([
            'status' => 200,
            'message' => 'Contact updated successfully!'
        ]);
    } else {
        echo json_encode([
            'status' => 500,
            'message' => 'Failed to update contact!'
        ]);
    }

} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}