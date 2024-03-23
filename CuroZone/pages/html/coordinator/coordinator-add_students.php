<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
$_SESSION['memberid'];
$_SESSION['role'];
$_SESSION['department_id'];
?> 
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Students - CuroZone</title>
	<link rel="icon" type="image/png" href="/images/logo.png">
	<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

<div class="topbar">
		<div class="blank"></div>
		<div class="rolenameimg">
			<img src="/images/nameCoordinator.png" alt="">
		</div>
		<div class="profile">
			<div class="profileIcon">
			<img src="../../../images/user.png" alt="" class="profile-menu-btn">
			</div>
			<div class="profiledropdown">
				<a href="coordinator-profile.php" class="sub-item"><i class="fas fa-user"></i>Profile</a>
				<a href="coordinator-settings.php" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
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
			<div class="item"><a href="coordinator-dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
			<div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-users"></i>Students
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a id="active-item" class="sub-item">Add Students</a>
					<a href="coordinator-manage_students.php" class="sub-item">Manage Students</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-graduations.php"><i class="fas fa-graduation-cap"></i>Graduation</a>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-address-card"></i>Batches
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_batches.php" class="sub-item">Add Batches</a>
					<a href="coordinator-manage_batches.php" class="sub-item">Manage Batches</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-pencil"></i>Exams
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-exam_schedules.php" class="sub-item">Exam Schedules</a>
					<a href="coordinator-manage_exam_admissions.php" class="sub-item">Manage Exam Admissions</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Assignments
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-assignment_schedules.php" class="sub-item">Assignment Schedules</a>
					<a href="coordinator-submitted_assignments.php" class="sub-item">Submitted Assignments</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-calendar"></i>Class Schedules
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_class_schedules.php" class="sub-item">Add Class Schedules</a>
					<a href="coordinator-manage_class_schedules.php" class="sub-item">Manage Class Schedules</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Results
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-assignment_results.php" class="sub-item">Assignment Results</a>
					<a href="coordinator-exam_results.php" class="sub-item">Exam Results</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-course_modules.php"><i class="fas fa-server"></i>Course Modules</a>
			</div>
			<div class="item"><a href="coordinator-course_materials.php"><i class="fas fa-book"></i>Course
					Materials</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Course Guidlines
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_guidlines.php" class="sub-item">Add Guidlines </a>
					<a href="coordinator-manage_guidlines.php" class="sub-item">Manage Guidlines</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Noticeboard
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_notices.php" class="sub-item">Add Notices</a>
					<a href="coordinator-noticeboard.php" class="sub-item">Noticeboard</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-commenting"></i>Messages
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-message_program_manager.php" class="sub-item">Program Manager</a>
					<a href="coordinator-message_Coordinators.php" class="sub-item">Coordinators</a>
					<a href="coordinator-message_lecturers.php" class="sub-item">Lecturers</a>
					<a href="coordinator-message_students.php" class="sub-item">Students</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-feedbacks.php"><i class="fas fa-rss"></i>Feedbacks</a></div>
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

	<div class="mainframe">
		<div class="welcome">
			<h2 style="text-align: center; padding: 5px;">Add Students</h2>
			<hr style="width: 50%; margin:auto;">
			<hr style="width: 50%; margin:auto;">
			<?php
			include('dbconnect.php');
			?>
			<form id="form1" name="form1" method="post" action="/pages/html/common/common-add_student_check.php">
				<table width="36%" class="filltbl">
					<tbody>
						<tr>
							<td width="35%" style="text-align: right"><label for="textfield">Student ID</label></td>
							<td width="8%" style="text-align: center">:</td>
							<td width="57%" style="text-align: left"><input type="text" name="studentidtxt" id="studentidtxt"></td>
						</tr>
						<tr>
							<td width="35%" style="text-align: right"><label for="textfield">First Name</label></td>
							<td width="8%" style="text-align: center">:</td>
							<td width="57%" style="text-align: left"><input type="text" name="firstnametxt" id="firstnametxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield6">Last Name</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="lastnametxt" id="lastnametxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="date2">Date of Birth</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="date" name="dobtxt" id="dobtxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select3">Gender</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="genderselect" id="genderselect" required>
									<option value="" selected disabled>--Select--</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield7">NIC</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="nictxt" id="nictxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield8">Phone</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="phonetxt" id="phonetxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield9">Email</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="email" name="emailtxt" id="emailtxt"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select4">Department</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="departmentselect" id="departmentselect" required>
									<option value="">--Select--</option>
									<?php
									$sql = "SELECT * FROM department_tbl";
									$result = mysqli_query($con, $sql);

									while ($row = $result->fetch_assoc()) {
									?>
										<option value="<?php echo $row['department_id'] ?>"><?php echo $row['name'] ?></option>
									<?php
									}
									?>
								</select></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select4">Course</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="courseselect" id="courseselect" required>
								</select></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select4">Batch</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="batchselect" id="batchselect" required>
								</select></td>
						</tr>
						<tr>
							<td class="submit-btn" colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Submit"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>

	<div class="bottom-bar">
		Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
	</div>

	<script>
		$(document).ready(function() {
			$('#departmentselect').on('change', function() {
				var department_id = this.value;
				//console.log(department_id);
				$.ajax({
					url: "/pages/html/common/common-get_course.php",
					type: "POST",
					data: {
						department_id: department_id
					},
					cache: false,
					success: function(result) {
						$('#courseselect').html(result);
					}
				})
			})
		})
	</script>

	<script>
		$(document).ready(function() {
			$('#courseselect').on('change', function() {
				var course_id = this.value;
				//console.log(course_id);
				$.ajax({
					url: "/pages/html/common/common-get_batch.php",
					type: "POST",
					data: {
						course_id: course_id
					},
					cache: false,
					success: function(result) {
						$('#batchselect').html(result);
					}
				})
			})
		})
	</script>

</body>

</html>

<?php
}
else{
    header("Location: /pages/html/login.html");
}
?>