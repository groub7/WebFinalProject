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
    <div class="container justify-content-center p-4">
        <div class="col-md-3 center">
            <p class="text-center larger">Add Section</p>
        </div>
        <hr>

        <div class="row">

            <?php submit_section(); ?>
            <div class="form-group text-center"><label for="coursecode">
                    Course Code<input type="text" name="coursecode" class="form-control text-center"></label>
            </div>

            <div class="form-group text-center my-3"><label for="sectionname">
                    Section Name<input type="text" name="sectionname" class="form-control"></label>
            </div>

            <div class="form-group text-center"><label for="starttime">
                    Start Time<input type="time" name="starttime" class="form-control"></label>
            </div>

            <div class="form-group text-center my-3"><label for="endtime">
                    End Time<input type="time" name="endtime" class="form-control"></label>
            </div>

            <div class="form-group text-center"><label for="date">
                    Date<input type="date" name="date" class="form-control"></label>
            </div>

            <div class="form-group text-center">
                <input type="submit" name="submit" class="btn btn-lg btn-outline-light col-2 learn my-4" value="Add Section">
            </div>
        </div>

    </form>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "new_footer.php") ?>