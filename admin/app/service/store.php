<?php

require '../../includes/conn.php';
require '../../includes/helper.php';

if (isset($_POST['title'])) {
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

    // Duplicate Check
    $check = $conn->query("
        SELECT ID
        FROM service
        WHERE Title = '$title'
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

    // Upload Image - Store only filename in database
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array(strtolower($ext), $allowed_extensions)) {
            echo json_encode([
                'status' => 400,
                'message' => 'Invalid file type! Allowed: jpg, jpeg, png, gif, webp'
            ]);
            exit();
        }

        $image = time() . rand(1111, 9999) . '.' . $ext;

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/service/';

        // Create directory if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $upload_path . $image
        );
    }

    if (empty($image)) {
        echo json_encode([
            'status' => 400,
            'message' => 'Image is required!'
        ]);
        exit();
    }
    $Storeimage = '/uploads/service/' . $image;
    $insert = $conn->query("
        INSERT INTO service
        (
            Service_Category,
            Title,
            Rating,
            Content,
            Short_Description,
            FAQ,
            Slug,
            Meta_Title,
            Meta_Description,
            Meta_Key,
            Image
        )
        VALUES
        (
            '$service_category',
            '$title',
            '$rating',
            '$content',
            '$short_description',
            '$faq_json',
            '$slug',
            '$meta_title',
            '$meta_description',
            '$meta_key',
            '$Storeimage'
        )
    ");

    if ($insert) {
        echo json_encode([
            'status' => 200,
            'message' => 'Service added successfully!'
        ]);
    } else {
        echo json_encode([
            'status' => 400,
            'message' => mysqli_error($conn)
        ]);
    }
}
?>