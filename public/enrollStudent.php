<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "mydemy");

$user_id = $_SESSION['user_id'];
$section_id = $_GET['section_id'];

mysqli_query($connection, "insert into enrolls(student_id, section_id) values (". $user_id .", ". $section_id .")");
mysqli_query($connection, "UPDATE sections SET is_avaliable=0 WHERE section_id=$section_id");

echo "<script>
                alert('You have joined the section.');
                window.location.href='../drawCalendar.php';
                </script>";