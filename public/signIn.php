<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "newHeader.php") ?>
    <!-- Page Content -->
    <form class="" action="" method="post" enctype="multipart/form-data">

        <div class="container justify-content-center p-4">

            <div class="col-md-3 center">
                <p class="text-center larger">R E G I S T E R</p>
            </div>

            <hr>

            <?php submit_user(); ?>



            <div class="row text-center">
                <div class="col-md-6">
                    <div class="form-group text-center"><label for="firstname">
                            First Name<input type="text" name="firstname" class="form-control"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center"><label for="lastname">
                            Last Name<input type="text" name="lastname" class="form-control"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group text-center"><label for="email">
                            E Mail<input type="email" name="email" class="form-control"></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group text-center"><label for="password">
                            Password<input type="password" name="password" class="form-control"></label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center"><label for="university">
                    University<input type="text" name="university" class="form-control"></label>
            </div>

            <div class="form-group text-center my-3">
                <input type="submit" name="submit" class="btn btn-outline-light learn" value="Sign Up">
            </div>
        </div>
    </form>

    <div class="row mt-5">

        <button type="button" class="btn text-light learn" onclick="location.href='signup.php'">Are you an Instructor?</button>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>