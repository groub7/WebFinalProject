<?php require_once("resources/config.php"); ?>
<?php include("/resources/templates/front/newHeader.php") ?>


<div class="container sa rounded mt-5 p-4" style="box-shadow: 15px 15px #10002B;">
    <div class="row">
        <div class="col-md-6">
            <p class="big text-center" style="font-size: 50px;">Get <span style="font-weight: 800;"> English Lessons.</span> <br><br> From <span
                    style="font-weight: 800;">
						Professionals.</span> <br><br> For <span style="font-weight: 800;">
						Free.</span></p>
        </div>

        <div class="col-md-6">
            <img class="img-fluid d-none d-md-block" src="public/img/teacher.jpg" alt="">
        </div>
    </div>
</div>

<div class="container justify-content-center center my-5">
    <div class="learn" style="border-style: inset; padding-top: 15px; ;">
        <p class="text-center larger" >L&nbsp E&nbsp A&nbsp R&nbsp N  &nbsp&nbsp&nbsp&nbsp  M&nbsp O&nbsp R&nbsp E</p>
    </div>
    <div class="center">
        <!-- <a href="#cards"><img class="center mb-5" src="arrow.png" alt="" style="width: 200px;"></a> -->
        <a href="#cards"><div class="containers center">
                <div class="image">
                    <img src="public/img/arrow.png" class="img" style="width: 200px;" alt="">
                </div>
            </div>
        </a>

    </div>
</div>

<div class=" container cards mb-5">
    <p class="text-center larger " style="font-weight: 600; color:white; font-size: 40px;">Our Instructors</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100" style="box-shadow: 15px 15px rgba(16, 0, 43, 0.6);">
                <img src="public/img/leo.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Leonardo DiCaprio</h5>
                    <p class="card-text text-center">MEF University <br> <br> ENG202 - B2 Level </p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="box-shadow: 15px 15px rgba(16, 0, 43, 0.6);">
                <img src="public/img/24.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Sultan Nezihe TURHAN</h5>
                    <p class="card-text text-center">Galatasaray University <br><br> ENG301 - C1 Level </p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="box-shadow: 15px 15px rgba(16, 0, 43, 0.6);">
                <img src="public/img/berkgokberk.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Berk GÖKBERK</h5>
                    <p class="card-text text-center">Boğaziçi University <br><br>ENG302 - C2 Level </p>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="cards"></div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<?php include(TEMPLATE_FRONT . DS . "new_footer.php") ?>
