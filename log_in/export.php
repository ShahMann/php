<?php 
session_start();

include_once 'db.php';
$file_name = "Student-Data" . date('Y-m-d') . ".csv";
$sql = "SELECT * FROM log";

$result = $conn->query($sql);

$csv_content = '';

if ($result->num_rows > 0) {
    $column_names = array_keys($result->fetch_assoc());
    $csv_content .= implode(',', $column_names) . "\n";

    $result->data_seek(0);

    while ($row = $result->fetch_assoc()) {
        $csv_content .= implode(',', $row) . "\n";
    }
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $file_name);

echo $csv_content;
