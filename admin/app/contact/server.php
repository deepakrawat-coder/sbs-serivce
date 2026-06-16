<?php

include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

session_start();
## Fetch records
$result_record = "SELECT ID, Product_id, Address, Email, Phone, Status FROM contact ORDER BY ID DESC";

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
        "Product_name" => $product_name,
        "Phone" => $row['Phone'],
        "Email" => $row['Email'],
        "Address" => $row['Address'],
        "Status" => $row["Status"],

    );
}


echo json_encode(['data' => $data]);
