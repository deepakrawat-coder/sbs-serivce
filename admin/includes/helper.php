<?php
// String Encryption
ini_set('display_errors', 1);

function generateSeoURL($string)
{
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]+/', '-', $string);
    $string = trim($string, '-');

    return $string;
}

function getblogFunc($conn)
{
    $blogArr = array();
    $blogQuery = $conn->query('SELECT id, blogs_name FROM blogs WHERE status=1 ORDER BY id ASC');
    while ($row = $blogQuery->fetch_assoc()) {
        $blogArr[] = $row;
    }
    return $blogArr;
}

function getCenterFunc($conn)
{
    $centerArr = array();
    $centerQuery = $conn->query("SELECT ID, CONCAT(Name, '(', Code,')') as Name, Code FROM Users WHERE Status=1 AND Role ='Center' ORDER BY ID DESC");
    while ($row = $centerQuery->fetch_assoc()) {
        $centerArr[] = $row;
    }
    return $centerArr;
}

function getStreamFunc($conn)
{
    $streamArr = array();
    $streamQuery = $conn->query('SELECT ID, Name FROM streams WHERE Status=1 ORDER BY Position ASC');
    while ($row = $streamQuery->fetch_assoc()) {
        $streamArr[] = $row;
    }
    return $streamArr;
}

// function getCategoryFunc($conn)

// {
//     $categoryArr = array();
//     $categoryQuery = $conn->query("SELECT ID, Name FROM courses WHERE Status=1 ORDER BY ID DESC");
//     while ($row = $categoryQuery->fetch_assoc()) {
//         $categoryArr[] = $row;
//     }
//     return $categoryArr;
// }

function getProductFunc($conn)
{
    $productArr = array();
    $productQuery = $conn->query('SELECT ID, Name FROM product WHERE Status=1 ORDER BY ID DESC');
    while ($row = $productQuery->fetch_assoc()) {
        $productArr[] = $row;
    }
    return $productArr;
}

function getCategoryFunc($conn)
{
    $categoryArr = array();

    $categoryQuery = $conn->query('
        SELECT 
            courses.ID, 
            courses.Name AS CourseName, 
            programs.Name AS ProgramName 
        FROM courses 
        LEFT JOIN programs ON courses.Program_ID = programs.ID 
        WHERE courses.Status = 1 
        ORDER BY courses.ID DESC
    ');

    while ($row = $categoryQuery->fetch_assoc()) {
        $categoryArr[] = $row;
    }

    return $categoryArr;
}

// function getCategoryCourseSpeci($conn){
//     $CourseCategoryArr = array();

//     $CourseCategoryQuery = $conn->query("
//     SELECT c.ID AS CategoryID, c.Categories_name,
//      co.ID AS CourseID, co.Course_name,
//       s.ID AS SpecializationID, s.Name AS SpecializationName
//       FROM categories c INNER JOIN courses co ON co.Category_id = c.ID AND co.Status = 1
//        LEFT JOIN specializations s ON s.Courses_id = co.ID AND s.Status = 1 WHERE c.Status = 1");
//        while($row = $CourseCategoryQuery->fetch_assoc()){
//             $CourseCategoryArr[] = $row;
//        }
//        return $CourseCategoryArr;
// }

function getCategoryCourseSpeci($conn)
{
    $CourseCategoryArr = array();

    $CourseCategoryQuery = $conn->query('
    SELECT categories.ID AS CategoryID, categories.Categories_name FROM categories WHERE categories.Status = 1');
    while ($row = $CourseCategoryQuery->fetch_assoc()) {
        $CourseCategoryArr[] = $row;
    }
    return $CourseCategoryArr;
}

function getProgramFunc($conn)
{
    $programArr = array();
    $programQuery = $conn->query('SELECT ID, Name FROM programs WHERE Status=1 ORDER BY ID DESC');
    while ($row = $programQuery->fetch_assoc()) {
        $programArr[] = $row;
    }
    return $programArr;
}

function getCourseFunc($conn)
{
    $courseArr = array();
    // $courseQuery = $conn->query("SELECT ID, Name FROM categories_courses WHERE Status=1 ORDER BY ID DESC");
    $courseQuery = $conn->query('SELECT ID, Categories_name FROM categories WHERE Status=1 ORDER BY ID DESC');
    while ($row = $courseQuery->fetch_assoc()) {
        $courseArr[] = $row;
    }
    return $courseArr;
}

function getCategory_cardFunc($conn)
{
    $cardArr = array();
    $cardQuery = $conn->query('SELECT ID, Name FROM categories_card WHERE Status=1 ORDER BY ID DESC');
    while ($row = $cardQuery->fetch_assoc()) {
        $cardArr[] = $row;
    }
    return $cardArr;
}

// function getCourseFunc($conn)
// {
//     $courseArr = array();
//     $courseQuery = $conn->query("SELECT ID, Name FROM courses WHERE Status=1 ORDER BY ID ASC");
//     while ($row = $courseQuery->fetch_assoc()) {
//         $courseArr[] = $row;
//     }
//     return $courseArr;
// }

function getCountry($conn)
{
    $cuntriesArr = array();
    $cuntriesQuery = $conn->query('SELECT ID, Name FROM cuntries ORDER BY ID ASC');
    while ($row = $cuntriesQuery->fetch_assoc()) {
        $cuntriesArr[] = $row;
    }
    return $cuntriesArr;
}

// function getProgramFunc($conn)
// {
//     $programArr = array();
//     $programQuery = $conn->query("SELECT ID, Name FROM Courses WHERE Status=1 ORDER BY ID DESC");
//     while ($row = $programQuery->fetch_assoc()) {
//         $programArr[] = $row;
//     }
//     return $programArr;
// }

// function getProgramsByStream($conn, $stream_id) {
//     $programArr = array();
//     $programQuery = $conn->query("SELECT ID, Name FROM Courses WHERE Status=1 AND StreamID=$stream_id ORDER BY ID DESC");
//     while ($row = $programQuery->fetch_assoc()) {
//         $programArr[] = $row;
//     }
//     return $programArr;
// }

// if (isset($_POST['stream_id'])) {
//     $stream_id = intval($_POST['stream_id']);
//     $programs = getProgramsByStream($conn, $stream_id);
//     echo json_encode($programs);
//     exit;
// }

function getSpecializationFunc($conn)
{
    $specializationArr = array();
    $specializationQuery = $conn->query("SELECT ID,CONCAT(Sub_Courses.Name, ' (', Sub_Courses.Short_Name, ')') as Name FROM Sub_Courses WHERE Status=1 ORDER BY ID DESC");
    while ($row = $specializationQuery->fetch_assoc()) {
        $specializationArr[] = $row;
    }
    return $specializationArr;
}

// $modeArr = array("0" => "Month", "1" => "Semester");
$programArr = array('0' => 'Part Time', '1' => 'Full Time');

$last_qulifications_Arr = array('Last Qulifications' => 'Last Qulifications', 'Intermediate' => 'Intermediate', 'Intermediate (Science)' => 'Intermediate (Science)', 'High School' => 'High School', 'Graduate' => 'Graduate', 'Diploma' => 'Diploma');
$durationArr = array('1 Month' => '1 Month', '3 Months' => '3 Months', '6 Months' => '6 Months', '12 Months' => '12 Months', '1 Years' => '1 Years', '2 Years' => '2 Years');
$programTypeArr = array('certification' => 'Certification', 'certified' => 'Certified Diploma', 'advance_diploma' => 'Advance Diploma');

// function uploadImage($conn, $image, $folder, $width = null, $height = null)
// {
//     $temp = explode(".", $_FILES[$image]["name"]);
//     $filename = round(microtime(true)) . '.' . end($temp);
//     $tempname = $_FILES[$image]["tmp_name"];
//     $uploaded_folder = "../../admin-assets/img/" . $folder . "/" . $filename;
//     if (move_uploaded_file($tempname, $uploaded_folder)) {
//         $filename = "/admin-assets/img/" . $folder . "/" . $filename;
//         return  $filename;
//     } else {
//         echo json_encode(['status' => 400, 'message' => 'Unable to save photo!']);
//         exit();
//     }
// }

function uploadImage($conn, $image, $folder, $width = null, $height = null)
{
    $temp = explode('.', $_FILES[$image]['name']);
    $filename = round(microtime(true)) . '.' . end($temp);
    $tempname = $_FILES[$image]['tmp_name'];
    $uploaded_folder = '../../admin-assets/img/' . $folder;

    // Create the folder if it does not exist
    if (!is_dir($uploaded_folder)) {
        mkdir($uploaded_folder, 0777, true);
    }

    $uploaded_file = $uploaded_folder . '/' . $filename;
    //  echo('<pre>');print_r($uploaded_file);die;
    if (move_uploaded_file($tempname, $uploaded_file)) {
        $filename = '/admin-assets/img/' . $folder . '/' . $filename;
        return $filename;
    } else {
        echo json_encode(['status' => 400, 'message' => 'Unable to save photo!']);
        exit();
    }
}

function uploadPdf($conn, $fileInputName, $folder, $width = null, $height = null)
{
    // Check if the file is a PDF
    if ($_FILES[$fileInputName]['type'] !== 'application/pdf') {
        echo json_encode(['status' => 400, 'message' => 'Only PDF files are allowed!']);
        exit();
    }

    $temp = explode('.', $_FILES[$fileInputName]['name']);
    $filename = round(microtime(true)) . '.' . end($temp);
    $tempname = $_FILES[$fileInputName]['tmp_name'];
    $uploaded_folder = '../../admin-assets/docs/' . $folder;

    // Create the folder if it does not exist
    if (!is_dir($uploaded_folder)) {
        mkdir($uploaded_folder, 0777, true);
    }

    $uploaded_file = $uploaded_folder . '/' . $filename;

    if (move_uploaded_file($tempname, $uploaded_file)) {
        $filename = '/admin-assets/docs/' . $folder . '/' . $filename;
        return $filename;
    } else {
        echo json_encode(['status' => 400, 'message' => 'Unable to save PDF!']);
        exit();
    }
}

function uploadsImage($conn, $image, $folder, $width = null, $height = null)
{
    // Ensure that the destination folder exists
    $destinationFolder = '../../admin-assets/img/' . $folder . '/';
    if (!file_exists($destinationFolder) && !mkdir($destinationFolder, 0777, true)) {
        // Failed to create the directory
        echo json_encode(['status' => 400, 'message' => 'Unable to create directory!']);
        exit();
    }

    // Handle file upload for each file
    $filenames = [];
    foreach ($_FILES[$image]['name'] as $key => $name) {
        // Handle file upload
        $temp = explode('.', $name);
        if (!is_array($temp) || count($temp) < 2) {
            // Invalid file name format
            echo json_encode(['status' => 400, 'message' => 'Invalid file name format!']);
            exit();
        }

        $filename = round(microtime(true)) . '_' . $key . '.' . end($temp);
        $tempname = $_FILES[$image]['tmp_name'][$key];
        $uploaded_file = $destinationFolder . $filename;

        if (move_uploaded_file($tempname, $uploaded_file)) {
            $filename = '/admin-assets/img/' . $folder . '/' . $filename;
            $filenames[] = $filename;  // Add filename to the list
        } else {
            // Failed to move the uploaded file
            echo json_encode(['status' => 400, 'message' => 'Unable to upload image!']);
            exit();
        }
    }

    return $filenames;
}

function baseurl($vals)
{
    $vals = str_replace(' ', '-', trim(strtolower($vals)));
    $vals = str_replace('/', '-', $vals);
    $vals = str_replace('(', '-', $vals);
    $vals = str_replace(')', '-', $vals);
    $vals = str_replace('&', '-', $vals);
    $vals = str_replace('#', '-', $vals);
    $vals = str_replace('---', '-', $vals);
    $vals = str_replace('--', '-', $vals);
    $vals = str_replace('.', '-', $vals);
    $vals = str_replace('?', '-', $vals);
    return $vals;
}
