<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
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
                        <a class="nav-link" href="#">Edytuj Profil</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-navbar" href="php/logout.php">Wyloguj się</a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
      </div>

            <!-- Menu górne koniec -->

            <!-- edycja profilu początek -->

            <section class="section_update_data">
                <h3 class="heading-contact">Edycja danych użytkownika</h3>
                  <div class="container styling_update_data">
                      <div class="row">
                          
                          <div class="col-lg-12 col-md-12">
                              <div class="update_data_fields">
  
                                  <!-- edycja danych użytkownika początek -->

                                  <?php 
                                    if(isset($_POST['submit'])){
                                      $username = $_POST['username'];
                                      $email = $_POST['email'];
                                      $age = $_POST['age'];

                                      $id = $_SESSION['id'];

                                      $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occurred");

                                      if($edit_query){
                                        echo "<div class='row'>
                                                <div class='col-lg-12'>
                                                    <div class='mb-3 text-center'>
                                                        <p class='link-register'>Dane zaktualizowane</p>
                                                        <a href='home.php' class='btn-login_now'>Powrót</a>                                                
                                                    </div>
                                                </div>
                                              </div>";
                            
                                      }
                                    }else{

                                      $id = $_SESSION['id'];
                                      $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                                      while($result = mysqli_fetch_assoc($query)){
                                          $res_Uname = $result['Username'];
                                          $res_Email = $result['Email'];
                                          $res_Age = $result['Age'];
                                      }

                                  ?>
  
                                  <form action="" method="POST">
  
                                      <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                              <div class="mb-3">
                                                  <label for="username">Nazwa użytkownika</label>                                             
                                                  <input type="text" class="form-control" value="<?php echo $res_Uname; ?>" name="username" id="username" autocomplete="off" required>
                                              </div>                        
                                          </div>
                                      </div>
  
                                      <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                              <div class="mb-3">    
                                                  <label for="username">Adres Email</label>                                             
                                                  <input type="email" class="form-control" value="<?php echo $res_Email; ?>" name="email" id="email" autocomplete="off" required>
                                              </div>                        
                                          </div>
                                      </div>
  
                                      <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                              <div class="mb-3">    
                                                  <label for="username">Wiek</label>                                             
                                                  <input type="number" class="form-control" value="<?php echo $res_Age; ?>" name="age" id="age" autocomplete="off" required>
                                              </div>                        
                                          </div>
                                      </div>
  
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="mb-3 text-center">
                                                  <input type="submit" name="submit" class="btn-update_data" value="Akrualizuj dane">                                                
                                              </div>
                                          </div>
                                      </div>
  
                                  </form>

                                  <?php } ?>
  
                                  <!-- rejestracja użytkownika koniec -->
                              
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
