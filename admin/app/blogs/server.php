<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

// Get DataTable parameters
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;
$search = isset($_POST['search']['value']) ? mysqli_real_escape_string($conn, $_POST['search']['value']) : '';

// Base query
$query = '
    SELECT
        b.ID,
        b.Product_ID,
        b.slug,
        b.title,
        b.image,
        b.short_description AS Short_Description,
        b.content,
        b.status,
        b.Created_At,
        b.Updated_At,
        b.faq,
        p.name AS Product_Name
    FROM blogs b
    LEFT JOIN product p ON p.id = b.Product_ID
';

// Add search condition
if (!empty($search)) {
    $query .= " WHERE 
        b.title LIKE '%$search%' OR 
        b.slug LIKE '%$search%' OR 
        b.short_description LIKE '%$search%' OR
        p.name LIKE '%$search%'
    ";
}

// Get total count without limit
$countQuery = str_replace(
    'SELECT b.ID, b.Product_ID, b.slug, b.title, b.image, b.short_description AS Short_Description, b.content, b.status, b.Created_At, b.Updated_At, b.faq, p.name AS Product_Name',
    'SELECT COUNT(*) as total',
    $query
);
$countResult = mysqli_query($conn, $countQuery);
$totalRecords = mysqli_fetch_assoc($countResult)['total'] ?? 0;

// Add ordering
$query .= ' ORDER BY b.ID DESC';

// Add limit for pagination
$query .= " LIMIT $start, $length";

$result = mysqli_query($conn, $query);

$data = [];
$i = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    // Format FAQ for display
    // $faq = $row['faq'];
    // $faqCount = 0;

    // if ($faq && isJson($faq)) {
    //     $faqArray = json_decode($faq, true);
    //     $faqCount = is_array($faqArray) ? count($faqArray) : 0;
    // }

    $data[] = [
        'No' => $i++,
        'ID' => $row['ID'],
        'Product_ID' => $row['Product_ID'],
        'Product_Name' => $row['Product_Name'],
        'Image' => $row['image'] ? $row['image'] : null,
        'Title' => $row['title'],
        'Slug' => $row['slug'],
        'Short_Description' => $row['Short_Description'],
        'Content' => $row['content'],
        'Status' => $row['status'],
        'Created_At' => $row['Created_At'],
        'Updated_At' => $row['Updated_At'],
        // 'FAQ' => $faq,
        // 'FAQ_Count' => $faqCount
    ];
}

echo json_encode([
    'draw' => $draw,
    'recordsTotal' => $totalRecords,
    'recordsFiltered' => $totalRecords,
    'data' => $data
]);

// Helper function to check if string is valid JSON
function isJson($string)
{
    if (empty($string))
        return false;
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}
?>