<?php use PHPMailer\PHPMailer\PHPMailer;

require_once("config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = query("SELECT * FROM sections
    INNER JOIN enrolls ON sections.section_id = enrolls.section_id
    INNER JOIN student s on enrolls.student_id = s.student_id
    INNER JOIN user u on s.student_id = u.user_id
    WHERE enrolls.section_id = " . escape_string($id));
    confirm($query);
    while($row = fetch_array($query)){
        $enroll_id = $row['enroll_id'];
        $firstname = $row['first_name'];
        $sql_d = query("DELETE FROM enrolls WHERE enroll_id='$enroll_id'");
        confirm($sql_d);

        $sql_u = query("UPDATE sections SET is_avaliable=1 WHERE section_id='$id'");
        confirm($sql_u);

        $email = $row['email'];

        $mail2 = new PHPMailer;
        $mail2->isSMTP();
        $mail2->SMTPSecure = 'ssl';
        $mail2->SMTPAuth = true;
        $mail2->Host = 'smtp.gmail.com';
        $mail2->Port = 465;
        $mail2->Username = 'mydemyeducation@gmail.com';
        $mail2->Password = 'mydemy1234';
        $mail2->setFrom('mydemyeducation@gmail.com');
        $mail2->addAddress($email);
        $mail2->Subject = 'Section on Mydemy™ has been cancelled!';
        $mail2->Body = "Hello '$firstname' your section has been cancelled by our Instructor.";
//send the message, check for errors
        if (!$mail2->send()) {
            echo "ERROR: " . $mail2->ErrorInfo;
        } else {
            echo "SUCCESS";
        }
    }


    echo "<script>
                alert('Section has been cancelled.');
                window.location.href='cancelInstructorSection.php';
                </script>";
}