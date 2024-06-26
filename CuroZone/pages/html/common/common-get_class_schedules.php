<?php
session_start();
include 'dbconnect.php';

$course_id = $_GET['course_id'];
$batch_id = $_GET['batch_id'];
$sql1 = "SELECT * FROM class_shedule_tbl WHERE batch_id = '" . $batch_id . "'";
$result1 = mysqli_query($con, $sql1);
?>
<table cellspacing="10" cellpadding="5" width="80%">
    <thead>
        <tr>
            <th style="border: 0; background:transparent"></th>
            <th>Module</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
            <?php
            if ($_SESSION['role'] == '1') {
            ?>
                <th>Operations</th>
            <?php
            }
            ?>
        </tr>
    <tbody>
        <?php
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $date = strtotime($row1['classdate']);
            $day = strtoupper(date("D", $date));
            $sql2 = "SELECT * FROM module_tbl WHERE module_id = '" . $row1['module_id'] . "'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo "<tr>";
            echo "<th>$row1[classdate] - $day</th>";
            echo "<td>$row2[name] ($row1[module_id])</td>";
            echo "<td>$row1[start_time]</td>";
            echo "<td>$row1[end_time]</td>";
            echo "<td>$row1[classlocation]</td>";
            if ($_SESSION['role'] == '1') {
        ?>
                <td><button type="button" value="<?php echo $batch_id ?>" data-value="<?php echo $row1['classlocation']; ?>" data-value2="<?php echo $row1['time_period']; ?>" data-value3="<?php echo $row1['classdate']; ?>" data-value4="<?php echo $row1['lecturer_id']; ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
        <?php
            }
        }
        ?>

        <script>
            $(document).ready(function() {
                $('.confirm_del_btn').click(function(e) {
                    e.preventDefault();
                    var id1 = $(this).val();
                    var id2 = $(this).data("value");
                    var id3 = $(this).data("value2");
                    var id4 = $(this).data("value3");
                    var id5 = $(this).data("value4");
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this data!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "coordinator-class_schedule_delete.php?id1=" + id1 + "&id2=" + id2 + "&id3" + id3 + "&id4" + id4 + "&id5" + id5,
                                    success: function(response) {
                                        swal("Class Schedule deleted!", {
                                            icon: "success",
                                        }).then((confirmed) => {
                                            window.location.reload();
                                        });
                                    }
                                });
                            } else {

                            }
                        });
                });
            });
        </script>