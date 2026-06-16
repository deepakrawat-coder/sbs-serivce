<?php
if (isset($_POST['name']) && isset($_POST['id'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';
    session_start();

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_ID = intval($_POST['Product_id']); // Corrected key
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $exp = mysqli_real_escape_string($conn, $_POST['year_exp']);
    $circle_text = mysqli_real_escape_string($conn, $_POST['circle_text']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $updated_file = mysqli_real_escape_string($conn, $_POST['updated_file']);
    // $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    // $meta_key = mysqli_real_escape_string($conn, $_POST['meta_key']);
    // $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);

    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => ' name required fields must be filled!']);
        exit;
    }

    if (!empty($_FILES["photo"]["name"])) {
        $photo = uploadImage($conn, "photo", "about");
    } else {
        $photo = $updated_file;
    }

    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_ID'");
    if (!$product_query || $product_query->num_rows === 0) {
        echo json_encode(['status' => 404, 'message' => 'Selected product does not exist.']);
        exit;
    }

    $product_data = $product_query->fetch_assoc();
    $slug = baseurl($product_data['Name'] . ' ' . $name);

    $update = $conn->query("UPDATE `about_us` SET `Name` = '$name', `Product_id` = '$product_ID', `Image` = '$photo', `Phone` = '$phone', `Experience` = '$exp', `Circle_Text` = '$circle_text', `Content` = '$content'  WHERE `ID` = $id");

    if ($update) {
        echo json_encode(['status' => 200, 'message' => $name . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Something went wrong while updating.']);
    }
} else {
    echo json_encode(['status' => 400, 'message' => 'Invalid request.']);
}
