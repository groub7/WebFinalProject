<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="studentIndex.php">Mydemy ™</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="studentIndex.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="studentIndex.php"><span class="glyphicon glyphicon-plus-sign"></span> Courses</a></li>
            <li><a href="cancelEnroll.php"><span class="glyphicon glyphicon-plus-sign"></span> Enrollment</a></li>
            <li><a href="addroom.php"><span class="glyphicon glyphicon-asterisk"></span> Room</a></li>
            <li><a href="addtime.php"><span class="glyphicon glyphicon-time"></span> Time</a></li>
            <li><a href="list.php"><span class="glyphicon glyphicon-list"></span> List</a></li>
            <li><a href="tablelist.php"><span class="glyphicon glyphicon-calendar"></span> Schedule</a></li>

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