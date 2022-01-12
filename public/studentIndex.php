<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "studentHeader.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../public/index.php");
}
if((int)$_SESSION['status'] != 1){
    redirect("../public/index.php");
}
?>
    <!-- Page Content -->

    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>