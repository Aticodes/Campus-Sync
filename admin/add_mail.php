<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />



    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Send Notification</h4>

                <!-- Basic Layout -->
                <div class="row">

                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="../login-system-main/grp_mail_send.php" method="POST" name="login">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Select Group to Send Mail:</label>
                                        <div class="col-md-6">
                                            <select name="group_selected" class="col-md-5 form-control text-md-left" aria-label="Default select example">
                                                <option selected>Select a Group of Users</option>
                                                <option value="2">Professors</option>
                                                <option value="3">Students</option>
                                                <!-- <option value="3"></option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="subject" class="col-md-4 col-form-label text-md-right">Mail Subject:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="subject" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="body" class="col-md-4 col-form-label text-md-right">Mail Body:</label>
                                        <div class="col-md-6 ">
                                            <textarea id="editor" class="form-control"  name="body" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                    <center><button type="submit" class="btn btn-primary mt-3">Send Mail</button></center>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>

</html>
