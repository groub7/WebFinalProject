<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "indexHeader.php") ?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
          <h2><?php display_message(); ?></h2>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <?php login_user(); ?>
                <div class="form-group"><label for="">
                    E-mail<input type="text" name="email" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>  


    </header>


        </div>

    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>