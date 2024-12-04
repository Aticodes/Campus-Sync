<?php
    // Ensure that the form is submitted using POST method
    if (isset($_POST['add'])) {
       

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