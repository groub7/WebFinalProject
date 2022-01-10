<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Add Admin
            <?php add_admin();?>
        </h1>
    </div>



    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">
                <label for="first_name">First Name </label>
                <input type="text" name="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name </label>
                <input type="text" name="last_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>


        </div>


        <aside id="admin_sidebar" class="col-md-6">
            <div class="form-group">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Register">
            </div>

</div>



