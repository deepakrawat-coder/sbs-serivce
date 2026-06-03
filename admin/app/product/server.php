<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/conn.php');

// # Fetch records
$result_record = 'SELECT ID, Name, Image, Services, Status FROM product ORDER BY ID DESC';

$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;
  //   if(strlen($row['Title']) > 20){
  //     $destext = substr($row['Title'], 0, 20) . "...";
  //   }else{
  //     $destext = $row['Title'];
  //   }

  $data[] = array(
    'No' => $no,
    'ID' => $row['ID'],
    'Name' => $row['Name'],
    // "Title"=> $destext,
    'Services' => $row['Services'],
    'Photo' => $row['Image'],
    // "Slug" => $row['Slug'],
    'Status' => $row['Status'],
  );
}

echo json_encode(['data' => $data]);
