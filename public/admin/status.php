<?php require_once("../../resources/config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = query("UPDATE user u SET u.is_approved = 1 WHERE u.user_id = " . escape_string($id));
    confirm($query);


    echo "<script>
                alert('User approved.');
                window.location.href='index.php';
                </script>";
}