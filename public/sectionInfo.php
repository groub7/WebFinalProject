<?php require_once("../resources/config.php");
include(TEMPLATE_FRONT . DS . "new_student_header.php");
$section_id = $_GET['section_id'];
$result = mysqli_query($connection, "select * from sections s
         inner join user u on u.user_id = s.instructor_id
         inner join course c on s.course_id = c.course_id 
         where s.section_id=" . $section_id);
$row = mysqli_fetch_assoc($result);
?>

<body>
<div class="card container text-center" style="background: rgb(178,141,207);
background: linear-gradient(180deg, rgba(178,141,207,1) 0%, rgba(143,90,182,1) 100%); border-radius: 40px; margin-top: 20px;">
    <div class="text-center mt-5">
        <?= '<img class="card-img-top" style="height: 300px; width: 300px" src="/public/img/' . $row['user_id'] . '.png" alt="Card image cap">'; ?>
    </div>
    <div class="card-body p-5" style="font-size: 2.5rem;">
        <h1 class="card-title"><b>ENG101 - English Grammar</b></h1>
        <p class="card-text">
            <b>Instructor: </b><?= $row['first_name'] . ' ' . $row['last_name'] ?>
            <br><b>Subject: </b><?= $row['name'] ?>
            <br><b>Start Time: </b><?= date_format(date_create($row['start_time']), 'H:i') ?>
            <br><b>End Time: </b><?= date_format(date_create($row['end_time']), 'H:i') ?>
            <br><b>Date: </b><?= $row['date'] ?>
        </p>
        <?php echo '<a href="enrollStudent.php/?section_id='. $row['section_id'] .'" class="btn text-light btn-lg learn" style="border-radius: 20px">Enroll</a>';
        ?>
    </div>
</div>
</body>
</html>
