<?php

$conn = oci_connect("system","123","//localhost/xe");
// Fetch Record from Database

$output = "";
$table = "student"; // Enter Your Table Name 
$sql =  oci_parse($conn,"select * from $table");
oci_execute ($sql,OCI_DEFAULT);
$columns_total = oci_num_fields($sql);


while ($row = oci_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=$row["$i"].',';
}
$output .="\n";
}

// Download the file

$filename = "student.csv";
header('Content-type: application/CSV');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>


