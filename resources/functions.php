<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// helper functions

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }
    else{
        $msg = "";
    }
}

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

function get_coffees($type_ref = 2){
//    $query = query(" SELECT * FROM coffee INNER JOIN size ON coffee.coffee_id = size.coffee_id WHERE size.type_ref = " . $type_ref);
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        $coffee = <<<DELIMITER
//<div class="col-sm-4 col-lg-4 col-md-4">
//                        <div class="thumbnail">
//                            <img src="{$row['coffee_image']}" alt="" class="d-none d-sm-block" style="width: 150px; height: 150px">
//                            <div class="caption">
//                                <h4 class="pull-right">{$row['cost']}TL</h4>
//                                <h4 class="d-inline-block text-truncate" style="max-width: 150px"><a href="item.php?id={$row['coffee_id']}">{$row['coffee_name']}</a>
//                                </h4>
//                            </div>
//                            <div class="ratings">
//                                <p class="pull-right">15 reviews</p>
//                                <p>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                </p>
//                            </div>
//                            <div class="col text-center caption" style="height: auto">
//                                <a class="btn btn-primary" target="_blank" href="cart.php?size={$type_ref}&&add={$row['coffee_id']}">Buy</a>
//                            </div>
//                        </div>
//                    </div>
//DELIMITER;
//echo $coffee;
//    }
}

function button($type_ref, $id){
//    $query = query(" SELECT * FROM coffee INNER JOIN size ON coffee.coffee_id = size.coffee_id WHERE size.type_ref = " . $type_ref);
//    confirm($query);
//    $coffee = <<<DELIMITER
//<form action="">
//        <div class="col text-center caption" style="height: auto">
//         <a class="btn btn-primary" target="_blank" href="cart.php?size={$type_ref}&&add={$id}">Add To Cart</a>
//        </div>
//    </form>
//DELIMITER;
//echo $coffee;
}

function get_specials(){
//    $query = query("SELECT * FROM coffee");
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        if($row['special']){
//            echo "<a href='specials.php?id={$row['coffee_id']}' class='list-group-item'>{$row['coffee_name']}</a>";
//        }
//    }
}

function get_special_coffees($type_ref = 2){
//    $query = query(" SELECT * FROM coffee INNER JOIN size ON coffee.coffee_id = size.coffee_id WHERE size.type_ref = " . $type_ref);
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        if($row['special'] == 1){
//        $coffee = <<<DELIMITER
//<div class="col-sm-4 col-lg-4 col-md-4">
//                        <div class="thumbnail">
//                            <img src="{$row['coffee_image']}" alt="" class="d-none d-sm-block" style="width: 150px; height: 150px">
//                            <div class="caption">
//                                <h4 class="pull-right">{$row['cost']}TL</h4>
//                                <h4 class="d-inline-block text-truncate" style="max-width: 150px"><a href="item.php?id={$row['coffee_id']}">{$row['coffee_name']}</a>
//                                </h4>
//                            </div>
//                            <div class="ratings">
//                                <p class="pull-right">15 reviews</p>
//                                <p>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                    <span class="glyphicon glyphicon-star"></span>
//                                </p>
//                            </div>
//                            <div class="col text-center caption" style="height: auto">
//                                <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['coffee_id']}">Buy</a>
//                            </div>
//                        </div>
//                    </div>
//DELIMITER;
//        echo $coffee;
//        }
//    }
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
                if ($row['admin_status'] == 1) {
                    $_SESSION['admin_status'] = $row['admin_status'];
                    redirect("admin/index.php");
                } else {
                    redirect("loginIndex.php");
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
        return 0;
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
        $mail->Subject = 'Hello from Mydemy™!';
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

function send_message(){
//    if(isset($_POST['submit'])){
//        $to = "apollocoffee@apollo.com";
//        $name =  escape_string($_POST['name']);
//        $email =  escape_string($_POST['email']);
//        $phone =  escape_string($_POST['subject']);
//        $message =  escape_string($_POST['message']);
//
//        $headers = "From: {$name} {$email}";
//        mail($to, $name, $message, $headers);
//
//        $query = query("INSERT INTO comments(commentor_name, commentor_email, commentor_phone, commentor_message) VALUES('{$name}', '{$email}', '{$phone}', '{$message}')");
//        confirm($query);
//
//        echo "<script>
//                alert('Your comment will be into the consideration. Thank you for choosing us!');
//                window.location.href='contact.php';
//                </script>";
//    }

}

function display_orders(){
//    $query = query("SELECT * FROM customerorder INNER JOIN orderitem ON customerorder.order_id = orderitem.order_id INNER JOIN coffee on orderitem.coffee_id = coffee.coffee_id ORDER BY date DESC");
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        $orders = <<<DELIMITER
//<tr>
//            <td>{$row['customer_id']}</td>
//            <td>{$row['coffee_name']}</td>
//            <td>{$row['quantity']}</td>
//            <td>{$row['type']}</td>
//            <td>{$row['order_id']}</td>
//            <td>{$row['date']}</td>
//           <td>Completed</td>
//        </tr>
//DELIMITER;
//        echo $orders;
//
//    }
}

function display_current_orders(){
//    $query = query("SELECT * FROM customerorder INNER JOIN orderitem ON customerorder.order_id = orderitem.order_id INNER JOIN coffee on orderitem.coffee_id = coffee.coffee_id ORDER BY date DESC LIMIT 10");
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        $orders = <<<DELIMITER
//<tr>
//            <td>{$row['customer_id']}</td>
//            <td>{$row['coffee_name']}</td>
//            <td>{$row['quantity']}</td>
//            <td>{$row['type']}</td>
//            <td>{$row['order_id']}</td>
//            <td>{$row['date']}</td>
//            <td>Completed</td>
//        </tr>
//DELIMITER;
//        echo $orders;
//
//    }
}

function get_coffees_in_admin(){
//    $query = query(" SELECT * FROM coffee INNER JOIN size ON coffee.coffee_id = size.coffee_id ORDER BY coffee.coffee_id, type_ref");
//    confirm($query);
//
//    while($row = fetch_array($query)){
//        $coffee = <<<DELIMITER
//            <tr>
//            <td>{$row['coffee_id']}</td>
//            <td>{$row['coffee_name']}<br>
//              <a href="index.php?edit_coffee&id={$row['coffee_id']}&size={$row['type_ref']}"><img src="{$row['coffee_image']}" alt="" style="max-width: 62px; max-height: 62px;"></a>
//            </td>
//            <td>{$row['type']}</td>
//            <td>{$row['cost']} TL</td>
//            <td><a class="btn btn-danger" href="delete_coffee.php"><span class="glyphicon glyphicon-remove"></span></a></td>
//        </tr>
//DELIMITER;
//        echo $coffee;
//    }
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

function edit_coffee(){
//    if(isset($_POST['publish'])){
//        $coffee_name = escape_string($_POST['coffee_name']);
//        $coffee_description = escape_string($_POST['coffee_description']);
//        $coffee_price = escape_string($_POST['coffee_price']);
//        $coffee_size = escape_string($_POST['coffee_size']);
//        $coffee_id = escape_string($_POST['coffee_id']);
//        $coffee_image = escape_string($_FILES['file']['name']);
//        $image_temp_location = escape_string($_FILES['file']['tmp_name']);
//        $coffee_image = "localhost/WebMidterm/resources/images/" . $coffee_image;
//
//        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $coffee_image);
//
//        if('$coffee_name' != ""){
//            $query = query("UPDATE coffee SET coffee_name = '$coffee_name', coffee_description = '$coffee_description' WHERE coffee_id = '$coffee_id'");
//            confirm($query);
//        }
//
//        elseif('$coffee_name' == ""){
//            $query = query("UPDATE coffee SET coffee_description = '$coffee_description' WHERE coffee_id = '$coffee_id'");
//            confirm($query);
//        }
//
//        if('$coffee_description' != ""){
//            $query = query("UPDATE coffee SET coffee_description = '$coffee_description' WHERE coffee_id = '$coffee_id'");
//            confirm($query);
//        }
//
//        $type_ref = 2;
//        if($coffee_size == "Tall"){
//            $type_ref = 1;
//        }
//        elseif($coffee_size == "Venti"){
//            $type_ref = 3;
//        }
//        $query = query("UPDATE size SET cost = '$coffee_price', type = '$coffee_size', type_ref = '$type_ref' WHERE coffee_id = '$coffee_id'");
//        confirm($query);
//
//
//        echo "<script>
//                alert('Coffee Updated Successfully');
//                window.location.href='index.php?coffees';
//                </script>";
//
//
//
//    }
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

?>