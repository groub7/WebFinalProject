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
<div id="page-wrapper">

    <div class="container-fluid">



        <div class="col-lg-12">


            <h1 class="page-header">
                Sections
            </h1>
            <p class="bg-success">
            </p>

            <div class="col-md-12">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Section Name</th>
                        <th>Student First Name</th>
                        <th>Student Last Name</th>
                        <th>Email</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php instructor_sections(); ?>

                    </tbody>
                </table> <!--End of Table-->


            </div>
        </div>
    </div>
    <!-- /.container -->