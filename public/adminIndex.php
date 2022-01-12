<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "adminHeader.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../public/index.php");
}
if(!isset($_SESSION['admin_status'])){
    redirect("../../public");
}
?>
    <!-- Page Content -->

    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>