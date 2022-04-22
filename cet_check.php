
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - WMSU Online Pre-Admission System</title>

    <link rel="stylesheet" href="dist/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/register.css">
    <link rel="icon" href="seal/wmsu-logo.png" sizes="32x32" type="image/png">


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

                

                        <form class="form" action="function/check_cet.php" method="post">
                            <label for="email" class="form-label">CET's Applicant ID</label>
                            <input type="text" class="form-control login-input" id="applicant" name="applicant" required>

                            <br>
                            <button type="submit" name="submit" class="btn btn-submit mt-2 mb-2"> Submit</button>
                            <p class="link pb-2">Already have an account? <a href="index.php">Login here</a></p>
                        </form>
               

                </div>
            </div>
        </main>


        <footer class="text-muted text-center text-small">
            <p>&copy; 2020–2023 KainotomoTech</p>
            </ul>
        </footer>

    </div>

    <!--<script>
    var password = document.getElementById("createpass")
    , confirm_password = document.getElementById("confirmpass");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
        confirm_password.setCustomValidity('');
        }
    }
    createpass.onchange = validatePassword;
    confirmpass.onkeyup = validatePassword;
</script>

<script>
    function validateForm(){
        alert("User Registration Was Successfull");
        return true;
    }
</script>
-->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>

</body>

</html>