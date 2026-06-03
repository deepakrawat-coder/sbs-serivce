<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

// Server-side processing for DataTables
// Fetch service categories with product name
$query = 'SELECT sc.ID, sc.Name, sc.Status, p.Name AS Product_Name FROM service_category sc LEFT JOIN product p ON sc.Product_ID = p.ID ORDER BY sc.ID ASC';
$result = mysqli_query($conn, $query);
$data = [];
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'No' => $i++,
        'ID' => $row['ID'],
        'Product_Name' => $row['Product_Name'],
        'Name' => $row['Name'],
        'Status' => $row['Status'],
    ];
}

echo json_encode(['data' => $data]);
?>
