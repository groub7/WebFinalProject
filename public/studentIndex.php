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
    <div class="container">

        <div class="row">
            <!--Categories here-->
            <div class="overlay">
                <div class="videos">
                    <video autoplay="autoplay" muted>
                        <source src="https://3fcampus.mef.edu.tr/uploads/banners/webadmin.mef.edu.tr/banner_28.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>