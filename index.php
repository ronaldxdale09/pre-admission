
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      
  <title>Login - WMSU Online Pre-Admission</title>
  <link rel="icon" href="seal/wmsu-logo.png" sizes="32x32" type="image/png">    

  <link href="dist/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">          
  <link rel="stylesheet" href="dist/css/login-style.css">
        
</head>
<body>


    
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="seal/wmsu-logo.png" alt="">
                <p class="h2">WMSU Online Pre-Admission System</p>
            
                <div class="col-md-8 col-lg-8 col-sm-8" id="form-body">
                <h4 class="mb-4 mt-4 pt-3">Sign-in</h4>
                
                    <form class="form" method="post" name="login" action="function/login.php">
                          <label for="username" class="form-label">Email</label>
                          <input type="email" class="form-control shadow-none"  name="email" placeholder="Email" autofocus="true"/>
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control shadow-none"  name="password" placeholder="password"/>
                          <button type="submit"  name="login" class="btn btn-login w-100 mt-3"> Login </button>
                          <p class="link mt-2">Don't have an account? <a href="cet_check.php"><span class="pressMe">Registration Now</span></a></p>
                    </form>
                     

                </div>
            </div>
        </main>

        <footer class="mb-5 text-muted text-center text-small">
            <p class="mb-2">&copy; 2020–2023 KainotomoTech</p>
            </ul>
        </footer>
    
    </div>

    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/bootstrap4/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
