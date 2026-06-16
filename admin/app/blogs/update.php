<?php

require '../../includes/conn.php';
require '../../includes/helper.php';

if (isset($_POST['id']) && isset($_POST['title'])) {
    $id = (int) $_POST['id'];

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

    // Current Blog
    $blog = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM blogs WHERE ID='$id'")
    );

    if (!$blog) {
        echo json_encode([
            'status' => 400,
            'message' => 'Blog not found!'
        ]);
        exit();
    }

    // Duplicate Check (by Title or Slug)
    $check = $conn->query("
        SELECT ID
        FROM blogs
        WHERE (title = '$title' OR slug = '$slug')
        AND ID != '$id'
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

    // Existing Image
    $image = $blog['image'];

    // New Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

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
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/blogs/';

        // Create directory if not exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        // Upload new image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newImage)) {
            // Delete Old Image if exists
            if (!empty($blog['image'])) {
                // Extract filename from full path
                $old_image_path = $_SERVER['DOCUMENT_ROOT'] . $blog['image'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            $image = '/uploads/blogs/' . $newImage;
        } else {
            echo json_encode([
                'status' => 400,
                'message' => 'Failed to upload image!'
            ]);
            exit();
        }
    }

    // Update query
    $update = $conn->query("
        UPDATE blogs SET
            Product_ID = '$product_id',
            title = '$title',
            slug = '$slug',
            short_description = '$short_description',
            content = '$content',
           
            faq = " . ($faq_json ? "'$faq_json'" : 'NULL') . ",
            image = '$image',
            Updated_At = NOW()
        WHERE ID = '$id'
    ");

    if ($update) {
        echo json_encode([
            'status' => 200,
            'message' => 'Blog updated successfully!'
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
        'message' => 'Invalid request! ID and Title are required.'
    ]);
}
?>