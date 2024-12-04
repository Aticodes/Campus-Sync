<?php
// Include your database connection file here
include 'db.php';

// Fetch data from the student_master table
$query = "SELECT * FROM student_master";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor</title>
    <!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

</head>

<body>
<div class="container">
<?php 
include "sidebar.php";
?>
<main>
           <h1>Professor</h1>

           <div class="date">
             <input type="date" >
           </div>

        <div class="insights">

           <!-- start seling -->
           <div class="sales" style="background-color:#a9afe4">
            <a href="add_professor.php">
               <!-- <span class="material-symbols-sharp">trending_up</span> -->
                    <div class="middle">

                        <div class="left">
                            <h3>Click here to</h3>
                            <h1>Add professor</h1>
                        </div>
                    </div>
               <!-- <small>Last 24 Hours</small> -->
            </a>
                </div>
           <!-- end seling -->

               <!-- start seling -->
               <div class="income" style="background-color:#a9afe4">
               <a href="view_professor.php">
                <!-- <span class="material-symbols-sharp">stacked_line_chart</span> -->
                <div class="middle">
 
                  <div class="left">
                    <h3>Click here to</h3>
                    <h1>View professor</h1>
                  </div>
                   
 
                </div>
            </a>
                <!-- <small>Last 24 Hours</small> -->
             </div>
            <!-- end seling -->

               <!-- start seling -->
              

             
               <!-- start seling -->
               <div class="income" style="background-color:#a9afe4">
                <a href="add_professor_subject.php">
                <!-- <span class="material-symbols-sharp">stacked_line_chart</span> -->
                <div class="middle">
 
                  <div class="left">
                    <h3>Click here to</h3>
                    <h1>Add professor subject</h1>
                  </div>
                   
 
                </div>
                <!-- <small>Last 24 Hours</small> -->
            </a>
             </div>

             
               <!-- start seling -->
               <div class="income" style="background-color:#a9afe4">
                <a href="view_professor_subject.php">
                <!-- <span class="material-symbols-sharp">stacked_line_chart</span> -->
                <div class="middle">
 
                  <div class="left">
                    <h3>Click here to</h3>
                    <h1>View professor subject</h1>
                  </div>
                   
 
                </div>
                <!-- <small>Last 24 Hours</small> -->
            </a>
             </div>

             <!-- END -->
        </div>
<?php 
include "footer.php";
?>
</main>

<script src="script.js"></script>
</body>
</html>