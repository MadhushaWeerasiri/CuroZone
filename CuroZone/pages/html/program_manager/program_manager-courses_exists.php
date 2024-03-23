<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Course - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');
        ?>
        <div class="div1-1">
            <img src="/images/error.png" alt="error image">
            <h1 class="error">Ooops!</h1>
            <h4>Course allready exists.</h4>
            <button onclick="location.href='program_manager-add_courses.php'" type="button">OK</button>
        </div>

        ?>
    </body>

    </html>
<?php
} else {
    header("Location: /pages/html/login.html");
}
?>