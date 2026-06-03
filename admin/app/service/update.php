<?php

require '../../includes/conn.php';
require '../../includes/helper.php';

if (isset($_POST['id']) && isset($_POST['title'])) {
    $id = (int) $_POST['id'];

    $service_category = mysqli_real_escape_string($conn, $_POST['service_category']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $slug = mysqli_real_escape_string($conn, generateSeoURL($_POST['slug']));
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_key = mysqli_real_escape_string($conn, $_POST['meta_key']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);

    if (empty($service_category) || empty($title)) {
        echo json_encode([
            'status' => 400,
            'message' => 'Category and Title are required!'
        ]);
        exit();
    }

    // Current Service
    $service = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM service WHERE ID='$id'")
    );

    if (!$service) {
        echo json_encode([
            'status' => 400,
            'message' => 'Service not found!'
        ]);
        exit();
    }

    // Duplicate Check
    $check = $conn->query("
        SELECT ID
        FROM service
        WHERE Title = '$title'
        AND ID != '$id'
    ");

    if ($check && $check->num_rows > 0) {
        echo json_encode([
            'status' => 400,
            'message' => 'Service already exists!'
        ]);
        exit();
    }

    // FAQ JSON
    $faq = [];

    if (isset($_POST['faq_question'])) {
        foreach ($_POST['faq_question'] as $key => $question) {
            if (trim($question) != '') {
                $faq[] = [
                    'question' => $question,
                    'answer' => $_POST['faq_answer'][$key]
                ];
            }
        }
    }

    $faq_json = json_encode($faq);

    // Existing Image (only filename)
    $image = $service['Image'];

    // New Image Upload
    if (
        isset($_FILES['image']) &&
        $_FILES['image']['name'] != ''
    ) {
        $ext = pathinfo(
            $_FILES['image']['name'],
            PATHINFO_EXTENSION
        );

        // Validate file extension
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array(strtolower($ext), $allowed_extensions)) {
            echo json_encode([
                'status' => 400,
                'message' => 'Invalid file type! Allowed: jpg, jpeg, png, gif, webp'
            ]);
            exit();
        }

        $newImage = time() . rand(1111, 9999) . '.' . $ext;

        // Define upload path
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/service/';

        // Create directory if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        // Upload new image (store only filename)
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $upload_path . $newImage
        );

        // Delete Old Image (only filename reference)
        if (
            !empty($service['Image']) &&
            file_exists($upload_path . $service['Image'])
        ) {
            unlink($upload_path . $service['Image']);
        }

        $image = '/uploads/service/' . $newImage;
    }

    $update = $conn->query("
        UPDATE service SET

            Service_Category = '$service_category',
            Title = '$title',
            Rating = '$rating',
            Content = '$content',
            Short_Description = '$short_description',
            FAQ = '$faq_json',
            Slug = '$slug',
            Meta_Title = '$meta_title',
            Meta_Description = '$meta_description',
            Meta_Key = '$meta_key',
            Image = '$image'

        WHERE ID = '$id'
    ");

    if ($update) {
        echo json_encode([
            'status' => 200,
            'message' => 'Service updated successfully!'
        ]);
    } else {
        echo json_encode([
            'status' => 400,
            'message' => mysqli_error($conn)
        ]);
    }
}
?>