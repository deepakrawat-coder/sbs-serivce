<?php

include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

session_start();
## Fetch records
$result_record = "SELECT ID, Name, Product_id, Image, Phone, Experience, Circle_Text, Status FROM about_us ORDER BY ID DESC";

$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;

$product_name = "Unknown";
    $cat_id = intval($row['Product_id']);

    if ($cat_id > 0) {
        $catQuery = $conn->query("SELECT Name FROM product WHERE ID = $cat_id");

        if ($catQuery && $catQuery->num_rows > 0) {
            $catRow = mysqli_fetch_assoc($catQuery);
            $product_name = $catRow["Name"] ?? "Unknown";
        }
    }

$data[] = array(
    "No" => $no,
    "ID" => $row['ID'],
    "Name" => $row["Name"],
    "Product_name" => $product_name,
    "Phone"=> $row['Phone'],
    "Photo" => $row['Image'],
    "Year_Exp" =>$row['Experience'],
    "Circle_text" => $row['Circle_Text'],
    "Status" => $row["Status"],

);
  }


echo json_encode(['data' => $data]);
