<?php require_once("../../resources/config.php")?>
<?php include(TEMPLATE_BACK . "/header.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../../public");
}
if(!isset($_SESSION['admin_status'])){
    redirect("../../public");
}
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                if($_SERVER['REQUEST_URI'] == "/storage/ssd1/857/18269857/public_html/admin/" || $_SERVER['REQUEST_URI'] == "/storage/ssd1/857/18269857/public_html/admin/index.php"){
                    include(TEMPLATE_BACK . "/admin_content.php");
                }
                if(isset($_GET['coffees'])){
                    include(TEMPLATE_BACK . "/coffees.php");
                }
                if(isset($_GET['admin'])){
                    include(TEMPLATE_BACK . "/admin.php");
                }
                if(isset($_GET['orders'])){
                    include(TEMPLATE_BACK . "/orders.php");
                }
                if(isset($_GET['instructors'])){
                    include(TEMPLATE_BACK . "/instructors.php");
                }
                if(isset($_GET['students'])){
                    include(TEMPLATE_BACK . "/students.php");
                }
                if(isset($_GET['users'])){
                    include(TEMPLATE_BACK . "/users.php");
                }
                ?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php") ?>