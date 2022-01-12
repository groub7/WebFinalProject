<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "studentHeader.php") ?>
<?php
$connection = mysqli_connect("localhost", "root", "", "mydemy");

$current_day = 27;
$is_current_month = false;

$result = mysqli_query($connection, "select day(date) from sections");
$result = mysqli_query($connection, "select c.course_code, s.date, s.start_time, 
s.end_time from sections s inner join course c on s.course_id = c.course_id");

echo '<div class="calendar">';
echo '<div class="calendar__header">
        <div>mon</div>
        <div>tue</div>
        <div>wed</div>
        <div>thu</div>
        <div>fri</div>
        <div>sat</div>
        <div>sun</div>
    </div>';

for ($i = 0; $i < 6; $i++) {
    echo '<div class="calendar__week">';
    for ($j = 0; $j < 7; $j++) {
        echo '<div class="calendar__day day">' . $current_day . ' ';

        $result = mysqli_query($connection, "select c.course_code, s.date, s.start_time, 
        s.end_time from sections s inner join course c on s.course_id = c.course_id 
        where day(s.date)=". $current_day ." and month(s.date)=1 and s.is_avaliable=1");

        while ($row = mysqli_fetch_assoc($result)) {
            $start_time = date_format(date_create($row['start_time']), 'H:i');
            $end_time = date_format(date_create($row['end_time']), 'H:i');
            echo '<br><a class="btn btn-danger" style="margin: 2px; font-size: 1.1rem">'. $row['course_code'] .' '. $start_time .'-'. $end_time .'</a>';
        }

        echo '</div>';
        $current_day++;
        if ($current_day > 31) {
            $current_day = 1;
        }
    }
    echo '</div>';
}


echo '</div>';
include(TEMPLATE_FRONT . DS . "footer.php");