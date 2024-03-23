<?php
include('dbconnect.php');

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];

$sql = "SELECT examfile, examfile_name, examfile_type FROM exam_tbl WHERE exam_id =? AND batch_id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $id1, $id2);
$stmt->execute();

$stmt->bind_result($file, $file_name, $file_type);

if ($stmt->fetch()) {
    header("Content-type: $file_type");
    header("Content-Disposition: attachment; filename=$file_name"); 
    echo $file; 
} else {
    echo "File not found.";
}

$stmt->close();
?>