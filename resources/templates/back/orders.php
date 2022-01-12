<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Sections

</h1>
</div>

<div class="row">
    <div>
        <span style="font-size: large">Filter:</span>
        <form method="post" action="index.php?orders" id="filter">
            <label for="instructor">Instructor:</label>
            <select name="instructor" id="instructor">
                <option value="31" selected></option>
                <?php
                $result = mysqli_query($connection, "select * from instructor inner join user u on instructor.instructor_id = u.user_id");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'. $row['user_id'] .'">'. $row['first_name'] .' '. $row['last_name'] .'</option>';
                }
                ?>
            </select>
            <label for="student">Student:</label>
            <select name="student" id="student">
                <option value="31" selected></option>
                <?php
                $result = mysqli_query($connection, "select * from student inner join user u on student.student_id = u.user_id");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'. $row['user_id'] .'">'. $row['first_name'] .' '. $row['last_name'] .'</option>';
                }
                ?>
            </select>
            <label for="start_date">Start:</label>
            <input type="date" id="start_date" name="start_date">
            <label for="end_date">End:</label>
            <input type="date" id="end_date" name="end_date">
            <input class="button1" style="color: black" type="submit" value="Filter" id="button1">
        </form>
    </div>
<table class="table table-hover">
    <thead>

      <tr>
           <th>Student Name</th>
           <th>Instructor Name</th>
           <th>Section Name</th>
           <th>Start Time</th>
           <th>End Time</th>
           <th>Date</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $string = "SELECT * FROM sections 
        INNER JOIN enrolls e on sections.section_id = e.section_id
        INNER JOIN instructor i on sections.instructor_id = i.instructor_id
        INNER JOIN student s on e.student_id = s.student_id
        INNER JOIN user u on i.instructor_id = u.user_id
        WHERE is_avaliable = 0 ";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['instructor'] != 31) {
                $string = $string . " AND i.instructor_id = " . $_POST['instructor'] . " ";
            }
            if ($_POST['student'] != 31) {
                $string = $string . " AND s.student_id = " . $_POST['student'] . " ";
            }
            if ($_POST['start_date'] != '') {
                $string = $string . " AND sections.date >= '" . $_POST['start_date'] . "' ";
            }
            if ($_POST['end_date'] != '') {
                $string = $string . " AND sections.date <= '" . $_POST['end_date'] . "' ";
            }
        }

        $string = $string . " ORDER BY date DESC";
        $query = query($string);
            confirm($query);
            while($row = fetch_array($query)){
                $student_id = $row['student_id'];
                $instructor_name = $row['first_name'];
                $section_name = $row['section_name'];
                $start_time = $row['start_time'];
                $end_time = $row['end_time'];
                $date = $row['date'];
                $query2 = query("SELECT * FROM user WHERE user_id = '$student_id'");
                confirm($query2);
                while($row = fetch_array($query2)){
                    $student_name = $row['first_name'];
                }

                $user = <<<DELIMITER
    <tr>
    <td>{$student_name}</td>
    <td>{$instructor_name}</td>
    <td>{$section_name}</td>
    <td>{$start_time}</td>
    <td>{$end_time}</td>
    <td>{$date}</td>
DELIMITER;
            echo $user;
        }
        ?>
    </tbody>
</table>
</div>