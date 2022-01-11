<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "studentHeader.php") ?>
<?php
if(!isset($_SESSION['f_name'])){
    redirect("../public/index.php");
}
if((int)$_SESSION['status'] != 1){
    redirect("../public/index.php");
}
?>

<body>
<h1 class="page-header">
    Sections
</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Section Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Date</th>
                <th scope="col">Cancel</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydemy";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("connection failed: " . $conn->connect_error);
            }
            $userID = $_SESSION['user_id'];


            $getOrders = "SELECT * FROM `enrolls` WHERE student_id=$userID ORDER BY `enroll_id`";
            $result = mysqli_query($conn, $getOrders);
            while ($row = mysqli_fetch_assoc($result)) {

                $enrollID = $row['enroll_id'];
                $studentID = $row['student_id'];
                $section_id = $row['section_id'];
                $status = $row['status'];

                $sql9 = "SELECT * FROM sections WHERE section_id=$section_id";

                $query = mysqli_query($conn, $sql9);
                $sql4 = mysqli_fetch_assoc($query);
                $sectionName = $sql4['section_name'];
                $startTime = $sql4['start_time'];
                $endTime = $sql4['end_time'];
                $date = $sql4['date'];

                echo '
              <tr>
              <td>' . $status . '</td>
              <td>' . $sectionName . '</td>
              <td>' . $startTime . '</td>
              <td>' . $endTime . '</td>
              <td>' . $date . '</td>
              <td>
              <form action="cancel.php" method="get">
              <input type="hidden" name="sectionID" value=' . $section_id . '>
              <input type="hidden" name="enrollID" value=' . $enrollID . '>
            <button name="submit" value="1" type="submit">&#10060;</button>
            </form>
            </td>
            </tr>
            ';
            }
            ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
</html>