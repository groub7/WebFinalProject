<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// helper functions

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location ");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

//Prevents sql injections
function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

function login_user(){
    if(isset($_POST['submit'])){
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM user WHERE email = '{$email}' and password = '{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            echo "<script>
                alert('Your Email or Password are wrong.');
                window.location.href='login.php';
                </script>";
        }

        else{
            while($row = fetch_array($query)) {
                $_SESSION['f_name'] = $row['first_name'];
                $_SESSION['status'] = $row['is_approved'];
                $user_id = $row['user_id'];
                $_SESSION['user_id'] = $user_id;
                $query2 = query("SELECT * FROM instructor WHERE instructor_id = '{$user_id}'");
                confirm($query2);
                if ($row['admin_status'] == 1) {
                    $_SESSION['admin_status'] = $row['admin_status'];
                    redirect("admin/index.php");
                }
                else{
                    if(mysqli_num_rows($query2) != 0){
                        $_SESSION['is_instructor'] = 1;
                        redirect("instructorIndex.php");
                    }
                    else {
                        redirect("studentIndex.php");
                    }
                }
            }
        }
    }
}

function validate_password($password){
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
//        return 0;
        return 1;
    }
    else{
        return 1;
    }
}

function submit_user(){
    if(isset($_POST['submit'])){
        $firstname = escape_string($_POST['firstname']);
        $lastname = escape_string($_POST['lastname']);
        $password = escape_string($_POST['password']);
        if(!validate_password($password)){
            echo "<script>
                alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
                window.location.href='signIn.php';
                </script>";
            return;
        }
        if(isset($_POST['proficiency'])){
            $is_instructor = 1;
            $proficiency = escape_string($_POST['proficiency']);
        }
        else{
            $is_instructor = 0;
            $university = escape_string($_POST['university']);
        }

        $email = escape_string($_POST['email']);

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'mydemyeducation@gmail.com';
        $mail->Password = 'mydemy1234';
        $mail->setFrom('mydemyeducation@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Hello from Mydemy!';
        $mail->Body = "Hello '$firstname' Please contact to our administrator to activate your account.";
//send the message, check for errors
        if (!$mail->send()) {
            echo "ERROR: " . $mail->ErrorInfo;
        } else {
            echo "SUCCESS";
        }

        $query = query("SELECT * FROM user WHERE email = '{$email}'");
        confirm($query);

        if(mysqli_num_rows($query) != 0){
            echo "<script>
                alert('Email already exists.');
                window.location.href='login.php';
                </script>";
        }

        $query = query("INSERT INTO user(email, password, first_name, last_name, admin_status, is_approved)  VALUES('{$email}', '{$password}', '{$firstname}', '{$lastname}', '0', '0')");
        confirm($query);

        $query = query("SELECT user_id FROM user WHERE email = '{$email}' and password = '{$password}'");
        confirm($query);

        $row = mysqli_fetch_assoc($query);
        $user_id = $row['user_id'];

        if($is_instructor == 1){
            $query2 = query("INSERT INTO instructor(instructor_id, proficiency)  VALUES('{$user_id}', '{$proficiency}')");
        }

        else{
            $query2 = query("INSERT INTO student(University, student_id)  VALUES('{$university}', '{$user_id}')");
        }
        confirm($query2);

        echo "<script>
                alert('Account created successfully');
                window.location.href='login.php';
                </script>";

    }
}

function submit_course(){
    if(isset($_POST['submit'])){
        $coursename = escape_string($_POST['coursename']);
        $coursecode = escape_string($_POST['coursecode']);
        $coursesubject = escape_string($_POST['coursesubject']);

        $query2 = query("INSERT INTO course (status, name, subject, course_code) VALUES (1, '{$coursename}', '{$coursesubject}', '{$coursecode}');");
        confirm($query2);

        echo "<script>
                alert('Course added successfully');
                window.location.href='addcourse.php';
                </script>";
    }
}

function submit_section(){
    if(isset($_POST['submit'])){
        $coursecode = escape_string($_POST['coursecode']);
        $sectionname = escape_string($_POST['sectionname']);
        $starttime = escape_string($_POST['starttime']);
        $endtime = escape_string($_POST['endtime']);
        $date = escape_string($_POST['date']);
        $user_id = $_SESSION['user_id'];

        $query = query("SELECT * FROM course WHERE course_code = '{$coursecode}' LIMIT 1");
        confirm($query);

        while($row = fetch_array($query)){
            $courseid = $row['course_id'];
            $query2 = query("INSERT INTO sections (instructor_id, course_id, section_name, start_time, end_time, date) VALUES ('{$user_id}', '{$courseid}', '{$sectionname}', '{$starttime}', '{$endtime}', '{$date}');");
            confirm($query2);
        }

        echo "<script>
                alert('Section added successfully');
                window.location.href='addsubject.php';
                </script>";
    }
}

function display_sections(){
    $query = query("SELECT * FROM sections 
    INNER JOIN enrolls e on sections.section_id = e.section_id
    INNER JOIN instructor i on sections.instructor_id = i.instructor_id
    INNER JOIN student s on e.student_id = s.student_id
    INNER JOIN user u on i.instructor_id = u.user_id
    WHERE is_avaliable = 1 ORDER BY date DESC");
    confirm($query);
    while($row = fetch_array($query)){
        $section_id = $row['section_id'];
        $student_id = $row['student_id'];
        $instructor_name = $row['first_name'];
        $section_name = $row['section_name'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $date = $row['date'];
        $query2 = query("SELECT * FROM user WHERE user_id = '$student_id'");
        confirm($query2);
        while($row = fetch_array($query2)){
            $student_name = $row['first_name'];
        }

        $user = <<<DELIMITER
<tr>
<td>{$student_name}</td>
<td>{$instructor_name}</td>
<td>{$section_name}</td>
<td>{$start_time}</td>
<td>{$end_time}</td>
<td>{$date}</td>
<td>Available</td>
DELIMITER;
        echo $user;
    }
}

function display_course(){
    $query = query("SELECT * FROM course");
    confirm($query);
    while($row = fetch_array($query)){
        $course_name = $row['name'];
        $course_subject = $row['subject'];
        $course_code = $row['course_code'];
        $user = <<<DELIMITER
<tr>
<td>{$course_name}</td>
<td>{$course_subject}</td>
<td>{$course_code}</td>
</tr>
DELIMITER;
        echo $user;
    }
}


function add_admin(){
    if(isset($_POST['publish'])){
        $first_name = escape_string($_POST['first_name']);
        $last_name = escape_string($_POST['last_name']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);

        $query2 = query("SELECT * FROM user WHERE email = '$email' and password = '$password'");
        confirm($query2);
        if(mysqli_num_rows($query2) == 0){
            $query = query("INSERT INTO user (first_name, last_name, admin_status, email, password, is_approved) VALUES ('$first_name', '$last_name', 1, '$email', '$password', 1)");
            confirm($query);
        }

            echo "<script>
                alert('Admin Added Successfully');
                window.location.href='index.php?users';
                </script>";

    }
}

function admin_users(){
    $user_query = query("SELECT * FROM user");
    confirm($user_query);

    while($row = fetch_array($user_query)){
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $pending = $row['is_approved'];
        $password = $row['password'];
        if($pending == 1){
            $status = "Active";
        }
        else{
            $status = "Inactive";
        }
        $user = <<<DELIMITER
<tr>
<td>{$user_id}</td>
<td>{$first_name}</td>
<td>{$last_name}</td>
<td>{$email}</td>
<td>{$password}</td>
<td>{$status}</td>
<td><a class="btn btn-danger" href="inactive_status.php?id={$user_id}"><span class="glyphicon glyphicon-remove"></span></a></td>
<td><a class="btn btn-success" href="status.php?id={$user_id}"><span class="glyphicon glyphicon-ok"></span></a></td>
DELIMITER;
echo $user;
    }
}

function admin_instructors(){
    $user_query = query("SELECT * FROM user INNER JOIN instructor WHERE instructor_id = user_id");
    confirm($user_query);

    while($row = fetch_array($user_query)){
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $pending = $row['is_approved'];
        $password = $row['password'];
        if($pending == 1){
            $status = "Active";
        }
        else{
            $status = "Inactive";
        }
        $user = <<<DELIMITER
<tr>
<td>{$user_id}</td>
<td>{$first_name}</td>
<td>{$last_name}</td>
<td>{$email}</td>
<td>{$password}</td>
<td>{$status}</td>
<td><a class="btn btn-danger" href="inactive_status.php?id={$user_id}"><span class="glyphicon glyphicon-remove"></span></a></td>
<td><a class="btn btn-success" href="status.php?id={$user_id}"><span class="glyphicon glyphicon-ok"></span></a></td>
DELIMITER;
        echo $user;
    }
}

function admin_students(){
    $user_query = query("SELECT * FROM user INNER JOIN student WHERE student_id = user_id");
    confirm($user_query);

    while($row = fetch_array($user_query)){
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $pending = $row['is_approved'];
        $password = $row['password'];
        if($pending == 1){
            $status = "Active";
        }
        else{
            $status = "Inactive";
        }
        $user = <<<DELIMITER
<tr>
<td>{$user_id}</td>
<td>{$first_name}</td>
<td>{$last_name}</td>
<td>{$email}</td>
<td>{$password}</td>
<td>{$status}</td>
<td><a class="btn btn-danger" href="inactive_status.php?id={$user_id}"><span class="glyphicon glyphicon-remove"></span></a></td>
<td><a class="btn btn-success" href="status.php?id={$user_id}"><span class="glyphicon glyphicon-ok"></span></a></td>
DELIMITER;
        echo $user;
    }
}

function instructor_sections(){
    $user_id = $_SESSION['user_id'];
    $sections = query("SELECT * FROM sections
    INNER JOIN enrolls ON sections.section_id = enrolls.section_id
    INNER JOIN student s on enrolls.student_id = s.student_id
    INNER JOIN user u on s.student_id = u.user_id
    WHERE instructor_id = '$user_id';");
    confirm($sections);

    while($row = fetch_array($sections)){
        $section_id = $row['section_id'];
        $section_name = $row['section_name'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $email = $row['email'];
        $date = $row['date'];
        $user = <<<DELIMITER
<tr>
<td>{$section_name}</td>
<td>{$first_name}</td>
<td>{$last_name}</td>
<td>{$email}</td>
<td>{$start_time}</td>
<td>{$end_time}</td>
<td>{$date}</td>
<td><a class="btn btn-danger" href="../resources/cancelCourse.php?id={$section_id}"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-xbox" viewBox="0 0 16 16">
  <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z"/>
</svg></span></a></td>
DELIMITER;
        echo $user;
    }
}