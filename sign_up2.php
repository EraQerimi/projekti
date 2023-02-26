<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "projekti";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

$newUsername = $_GET["new-username"];

$newPassword = $_GET["new-password"];
$sql = "INSERT INTO user(username, `password`) VALUES('$newUsername', '$newPassword')";
// var_dump("INSERT INTO user('username', 'password') VALUES('".$newUsername."', '".$newPassword."')");
// $sql = "INSERT INTO user (username, `password`) VALUES ('John', 'Doe')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// $sql = "CREATE TABLE user (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(30) NOT NULL,
//     password VARCHAR(30) NOT NULL,
    //    user_role TINYINT NOT NULL
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table user created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }
// ?>