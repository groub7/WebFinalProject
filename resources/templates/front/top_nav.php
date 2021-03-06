<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="loginIndex.php">Mydemy ™</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="loginIndex.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="addsubject.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Section</a></li>
            <li><a href="cancelInstructorSection.php"><span class="glyphicon glyphicon-plus-sign"></span> Cancel Section</a></li>
            <li><a href="addcourse.php"><span class="glyphicon glyphicon-plus-sign"></span> Course</a></li>
            <li><a href="drawCalendar.php"><span class="glyphicon glyphicon-calendar"></span> Schedule</a></li>

            <li class="dropdown -align-right">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo isset($_SESSION['f_name']) ? $_SESSION['f_name'] : ""?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php if( isset($_SESSION['f_name']) && !empty($_SESSION['f_name'])){?>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signIn.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                    <?php } ?>
                    <li class="divider"></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
    <!-- /.navbar-collapse -->