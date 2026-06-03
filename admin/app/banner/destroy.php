<?php
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {
  require '../../includes/conn.php';


  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $check = $conn->query("SELECT ID FROM banner WHERE ID = $id");
  if ($check->num_rows > 0) {
    $delete = $conn->query("DELETE FROM banner WHERE ID = $id");
    if ($delete) {
      echo json_encode(['status' => 200, 'message' => 'banner deleted successfully!']);
    } else {
      echo json_encode(['status' => 302, 'message' => 'Something went wrong!']);
    }
  } else {
    echo json_encode(['status' => 302, 'message' => 'banner not exists!']);
  }
}
