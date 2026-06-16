<?php

require '../../includes/conn.php';
require '../../includes/helper.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_id = intval($_POST['Product_id']);
    $updated_file = $_POST['updated_file'] ?? '';

    // Upload Image
    if (!empty($_FILES['photo']['name'])) {
        $photo = uploadImage($conn, 'photo', 'why_choose');
    } else {
        $photo = $updated_file;
    }

    $record_ids = $_POST['record_id'] ?? [];
    $titles     = $_POST['title'] ?? [];
    $contents   = $_POST['content'] ?? [];

    $success = true;

    foreach ($titles as $key => $title) {

        $title = mysqli_real_escape_string(
            $conn,
            trim($title)
        );

        $content = isset($contents[$key])
            ? mysqli_real_escape_string(
                $conn,
                trim($contents[$key])
            )
            : '';

        if (empty($title) || empty($content)) {
            continue;
        }

        // Existing Record Update
        if (!empty($record_ids[$key])) {

            $record_id = intval($record_ids[$key]);

            $query = "
                UPDATE why_choose_us
                SET
                    Product_id = '$product_id',
                    Image = '$photo',
                    Title = '$title',
                    Content = '$content'
                WHERE ID = '$record_id'
            ";

        }
        // Add More se naya record
        else {

            $query = "
                INSERT INTO why_choose_us
                (
                    Product_id,
                    Image,
                    Title,
                    Content
                )
                VALUES
                (
                    '$product_id',
                    '$photo',
                    '$title',
                    '$content'
                )
            ";

        }

        if (!$conn->query($query)) {
            $success = false;
        }
    }

    if ($success) {

        echo json_encode([
            'status' => 200,
            'message' => 'Why Choose updated successfully.'
        ]);

    } else {

        echo json_encode([
            'status' => 500,
            'message' => 'Database error.'
        ]);
    }

} else {

    echo json_encode([
        'status' => 400,
        'message' => 'Invalid Request.'
    ]);
}