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
    <!-- Page Content -->
    <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="container p-4 justify-content-center">

            <div class="col-md-3 center">
                <p class="text-center larger">Add Course</p>
            </div>
            <hr>
            <div class="row">

                <?php submit_course(); ?>

                <div class="form-group text-center"><label for="coursename">
                        Course Name<input type="text" name="coursename" class="form-control"></label>
                </div>

                <div class="form-group text-center my-3"><label for="coursecode">
                        Course Code<input type="text" name="coursecode" class="form-control"></label>
                </div>

                <div class="form-group text-center"><label for="coursesubject">
                        Course Subject<input type="text" name="coursesubject" class="form-control"></label>
                </div>

                <div class="form-group text-center mt-3">
                    <input type="submit" name="submit" class="btn btn-lg btn-outline-light col-2 learn" value="Add Course">
                </div>
            </div>
        </div>
    </form>


    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "new_footer.php") ?>