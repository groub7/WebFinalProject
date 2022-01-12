<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "instructorHeader.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../public/index.php");
}
if((int)$_SESSION['status'] != 1){
    redirect("../public/index.php");
}
?>
<div class="container-fluid p-5" style="margin-top: 50px; background-color: rgb(182, 153, 204)">
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Courses
        </h1>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>

            <tr>
                <th>Course Name</th>
                <th>Subject</th>
                <th>Course Code</th>
            </tr>
            </thead>
            <tbody>
            <?php display_course(); ?>
            </tbody>
        </table>
    </div>
</div>