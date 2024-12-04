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

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <style>
      /* input.ng-invalid{border:1px solid red;} */
    </style>
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
                    <form ng-app="myApp" ng-controller="validateCtrl" ng-submit="submitForm()" enctype="multipart/form-data" id="registerform" name="registerform">
    <!-- Form fields go here -->

   <div class="mb-3 row">
                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">Email</label>
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
                              ng-model="email"
                              pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                              ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.email.$dirty || registerform.email.$touched">
                            <span class="form-text text-danger" ng-show="registerform.email.$error.required">Email cannot be Empty</span>
                            <span class="form-text text-danger" ng-show="registerform.email.$error.pattern">Please Enter a valid Email address</span>
                          </span>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text" 
                              class="form-control" 
                              name="s_firstname"
                              placeholder="John"
                              aria-label="John"
                              aria-describedby="basic-icon-default-fullname2"
                              ng-model="s_firstname"
                              pattern="[a-zA-Z]{1,}"
                              ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.s_firstname.$dirty || registerform.s_firstname.$touched">
                            <span class="form-text text-danger" ng-show="registerform.s_firstname.$error.required">First Name cannot be Empty</span>
                            <span class="form-text text-danger" ng-show="registerform.s_firstname.$error.pattern">Name cannot contain Numbers</span>
                          </span>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="basic-icon-default-fullname">Last Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                            type="text" 
                            class="form-control" 
                            name="s_lastname"
                            placeholder="Doe"
                            aria-label="Doe"
                            aria-describedby="basic-icon-default-fullname2"
                            ng-model="s_lastname"
                            pattern="[a-zA-Z]{1,}"
                            ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.s_lastname.$dirty || registerform.s_lastname.$touched">
                            <span class="form-text text-danger" ng-show="registerform.s_lastname.$error.required">Last Name cannot be Empty</span>
                            <span class="form-text text-danger" ng-show="registerform.s_lastname.$error.pattern">Name cannot contain Numbers</span>
                          </span>
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
                                    type="text" 
                                    class="form-control" 
                                    name="phone_no"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                    ng-model="phone_no"
                                    pattern="^((\\+91-?)|0)?[0-9]{10}$"
                                    ng-required="true"
                                    />
                                </div>
                                <span ng-show="registerform.phone_no.$dirty || registerform.phone_no.$touched">
                                  <span class="form-text text-danger" ng-show="registerform.phone_no.$error.required">Phone Number cannot be empty</span>
                                  <span class="form-text text-danger" ng-show="registerform.phone_no.$error.pattern">Please enter a valid phone number</span>
                                </span>
                        </div>
                        <div class="col-md-6">
                            
                            <label for="sex"  class="form-label">Sex:</label>
                               
                                <select class="form-select" aria-label="Default select example" name="sex" ng-model="sex" ng-required="true">
                                    <!-- <option selected>Open this select menu</option> -->
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span ng-show="registerform.sex.$dirty || registerform.sex.$touched">
                                  <span class="form-text text-danger" ng-show="registerform.sex.$error.required">Gender is required</span>
                                </span>
                        </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-6">
                        
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" name="dob" ng-model="dob" ng-required="true">
                        <span ng-show="registerform.dob.$dirty || registerform.dob.$touched">
                          <span class="form-text text-danger" ng-show="registerform.dob.$error.required">Date of Birth is required</span>
                        </span>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="admission_date">Admission Date:</label>
                                <input type="date" class="form-control" name="admission_date" ng-model="admission_date" ng-required="true">
                        <span ng-show="registerform.admission_date.$dirty || registerform.admission_date.$touched">
                          <span class="form-text text-danger" ng-show="registerform.admission_date.$error.required">Admission Date is required</span>
                        </span> 
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
                            type="text" 
                            class="form-control" 
                            name="address1"
                            placeholder="XYZ street , city ,state."
                            aria-label="XYZ street , city ,state."
                            aria-describedby="basic-icon-default-fullname2"
                            ng-model="address1" 
                            ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.address1.$dirty || registerform.address1.$touched">
                                  <span class="form-text text-danger" ng-show="registerform.address1.$error.required">Address is required</span>
                          </span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Address 2</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text" 
                              class="form-control"
                              name="address2"
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
                              type="text" 
                              class="form-control" 
                              name="father_name" 
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              ng-model="father_name"
                              pattern="[a-zA-Z]{1,}"
                              ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.father_name.$dirty || registerform.father_name.$touched">
                            <span class="form-text text-danger" ng-show="registerform.father_name.$error.required">Father's Name cannot be Empty</span>
                            <span class="form-text text-danger" ng-show="registerform.father_name.$error.pattern">Name cannot contain Numbers</span>
                          </span>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Mother's Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text" 
                              class="form-control" 
                              name="mother_name" 
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              ng-model="mother_name"
                              pattern="[a-zA-Z]{1,}"
                              ng-required="true"
                            />
                          </div>
                          <span ng-show="registerform.mother_name.$dirty || registerform.mother_name.$touched">
                            <span class="form-text text-danger" ng-show="registerform.mother_name.$error.required">Mother's Name cannot be Empty</span>
                            <span class="form-text text-danger" ng-show="registerform.mother_name.$error.pattern">Name cannot contain Numbers</span>
                          </span>
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
                                    type="text" 
                                    class="form-control" 
                                    name="father_phone" 
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                    ng-model="father_phone"
                                    pattern="^((\\+91-?)|0)?[0-9]{10}$"
                                    ng-required="true"
                                    />
                                </div>
                                <span ng-show="registerform.father_phone.$dirty || registerform.father_phone.$touched">
                                  <span class="form-text text-danger" ng-show="registerform.father_phone.$error.required">Father's Phone Number cannot be empty</span>
                                  <span class="form-text text-danger" ng-show="registerform.father_phone.$error.pattern">Please enter a valid phone number</span>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="basic-icon-default-fullname">Blood Group</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-user"></i
                                    ></span>
                                    <input
                                    type="text" 
                                    class="form-control" 
                                    name="blood_group" 
                                    placeholder="o+"
                                    aria-label="o+"
                                    aria-describedby="basic-icon-default-fullname2"
                                    ng-model="blood_group"
                                    pattern="([Aa]|[Bb]|[Aa][Bb]|[Oo])(\+|-)"
                                    ng-required="true"
                                    />
                                </div>
                                <span ng-show="registerform.blood_group.$dirty || registerform.blood_group.$touched">
                                  <span class="form-text text-danger" ng-show="registerform.blood_group.$error.required">Blood Group cannot be empty</span>
                                  <span class="form-text text-danger" ng-show="registerform.blood_group.$error.pattern">Please enter a valid Blood group</span>
                                </span>
                            </div>
                        </div>  
                        <div class="form-group">
                    <label for="formFile">Passport Size Photo</label><br>
                    <input type="file"  accept="image/*" class="form-control" id="photo" name="photo">
                    <!-- <span ng-show="registerform.$submitted || registerform.photo.$dirty || registerform.photo.$touched">
                      <span class="form-text text-danger" ng-show="registerform.photo.$error.required">Passport photo cannot be empty</span>
                    </span> -->
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
                        <center><button type="submit" name="add" class="btn btn-primary">Submit</button></center>
                      </form>
                      <script>
                        var app = angular.module('myApp', []);
                        app.controller('validateCtrl', function($scope){

                        });

                        app.controller('validateCtrl', function($scope, $http) {
    $scope.submitForm = function() {
        // Handle form submission here
        // Use $http service to send data to the server
        $http.post('studentsave.php', $scope.formData)
            .then(function(response) {
                // Handle success
                console.log(response.data);
            }, function(error) {
                // Handle error
                console.log(error);
            });
    };
});

                      </script>
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
include "footer.php";
?>
</div>
</main>
<!-- <script src="validate.js"></script> -->
</body>
</html>