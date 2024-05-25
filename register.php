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
                        <a class="btn-navbar" href="login.php">Zaloguj się</a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
      </div>

            <!-- Menu górne koniec -->

            <!-- sekcja "kontakt" początek -->

            <section class="section_register">
              <h3 class="heading-contact">Zarejestruj się</h3>
                <div class="container styling-register">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="register_fields">

                            <!-- kod PHP dla rejestracji -->

                            <?php 
         
                              include("php/config.php");
                              if(isset($_POST['submit'])){
                                  $username = $_POST['username'];
                                  $email = $_POST['email'];
                                  $age = $_POST['age'];
                                  $password = $_POST['password'];
                                  $hashpasswd = password_hash($password, PASSWORD_DEFAULT);

                              //weryikikacja czy email jest unikalny

                              $verify_email = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                              if(mysqli_num_rows($verify_email) !=0 ){
                                echo "<div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='mb-3 text-center'>
                                                <p class='link-register'>Podany adres email już istnieje w bazie</p>
                                                <a href='javascript:self.history.back()'><button class='btn-login_now'>Powrót</button>                                                
                                            </div>
                                        </div>
                                      </div>";
                              }
                              else{

                                  mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$hashpasswd')") or die("Error Occured");

                                  echo "<div class='row'>
                                          <div class='col-lg-12'>
                                              <div class='mb-3 text-center'>
                                                  <p class='link-register'>Rejestracja przebiegła pomyślnie</p>
                                                  <a href='login.php' class='btn-login_now'>Zaloguj się</a>                                                
                                              </div>
                                          </div>
                                        </div>";
                                  }

                              }else{
                            
                            ?>

                                <!-- rejestracja użytkownika początek -->

                                <form action="" method="POST">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">                                                
                                                <input type="text" class="form-control" placeholder="nazwa użytkownika" name="username" id="username" autocomplete="off" required>
                                            </div>                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">                                                
                                                <input type="email" class="form-control" placeholder="email" name="email" id="email" autocomplete="off" required>
                                            </div>                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">                                                
                                                <input type="number" class="form-control" placeholder="wiek" name="age" id="age" autocomplete="off" required>
                                            </div>                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">                                            
                                                <input type="password" class="form-control" placeholder="utwórz hasło" name="password" id="password" autocomplete="off" required>
                                            </div>                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 text-center">
                                                <input type="submit" name="submit" class="btn-newRegister" value="Utwórz konto">                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 text-center">
                                                <span class="link-register">Posiadasz już konto?  </span><a href="login.php" class="btn-register">Zaloguj się</a>                                                
                                            </div>
                                        </div>
                                    </div>

                                </form>

                                <!-- rejestracja użytkownika koniec -->
                            <?php } ?>
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
