<?php
if ($_GET["token"] == "3LetaV3Ja94e6wttSJJ26RD5bwVuSp5N") {
include "Connection.php";

$sql = "SELECT * FROM `uyn_toggleping` WHERE server = " . addslashes($_GET["server"]);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$sql2 = "UPDATE `uyn_toggleping` SET `enabled` = " . addslashes($_GET["enabled"]) . " WHERE server = " . addslashes($_GET["server"]);
   if (mysqli_query($conn, $sql2)) {
       echo "Success";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}
}
else {
   $sql = "INSERT INTO `uyn_toggleping` (`server`, `enabled`) VALUES (" . addslashes($_GET["server"]) . ", " . addslashes($_GET["enabled"]) . ")";
   if (mysqli_query($conn, $sql)) {
       echo "Success";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}
$conn->close();
}
else {
echo 'Invalid token';
}
?>