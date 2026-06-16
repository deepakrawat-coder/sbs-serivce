<?php
if (isset($_POST['name']) && isset($_POST['id'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_id = mysqli_real_escape_string($conn, $_POST['Product_id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $updated_file = $_POST['updated_file'] ?? '';


    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => ' name required fields must be filled!']);
        exit;
    }

    $oldImages = !empty($_POST['updated_file'])
        ? explode(',', $_POST['updated_file'])
        : [];

    /* Delete Selected Images */

    if (!empty($_POST['delete_images'])) {

        foreach ($_POST['delete_images'] as $deleteImage) {

            $deleteImage = trim($deleteImage);

            $filePath = dirname(__DIR__, 3) . '/admin-assets/img/banner/' . $deleteImage;

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $oldImages = array_diff($oldImages, [$deleteImage]);
        }
    }

    /* Upload New Images */

    

    $newImages = [];

    if (!empty($_FILES['photo']['name'][0])) {

        $uploadDir = dirname(__DIR__, 3) . '/admin-assets/img/banner/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['photo']['name'] as $key => $fileName) {

            if (empty($fileName))
                continue;

            $tmpName = $_FILES['photo']['tmp_name'][$key];

            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $newName = time() . '_' . rand(1000, 9999) . '.' . $extension;

            if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
                $newImages[] = $newName;
            }
        }
    }

    /* Merge Old + New Images*/

    $finalImages = array_merge($oldImages, $newImages);

    $photo = implode(',', $finalImages);

    $product_query = $conn->query("SELECT Name FROM product WHERE ID = '$product_id'");
    if (!$product_query || $product_query->num_rows === 0) {
        echo json_encode(['status' => 404, 'message' => 'Selected product does not exist.']);
        exit;
    }

    $product_data = $product_query->fetch_assoc();

    $update = $conn->query("UPDATE `banner` SET `Name` = '$name', `Image` = '$photo', `Product_id` = '$product_id', `Title` = '$title', `Content` = '$content'  WHERE `ID` = $id");

    if ($update) {
        echo json_encode(['status' => 200, 'message' => $name . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Something went wrong while updating.']);
    }
} else {
    echo json_encode(['status' => 400, 'message' => 'Invalid request.']);
}
