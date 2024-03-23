<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['batch_id'], $_SESSION['course_id'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['batch_id'];
    $_SESSION['course_id'];
    $_SESSION['department_id'];
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Assignment Submissions - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>

        <div class="topbar">
            <div class="blank"></div>
            <div class="rolenameimg">
                <img src="/images/nameStudent.png" alt="">
            </div>
            <div class="profile">
                <div class="profileIcon">
                    <img src="../../../images/user.png" alt="" class="profile-menu-btn">
                </div>
                <div class="profiledropdown">
                    <a href="student-profile.php" class="sub-item"><i class="fas fa-user"></i>Profile</a>
                    <a href="student-settings.php" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
                    <hr>
                    <a href="/pages/html/common/log_out.php" class="sub-item" id="logoutbtn"><i class="fas fa-sign-out"></i>Log Out</a>
                </div>
            </div>
        </div>

        <div class="side-bar">
            <header>
                <img src="/images/logo3.png" alt="">
            </header>

            <div class="menu">
                <div class="item"><a href="student-dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
                <div class="item"><a class="sub-btn"><i class="fas fa-credit-card"></i>Payment
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="student-make_payment.php" class="sub-item">Make Payment</a>
                        <a href="student-view_payment_status.php" class="sub-item">View Payment Status</a>
                    </div>
                </div>
                <div class="item"><a href="student-graduation.php"><i class="fas fa-graduation-cap"></i>Graduation</a></div>
                <div class="item"><a class="sub-btn"><i class="fas fa-pencil"></i>Exams
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="student-exam_schedules.php" class="sub-item">Exam Schedules</a>
                        <a href="student-exam_admissions.php" class="sub-item">Exam Admissions</a>
                    </div>
                </div>
                <div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-code"></i>Assignments
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="student-assignment_schedules.php" class="sub-item">Assignment Schedules</a>
                        <a id="active-item" class="sub-item">Assignment Submissions</a>
                    </div>
                </div>
                <div class="item"><a href="student-class_schedules.php"><i class="fas fa-calendar"></i>Class Schedules</a></div>
                <div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Results
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="student-assignment_results.php" class="sub-item">Assignment Results</a>
                        <a href="student-exam_results.php" class="sub-item">Exam Results</a>
                    </div>
                </div>
                <div class="item"><a href="student-course_modules.php"><i class="fas fa-server"></i>Course Modules</a></div>
                <div class="item"><a href="student-course_materials.php"><i class="fas fa-book"></i>Course Materials</a></div>
                <div class="item"><a href="student-course_guidlines.php"><i class="fas fa-bars"></i>Course Guidlines</a></div>
                <div class="item"><a href="student-noticeboard.php"><i class="fas fa-flag"></i>Noticeboard</a></div>
                <div class="item"><a class="sub-btn"><i class="fas fa-commenting"></i>Messages
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="student-message_lecturers.php" class="sub-item">Lecturers</a>
                        <a href="student-message_coordinators.php" class="sub-item">Coordinators</a>
                    </div>
                </div>
                <div class="item"><a href="student-call_center.php"><i class="fas fa-phone"></i>Call Center</a></div>
                <div class="item"><a href="student-send_feedbacks.php"><i class="fas fa-rss"></i>Send Feedbacks</a></div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.sub-btn').click(function() {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            })
        </script>
        <?php include('dbconnect.php'); ?>
        <div class="mainframe">
            <div class="welcome">
                <h2 style="text-align: center; padding: 5px;">Assignment Submissions</h2>
                <hr style="width: 50%; margin:auto;">
                <hr style="width: 50%; margin:auto;">
            </div>
            <?php
            $assignment_id = $_GET['assignment_id'];
            $batch_id = $_GET['batch_id'];
            $sql1 = "SELECT * FROM assignment_tbl WHERE batch_id='" . $batch_id . "' AND assignment_id='" . $assignment_id . "'";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $sql2 = "SELECT * FROM module_tbl WHERE module_id='" . $row1['module_id'] . "'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            if ($row1['type'] == "0") {
                $type = "Coursework - Individual";
            } elseif ($type == "1") {
                $type = "Coursework - Group";
            } elseif ($type == "2") {
                $type = "Presentation";
            }
            $_SESSION['assignment_id'] = $row1['assignment_id'];
            ?>
            <form id='form2' name='form2' method='post' action='student-upload_assignment_check.php' enctype="multipart/form-data">
                <table width="100%" class="filltbl">
                    <tbody>
                        <tr>
                            <td width="44%" style="text-align: right"><label for="textfield3">Module ID: </label></td>
                            <td style="text-align: left"><input type="text" name="moduleid" id="moduleid" value="<?php echo $row1['module_id'] ?>" disabled>
                        </tr>
                        <tr>
                            <td width="44%" style="text-align: right"><label for="textfield3">Module : </label></td>
                            <td style="text-align: left"><input type="text" name="module" id="module" value="<?php echo $row2['name'] ?>" disabled>
                        </tr>
                        <tr>
                            <td style="text-align: right"><label for="textfield4">Assignment ID : </label></td>
                            <td style="text-align: left"><input type="text" name="assignmentidtxt" id="assignmentidtxt" value="<?php echo $row1['assignment_id'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><label for="textfield4">Type : </label></td>
                            <td style="text-align: left"><input type="text" name="type" id="type" value="<?php echo $type; ?>" disabled>
                        </tr>
                        <tr>
                            <td style="text-align: right"><label for="textfield4">Due Date : </label></td>
                            <td style="text-align: left"><input type="date" name="duedate" id="duedate" min="" value="<?php echo $row1['due_date'] ?>" disabled></td>
                        </tr>
                        <tr>
                        <tr>
                            <td style="text-align: right"><label for="textfield4">File : </label></td>
                            <td style="text-align: left"><input type="file" id="file" name="file" required></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Add"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php
            ?>
        </div>

        <div class="bottom-bar">
            Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
        </div>

    </body>

    </html>

<?php
} else {
    header("Location: /pages/html/login.html");
}
?>