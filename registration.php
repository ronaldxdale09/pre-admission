<?php include('function/db.php') ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - WMSU Online Pre-Admission System</title>

    <link rel="stylesheet" href="dist/bootstrap4/css/bootstrap.min.css">
    <link rel="icon" href="seal/wmsu-logo.png" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="dist/css/register.css">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="seal/wmsu-logo.png" alt="">
                <p class="h2">WMSU Online Pre-Admission System</p>
                <p class="lead">Please fill the field below with the correct information being asked.</p>

                <div class="col-md-7 col-lg-8" id="form-body">
                    <h4 class="mb-4 mt-4 pt-3">Registration</h4>

               

                        <form class="form" action="function/register.php" method="post">
                            <label for="email" class="form-label">CET's Applicant ID</label>
                            <input type="text" value="<?php echo $_SESSION['applicantid']; ?>"  class="form-control login-input" disabled="disable"  >
                           


                            <div class="form-group">
                                <label>First Name :</label>
                                <input type="id" name="fname" id="fname" value="<?php echo $_SESSION['fname'] ?>" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label>Last name :</label>
                                <input type="name" name="lname"  id="lname" value="<?php echo $_SESSION['lname'] ?>" class="form-control" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <select name="studentType" id="studentType"  class="form-control action" required>
                                <option disabled="disabled" selected="selected">Select Student Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Transferee">Transferee</option>
                                <option value="Shiftee">Shiftee</option>
                                </select>


                            <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control login-input" id="email" name="email" placeholder="Email Adress"  required>
                         
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control login-input" name="password" placeholder="Password" required>
                            <br>
                            <button type="submit" name="register" class="btn btn-submit mt-2 mb-2"> Register </button>
                            <br>
                            <p class="link pb-2">Already have an account? <a href="index.php">Login here</a></p>
                        </form>
               
                    <!--<  ?php
                        }
                    ?>-->

                </div>
            </div>
        </main>


        <footer class="text-muted text-center text-small">
            <p>&copy; 2020–2023 KainotomoTech</p>
            </ul>
        </footer>

    </div>

    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/form-validation.js"></script>

</body>

</html>