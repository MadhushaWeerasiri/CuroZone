<?php
session_start();
if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $course_id = $_SESSION['course_id'];
    $module_id = $_SESSION['module_id'];
    $employee_id = $_POST['lecturerselect'];
    include('dbconnect.php');
    $sql1 = "SELECT * FROM module_lecturer_tbl WHERE course_id='" . $course_id . "' AND module_id='" . $module_id . "'";
    $result1 = mysqli_query($con, $sql1);
    $count1 = mysqli_num_rows($result1);
    if ($count1) {
        $sql2 = "UPDATE module_lecturer_tbl SET leturer_id='" . $employee_id . "' WHERE course_id='" . $course_id . "' AND module_id='" . $module_id . "'";
        $result2 = mysqli_query($con, $sql2);
        if ($result2) {
?>
            <div class="div1-1">
                <div class="errormsg">
                    <f1>Lecturer assigned successfully</f1>
                </div>
            </div>
        <?php
            header("refresh:1;URL='program_manager-manage_modules.php'/");
        } else {
        ?>
            <div class="div1-1">
                <div class="errormsg">
                    <f1>Lecturer assign unsuccessfull</f1>
                </div>
            </div>
        <?php
            header("refresh:1;URL='program_manager-manage_modules.php'/");
        }
    } else {
        $sql2 = "INSERT INTO module_lecturer_tbl VALUES ('" . $module_id . "','" . $employee_id . "','" . $course_id . "')";
        $result2 = mysqli_query($con, $sql2);
        if ($result2) {
        ?>
            <div class="div1-1">
                <div class="errormsg">
                    <f1>Lecturer assigned successfully</f1>
                </div>
            </div>
        <?php
            header("refresh:1;URL='program_manager-manage_modules.php'/");
        } else {
        ?>
            <div class="div1-1">
                <div class="errormsg">
                    <f1>Lecturer assign unsuccessfull</f1>
                </div>
            </div>
<?php
            header("refresh:1;URL='program_manager-manage_modules.php'/");
        }
    }
} else {
    header("Location: /pages/html/login.html");
}
?>