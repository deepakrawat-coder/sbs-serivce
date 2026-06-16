<?php

require '../../includes/conn.php';
require '../../includes/helper.php';

if (isset($_POST['title'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $slug = mysqli_real_escape_string($conn, generateSeoURL($_POST['slug']));
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Validation
    if (empty($product_id) || empty($title) || empty($content)) {
        echo json_encode([
            'status' => 400,
            'message' => 'Product, Title and Content are required!'
        ]);
        exit();
    }

    // If slug is empty, generate from title
    if (empty($slug)) {
        $slug = generateSeoURL($title);
    }

    // Duplicate Check by Title or Slug
    $check = $conn->query("
        SELECT ID 
        FROM blogs 
        WHERE title = '$title' OR slug = '$slug'
    ");

    if ($check && $check->num_rows > 0) {
        echo json_encode([
            'status' => 400,
            'message' => 'Blog already exists! (Title or Slug must be unique)'
        ]);
        exit();
    }

    // Process FAQ JSON
    $faq_json = null;

    if (isset($_POST['faq']) && !empty($_POST['faq'])) {
        // If FAQ is sent as JSON string from form
        $faq_json = mysqli_real_escape_string($conn, $_POST['faq']);
    } elseif (isset($_POST['faq_question'])) {
        // Process FAQ from individual arrays
        $faq = [];

        foreach ($_POST['faq_question'] as $key => $question) {
            if (trim($question) != '' && isset($_POST['faq_answer'][$key])) {
                $faq[] = [
                    'question' => trim($question),
                    'answer' => trim($_POST['faq_answer'][$key])
                ];
            }
        }

        $faq_json = !empty($faq) ? json_encode($faq) : null;
    }

    // Upload Image
    $image_path = null;

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

        $image_name = time() . rand(1111, 9999) . '.' . $ext;
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/blogs/';

        // Create directory if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $image_name)) {
            $image_path = '/uploads/blogs/' . $image_name;
        } else {
            echo json_encode([
                'status' => 400,
                'message' => 'Failed to upload image!'
            ]);
            exit();
        }
    } else {
        echo json_encode([
            'status' => 400,
            'message' => 'Featured image is required!'
        ]);
        exit();
    }

    // Insert into database
    $insert = $conn->query("
        INSERT INTO blogs 
        (
            Product_ID,
            title,
            slug,
            short_description,
            content,
            image,
            faq,
            Created_At,
            Updated_At
        )
        VALUES 
        (
            '$product_id',
            '$title',
            '$slug',
            '$short_description',
            '$content',
            '$image_path',            
            " . ($faq_json ? "'$faq_json'" : 'NULL') . ',
            NOW(),
            NOW()
        )
    ');

    if ($insert) {
        echo json_encode([
            'status' => 200,
            'message' => 'Blog added successfully!'
        ]);
    } else {
        echo json_encode([
            'status' => 400,
            'message' => 'Database error: ' . mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode([
        'status' => 400,
        'message' => 'Invalid request!'
    ]);
}
?>