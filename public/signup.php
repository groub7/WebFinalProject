<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "indexHeader.php") ?>
    <!-- Page Content -->
    <div class="container">

        <header>
            <h1 class="text-center">Sign Up</h1>
            <div class="col-sm-4 col-sm-offset-5">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php submit_user(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="instructor" checked>
                        <label class="form-check-label" for="instructor">
                            Instructor
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="student" onclick="location.href='signIn.php'">
                            <label class="form-check-label" for="student">
                                Student
                            </label>
                        </div>
                    </div>


                    <div class="form-group"><label for="firstname">
                            First Name<input type="text" name="firstname" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="lastname">
                            Last Name<input type="text" name="lastname" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="email">
                            E Mail<input type="email" name="email" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="password">
                            Password<input type="password" name="password" class="form-control"></label>
                    </div>

                    <div class="form-group"><label for="proficiency">
                            Proficiency<input type="text" name="proficiency" class="form-control"></label>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign Up">
                    </div>
                </form>
            </div>


        </header>


    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>