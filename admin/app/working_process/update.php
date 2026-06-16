<?php

if (isset($_POST['name'])) {

    require '../../includes/conn.php';
    require '../../includes/helper.php';
    session_start();

    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $product_ID = intval($_POST['Product_id']);
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    // Arrays
    $record_ids = $_POST['record_id'] ?? [];
    $titles = $_POST['title'] ?? [];
    $contents = $_POST['content'] ?? [];

    if (empty($name) || empty($product_ID)) {
        echo json_encode([
            'status' => 403,
            'message' => 'Required fields are missing.'
        ]);
        exit;
    }

    // Product check
    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_ID'");

    if (!$product_query || $product_query->num_rows == 0) {
        echo json_encode([
            'status' => 404,
            'message' => 'Selected product does not exist.'
        ]);
        exit;
    }

    $product_data = $product_query->fetch_assoc();

    // Optional slug
    $slug = baseurl($product_data['Name'] . ' ' . $name);

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

        if (empty($title) || empty($content)) {
            continue;
        }

        if (!empty($record_ids[$key])) {

            $record_id = intval($record_ids[$key]);

            $query = "UPDATE working_process SET Name = '$name', Product_id = '$product_ID', Description = '$description', Title = '$title', Content = '$content' WHERE ID = '$record_id'";

            $update = $conn->query($query);



        }
    }

    if ($update) {
        echo json_encode([
            'status' => 200,
            'message' => $name . 'working process updated successfully.'
        ]);
    } else {
        echo json_encode([
            'status' => 500,
            'message' => 'Failed to update data.'
        ]);
    }
}
?>