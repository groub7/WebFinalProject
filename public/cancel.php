<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydemy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

session_start();

$sectionID = $_GET['sectionID'];
$enrollID = $_GET['enrollID'];

$sql_d = "DELETE FROM enrolls WHERE enroll_id=$enrollID";
$query=mysqli_query($conn, $sql_d);

$sql_u = "UPDATE sections SET is_avaliable=1 WHERE section_id=$sectionID";
$updateQuery = mysqli_query($conn, $sql_u);

header("Location: cancelEnroll.php");
