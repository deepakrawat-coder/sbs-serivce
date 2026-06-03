<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

$query = '
    SELECT
        s.ID,
        s.Title,
        s.Rating,
        s.Slug,
        s.Image,
        s.Status,
        sc.Name AS Category_Name
    FROM service s
    LEFT JOIN service_category sc
        ON sc.ID = s.Service_Category
    ORDER BY s.ID ASC
';

$result = mysqli_query($conn, $query);

$data = [];
$i = 1;

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'No' => $i++,
        'ID' => $row['ID'],
        'Image' => $row['Image'],
        'Category_Name' => $row['Category_Name'],
        'Title' => $row['Title'],
        'Rating' => $row['Rating'],
        'Slug' => $row['Slug'],
        'Status' => $row['Status']
    ];
}

echo json_encode([
    'data' => $data
]);
