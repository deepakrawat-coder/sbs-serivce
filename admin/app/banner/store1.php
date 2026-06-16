<?php

if (isset($_POST['name'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_ID = intval($_POST['Product_id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);


    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Fields are required']);
        exit;
    }

    // if (!empty($_FILES['photo']['name'])) {
    //     $filename = uploadImage($conn, 'photo', 'banner');
    // } else {
    //     $filename = '/admin-assets/img/default-program.jpg';
    // }

    $imageNames = [];

    if (!empty($_FILES['photo']['name'][0])) {

        // admin-assets/img/banner ka absolute path
        $uploadDir = dirname(__DIR__, 3) . '/admin-assets/img/banner/';

        // Folder create if not exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['photo']['name'] as $key => $fileName) {

            $tmpName = $_FILES['photo']['tmp_name'][$key];

            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $newName = time() . '_' . rand(1000, 9999) . '.' . $extension;

            if (move_uploaded_file($tmpName, $uploadDir . $newName)) {

                $imageNames[] = $newName;

            } else {

                echo json_encode([
                    'status' => 500,
                    'message' => 'Image upload failed',
                    'path' => $uploadDir . $newName
                ]);
                exit;
            }
        }

        $filename = implode(',', $imageNames);

    } else {

        $filename = '/admin-assets/img/default-program.jpg';
    }

    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_ID'");
    if (!$product_query || $product_query->num_rows === 0) {
        echo json_encode(['status' => 404, 'message' => 'Selected product does not exist.']);
        exit;
    }

    $product_data = $product_query->fetch_assoc();
    $slug = baseurl($product_data['Name'] . ' ' . $name);

    $query = "INSERT INTO banner (`Name`, `Image`,`Product_id`, `Slug`, `Title`, `Content`) 
              VALUES ('$name', '$filename','$product_ID', '$slug', '$title','$content')";

    $insert = $conn->query($query);

    if ($insert) {
        echo json_encode(['status' => 200, 'message' => $name . ' added successfully!']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Failed to insert course.']);
    }
}
?>