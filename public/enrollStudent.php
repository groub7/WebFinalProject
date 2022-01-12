<?php use PHPMailer\PHPMailer\PHPMailer;
require_once("../resources/config.php");
session_start();
$connection = mysqli_connect("localhost", "root", "", "mydemy");

$user_id = $_SESSION['user_id'];
$section_id = $_GET['section_id'];

mysqli_query($connection, "insert into enrolls(student_id, section_id) values (". $user_id .", ". $section_id .")");
mysqli_query($connection, "UPDATE sections SET is_avaliable=0 WHERE section_id=$section_id");


$query = query("SELECT *, 
       v.first_name as student_name, 
       v.email as student_email, 
       u.email as instructor_email,
       v.last_name as student_last
    FROM sections
    INNER JOIN enrolls ON sections.section_id = enrolls.section_id
    INNER JOIN instructor s on sections.instructor_id = s.instructor_id
    INNER JOIN user u on s.instructor_id = u.user_id
    INNER JOIN user v on v.user_id = '{$user_id}'
    WHERE enrolls.section_id = " . escape_string($section_id));
confirm($query);

while($row = fetch_array($query)) {
    $student_name = $row['student_name'];
    $student_last = $row['student_last'];
    $student_email = $row['student_email'];
    $instructor_email = $row['instructor_email'];

    $mail2 = new PHPMailer;
    $mail2->isSMTP();
    $mail2->SMTPSecure = 'ssl';
    $mail2->SMTPAuth = true;
    $mail2->Host = 'smtp.gmail.com';
    $mail2->Port = 465;
    $mail2->Username = 'mydemyeducation@gmail.com';
    $mail2->Password = 'mydemy1234';
    $mail2->setFrom('mydemyeducation@gmail.com');
    $mail2->addAddress($instructor_email);
    $mail2->Subject = 'Section on Mydemy has been taken!';
    $mail2->Body = "Hello Dear Instructor, Your section has been selected by our student, '$student_name' '$student_last'. Here's our student's contact mail: '$student_email'";
    if (!$mail2->send()) {
        echo "ERROR: " . $mail2->ErrorInfo;
    } else {
        echo "SUCCESS";
    }
}

echo "<script>
                alert('You have joined the section.');
                window.location.href='../drawCalendar.php';
                </script>";