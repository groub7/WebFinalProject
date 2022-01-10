<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../public/index.php");
}
if(!isset($_SESSION['is_instructor'])){
    redirect("../public/index.php");
}
?>
    <!-- Page Content -->
    <div class="container">
        <header>
            <h1 class="text-center">Add Section</h1>
            <div class="col-sm-4 col-sm-offset-5">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php submit_section(); ?>

                    <div class="form-group"><label for="coursecode">
                            Course Code<input type="text" name="coursecode" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="sectionname">
                            Section Name<input type="text" name="sectionname" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="starttime">
                            Start Time<input type="time" name="starttime" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="endtime">
                            End Time<input type="time" name="endtime" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="date">
                            Date<input type="date" name="date" class="form-control"></label>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Section">
                    </div>
                </form>
            </div>
        </header>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>