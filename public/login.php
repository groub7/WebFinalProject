<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "newHeader.php") ?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="container justify-content-center p-4">

                    <div class="col-md-3 center" >
                        <p class="text-center larger" >L O G I N</p>
                    </div>
                    <hr>
                    <h2>
                        <?php display_message(); ?>
                    </h2>
                    <div class="row">

                        <?php login_user(); ?>

                        <div class="form-group text-center mt-3"><label for="">
                                E-mail<input size="30px" type="text" name="email" class="form-control loginInput"></label>
                        </div>

                        <div class="form-group text-center my-3"><label for="password">
                                Password<input size="30px" type="password" name="password" class="form-control loginInput"></label>
                        </div>

                        <div class="form-group text-center ">
                            <input type="submit" name="submit" class="btn btn-lg btn-outline-light col-2 learn" value="Login">
                        </div>
                    </div>
                </div>


            </form>
        </div>  

    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "new_footer.php") ?>