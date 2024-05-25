<?php 
   session_start();
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="media.css">
    <title>Czym jest otyłość...</title>
  </head>
  <body>
    
      <div class="header">
        <div class="container-fluid gx-0">

            <!-- Menu górne początek -->

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                  <a class="navbar-brand logo text-uppercase" href="index.php">FatMan</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Czym jest otyłość</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="calc-bmi.php">Kalkulator BMI</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Choroby</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Co robić</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-navbar" href="#">Zaloguj się</a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
      </div>

            <!-- Menu górne koniec -->

            <!-- sekcja "kontakt" początek -->

            <section class="section_login">
              <h3 class="heading-contact">Zaloguj się</h3>
                <div class="container styling-login">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="login_fields">

                                <!-- logowanie użytkownika początek -->

                                <?php 
             
                                  include("php/config.php");
                                  if(isset($_POST['submit'])){
                                    $email = mysqli_real_escape_string($con,$_POST['email']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);

                                    $check_email = mysqli_query($con, "SELECT Id, Email, Username, Age, Password FROM users WHERE Email='$email'");
                                    $row = mysqli_fetch_array($check_email);
    
                                    if ($row && password_verify($password, $row['Password'])){
                                                                            
                                        $_SESSION["valid"] = $row['Email'];
                                        $_SESSION['username'] = $row['Username'];
                                        $_SESSION['age'] = $row['Age'];
                                        $_SESSION['id'] = $row['Id'];
                                        //header("Location: home.php");
                                    }else{
                                      echo "<div class='row'>
                                              <div class='col-lg-12'>
                                                  <div class='mb-3 text-center'>
                                                      <p class='log_error'>Nieprawidłowa nazwa użytkownika lub hasło</p>                                               
                                                  </div>
                                              </div>
                                            </div>";                            
                                    
                                  }

                                    // $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die ("Select Error");
                                    // $row = mysqli_fetch_assoc($result);

                                    // if (password_verify($password, $row['Password'])){

                                    // if(is_array($row) && !empty($row)){
                                        // $_SESSION['valid'] = $row['Email'];
                                        // $_SESSION['username'] = $row['Username'];
                                        // $_SESSION['age'] = $row['Age'];
                                        // $_SESSION['id'] = $row['Id'];
                                    // else{
                                    //   echo "<div class='row'>
                                    //           <div class='col-lg-12'>
                                    //               <div class='mb-3 text-center'>
                                    //                   <p class='log_error'>Nieprawidłowa nazwa użytkownika lub hasło</p>                                               
                                    //               </div>
                                    //           </div>
                                    //         </div>";                            
                                    // }
                                  
                                  }

                                    if(isset($_SESSION['valid'])){
                                        header("Location: home.php");
                                    } else{

                                
                                ?>

                                  <form action="" method="POST">

                                      <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                              <div class="mb-3">                                                
                                                  <input type="email" class="form-control" placeholder="adres email" name="email" id="email" autocomplete="off">
                                              </div>                        
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                              <div class="mb-3">                                            
                                                  <input type="password" class="form-control" placeholder="hasło" name="password" id="password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                                              </div>                        
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="mb-3 text-center">
                                                  <input type="submit" name="submit" class="btn-login" value="Zaloguj">                                                
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="mb-3 text-center">
                                                  <span class="link-register">Nie masz jeszcze konta? </span><a href="register.php" class="btn-register">Zarejestruj się</a>                                                
                                              </div>
                                          </div>
                                      </div>

                                  </form>

                                <?php } ?>

                                <!-- logowanie użytkownika koniec -->
                            
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- sekcja "kontakt" początek -->

            <footer>
              <p class="para-footer">&#169; FATMAN 2024</p>
            </footer>


    
  </body>
  <!-- Script file -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>
