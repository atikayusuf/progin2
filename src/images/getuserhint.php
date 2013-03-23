<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once("database.php");
$con = connectDatabase();
$q = $_GET['q'];
$hint = "";
$query = "select * from user where username LIKE %" . $q . "%";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
    $hint = $hint . " , " . $row['username'];
}
if ($hint == "") {
    $response = "no suggestion";
} else {
    $response = $hint;
}
echo $hint;
?>
