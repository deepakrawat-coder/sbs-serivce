<?php
if (isset($_POST['name']) &&  isset($_POST['id'])) {
  require '../../includes/conn.php';
  require '../../includes/helper.php';

  session_start();

  $id = intval($_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $slug = baseurl($name); 

  $services =mysqli_real_escape_string($conn, $_POST['services']);
  $content =mysqli_real_escape_string($conn, $_POST['content']);
//    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
//     $meta_key = mysqli_real_escape_string($conn, $_POST['meta_key']);
//     $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);

  $updated_file = mysqli_real_escape_string($conn, $_POST['updated_file']);


if ($_FILES["photo"]["name"]) {
    $filename = uploadImage($conn, "photo", "product");
  } else {
    $filename = $updated_file;
  }


  $check = $conn->query("SELECT ID FROM product WHERE (Name like '$name') AND ID <> $id");
  if ($check->num_rows > 0) {
    echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
    exit();
  }
   $add = $conn->query("UPDATE `product` SET `Name` = '$name', `Slug` = '$slug', `Image`= '$filename',`Services` = '$services', `Content` = '$content' WHERE `ID` = '$id'");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => $name . ' updated successlly!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
