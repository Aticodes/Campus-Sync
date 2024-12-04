<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Information Form</title>
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
    <div class="container">
        
<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> ADD STUDENTS</h4>

              <!-- Basic Layout -->
              <div class="row">
                
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Information</h5>
                      <!-- <small class="text-muted float-end">Merged input group</small> -->
                    </div>
                    <div class="card-body">
                      <form action="#" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">Email/Username</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            
                            <input
                              type="text"
                              class="form-control" 
                              name="email"
                              placeholder="JohnDoe@mail.com"
                              aria-label="JohnDoe@mail.com"
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="s_firstname"
                              placeholder="John"
                              aria-label="John"
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">Last Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="s_lastname"
                              placeholder="Doe"
                              aria-label="Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                    ></span>
                                    <input
                                    type="text" class="form-control" name="phone_no"
                                    class="form-control phone-mask"
                                     placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                    required
                                    />
                                </div>
                        </div>
                        <div class="col-md-6">
                            
                            <label for="sex"  class="form-label">Sex:</label>
                               
                                <select class="form-select"  aria-label="Default select example" name="sex" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-6">
                        
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" name="dob" required>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="admission_date">Admission Date:</label>
                                <input type="date" class="form-control" name="admission_date" required>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Address 1</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="address1"
                              placeholder="XYZ street , city ,state."
                              aria-label="XYZ street , city ,state."
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Address 2</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="address2"
                              placeholder="XYZ street , city ,state."
                              aria-label="XYZ street , city ,state."
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Father's Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="father_name" 
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Mother's Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" class="form-control" name="mother_name" 
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              required
                            />
                          </div>
                        </div>
                        </div>
                    
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label" for="basic-icon-default-phone">Father's Phone No</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                    ></span>
                                    <input
                                    type="text" class="form-control" name="father_phone" 
                                     placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="basic-icon-default-fullname">Blood Group</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-user"></i
                                    ></span>
                                    <input
                                    type="text" class="form-control" name="blood_group" 
                                    placeholder="o+"
                                    aria-label="o+"
                                    aria-describedby="basic-icon-default-fullname2"
                                    required
                                    />
                                </div>
                            </div>
                        </div>  
                        <div class="form-group">
                    <label for="formFile">Passport Size Photo</label><br>
                    <input type="file" class="form-control" id="photo" name="note" required>
                </div>   
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Remarks</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            
                            <textarea
                            class="form-control" name="remarks"
                              placeholder="Hi, Do you have a moment to talk Joe?"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                            ></textarea>
                          </div>
                        </div>
                        <center><button type="submit" class="btn btn-primary">Submit</button></center>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            
            <!-- / Content -->

            <!-- Footer -->
          
          </div>
          <!-- Content wrapper -->
               
            </div>
        </div>
    

    <?php
    // Ensure that the form is submitted using POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        // Get values from the form
        $email = $_POST["email"];
        // $user_id = $_POST["user_id"];
        $s_firstname = $_POST["s_firstname"];
        $s_lastname = $_POST["s_lastname"];
        $dob = $_POST["dob"];
        $address1 = $_POST["address1"];
        $address2 = $_POST["address2"];
        $phone_no = $_POST["phone_no"];
        $father_name = $_POST["father_name"];
        $mother_name = $_POST["mother_name"];
        $father_phone = $_POST["father_phone"];
        $admission_date = $_POST["admission_date"];
        $blood_group = $_POST["blood_group"];
        $sex = $_POST["sex"];
        $remarks = $_POST["remarks"];


        if (isset($_FILES['note'])) {
          $t = time();
  
          $target = "studentid/" . date('d,m,y' . $t) . $_FILES["note"]["name"];
          move_uploaded_file($_FILES["note"]["tmp_name"], $target);
  


        $sql = "INSERT INTO `user_master`( `username`, `password`, `type`) VALUES ('$email','$dob',3)";
        if (mysqli_query($conn,$sql)) {
           
           $user_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO `student_master`( `user_id`, `s_firstname`, `s_lastname`, `dob`, `address1`, `address2`, `phone_no`, `father_name`, `mother_name`, `father_phone`, `admission_date`, `blood_group`, `sex`, `remarks`,`img`) 
        VALUES ('$user_id', '$s_firstname', '$s_lastname', '$dob', '$address1', '$address2', '$phone_no', '$father_name', '$mother_name', '$father_phone', '$admission_date', '$blood_group', '$sex', '$remarks','$target')";

        if (mysqli_query($conn,$sql)) {
          ?><script>
          Swal.fire({
       title: "Student Added Successful",
       icon: "success"
     });</script><?php
        } else {
            echo "Error: " . $conn->error;
        }
        } else {
            echo "Error: " . $conn->error;
        }
        // Prepare and execute the SQL statement
        

       } // Close the database connection
        $conn->close();
    }
    ?>
<?php 
include "footer.php";
?>
</div>
</main>
</body>
</html>