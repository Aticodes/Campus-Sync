<?php
include "db.php";
// Include your database connection file here


// Handle form submissions

    // Filter values

    $query = "SELECT * FROM professor_subject JOIN professor_master on professor_subject.p_id = professor_master.professor_id JOIN subject on professor_subject.s_id = subject.subject_id JOIN courses on subject.c_id = courses.c_id";
    $result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Data</title>
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

<body>
<?php
include "sidebar.php";

?>


 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW PROFESSOR SUBJECT</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">Professor id</th>
                    <th scope="col">Professor Name</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Year</th>
                    <th scope="col">Sem</th>
                    <th scope="col">Course</th>
              
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['professor_id']; ?></th>
                        <td><?php echo $row['p_firstname']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['sem']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
 </div>
 <script>
                    // JavaScript to handle dynamic population of courses based on selected department
                    document.getElementById('department_id').addEventListener('change', function() {
                        var departmentId = this.value;

                        // Use AJAX to fetch courses based on the selected department
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'get_courses.php?department_id=' + departmentId, true);
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Update the courses dropdown with the fetched courses
                                document.getElementById('course_id').innerHTML = xhr.responseText;
                            } else {
                                console.error('Failed to fetch courses.');
                            }
                        };
                        xhr.send();
                    });
                </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-Uo7fATBz0G6BRKK5U7Vu4dXP9uZQjxkhjq0lFXwF8eFfOgC8OdZMz2a9aCWoJgx"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <?php 
include "footer.php";
?>
</div>
</body>

</html>
