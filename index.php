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
                        <?php
                          session_start();
                          include("php/config.php");   

                          if (isset($_SESSION['valid'])) {

                          $id = $_SESSION['id'];
                          $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

                            while($result = mysqli_fetch_assoc($query)){
                                $res_Uname = $result['Username'];
                                $res_Email = $result['Email'];
                                $res_Age = $result['Age'];
                                $res_id = $result['Id'];
                            }

                          if (isset($_SESSION['valid'])) {
                              echo "<a class='btn-navbar' href='home.php'>Witaj, ".$res_Uname."</a>";
                            }
                          } else {
                            echo "<a class='btn-navbar' href='login.php'>Zaloguj się</a>";
                          }                                       
                        ?>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
      </div>


            <!-- Menu górne koniec -->

            <!-- Główny widok początek -->

            <div class="container">
                <div class="content-home">
                    <div class="row content-home2">
                        <div class="col-lg-7 col-md-5">
                            <div class="box-container">
                                <img src="img/body_fat_problem.jpg" class="img-home img-fluid" alt="czym jest otyłość">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-7">
                            <div class="box-container2">
                                <h1 class="home-heading">Czym jest <span class="home-span">otyłość...</span></h1>
                                <blockquote cite="https://pacjent.gov.pl/aktualnosc/otylosc-pandemia-wspolczesnych-czasow">
                                    <p class="para-home">"Według definicji WHO otyłość to nieprawidłowe lub nadmierne nagromadzenie tłuszczu wpływające niekorzystnie na stan zdrowia. Otyłość jest chorobą, w której jemy za dużo kalorii i nie zużywamy ich, bo jesteśmy za mało aktywni fizycznie. Organizm gromadzi nadmiar spożytej energii w tkance tłuszczowej."</p>
                                </blockquote>
                                <div class="btn-home">
                                    <a href="#" class="home-links">Dowiedz się więcej</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Główny widok koniec -->

            <!-- sekcja kalkulator początek -->

            <div class="container">
                <div class="calc-container">
                    <div class="calc">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="content-calc">
                                    <h3 class="heading-calc">Kalkulator BMI</h3>
                                    <p class="para-calc">BMI (ang. Body Mass Index - wskaźnik masy ciała) jest wskaźnikiem, który jest obliczany przez porównanie wzrostu z masy ciała. Jego wartość jest pomocna w ocenie ryzyka wystąpienia chorób związanych z nadwagą takich jak miażdżyca lub choroba niedokrwienna serca.</p>
                                    <p class="para-calc">Jeżeli nie wiesz ile wynosi twoje BMI, może je sprawdzić w dostępnym na stronie kalkulatorze, który oprócz twojego BMI obliczy inne przydatne rzeczy.</p>
                                    <a href="calc-bmi.php" class="link-calc" alt="Kalkulator BMI"><span class="span-link-about"></span>Oblicz ...</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <img src="img/calculator-image.jpg" class="calc-image img-fluid" alt="Kalkulator">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sekcja kalkulator koniec -->
            <!-- sekcja choroby początek -->

            <section class="fat-diseases">
              <h2 class="heading-fat-diseases">Choroby wynikajęce z otyłości</h2>
              <div class="container-fluid">

                <!-- bootstrap karuzela zdjęć początek -->

                <div id="carouselExample" class="carousel slide">
                  <div class="carousel-inner">
                    <div class="carousel-item active">

                      <!-- rolka 1 początek-->
                      
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-4 col-md-6">
                            
                            <div class="card card-diseases">
                              <img src="img/nadcisnienie_picture.jpg" class="card-img-top img-card" alt="Nadciśnienie tętniczne">
                              <div class="card-body">
                                <h5 class="card-title">Nadciśnienie tętniczne</h5>
                                <p class="card-text">Nadciśnienie tętnicze to choroba charakteryzująca się podwyższonym ciśnieniem krwi, czyli ciśnieniem tętniczym o wartości 140/90 mm Hg lub więcej.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>

                          <div class="col-lg-4 col-md-6">

                            <div class="card card-diseases">
                              <img src="img/cukrzyca_picture.jpg" class="card-img-top img-card" alt="Cukrzyca typu 2">
                              <div class="card-body">
                                <h5 class="card-title">Cukrzyca typu 2</h5>
                                <p class="card-text">Cukrzyca typu 2 rozwija się w wyniku otyłości, niskiej aktywności fizycznej oraz często współistniejących czynników genetycznych.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>

                          <div class="col-lg-4 col-md-6">

                            <div class="card card-diseases">
                              <img src="img/depresja_picture.jpg" class="card-img-top img-card" alt="Depresja">
                              <div class="card-body">
                                <h5 class="card-title">Depresja</h5>
                                <p class="card-text">Otyłość, poczucie wyobcowania, brak wsparcia z powodu dodatkowych kilogramów mogą być przyczyną zwiększonego poziomu stresu, obniżenia nastroju i wystąpienia depresji.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>                       

                        </div>
                      </div>

                    </div>

                    <!-- rolka 1 koniec -->
                    <!-- rolka 2 początek-->

                    <div class="carousel-item">

                      <div class="container">
                        <div class="row">
                          <div class="col-lg-4 col-md-6">
                            
                            <div class="card card-diseases">
                              <img src="img/nadcisnienie_picture.jpg" class="card-img-top img-card" alt="Nadciśnienie tętniczne">
                              <div class="card-body">
                                <h5 class="card-title">Nadciśnienie tętniczne</h5>
                                <p class="card-text">Nadciśnienie tętnicze to choroba charakteryzująca się podwyższonym ciśnieniem krwi, czyli ciśnieniem tętniczym o wartości 140/90 mm Hg lub więcej.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>

                          <div class="col-lg-4 col-md-6">

                            <div class="card card-diseases">
                              <img src="img/cukrzyca_picture.jpg" class="card-img-top img-card" alt="Cukrzyca typu 2">
                              <div class="card-body">
                                <h5 class="card-title">Cukrzyca typu 2</h5>
                                <p class="card-text">Cukrzyca typu 2 rozwija się w wyniku otyłości, niskiej aktywności fizycznej oraz często współistniejących czynników genetycznych.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>

                          <div class="col-lg-4 col-md-6">

                            <div class="card card-diseases">
                              <img src="img/depresja_picture.jpg" class="card-img-top img-card" alt="Depresja">
                              <div class="card-body">
                                <h5 class="card-title">Depresja</h5>
                                <p class="card-text">Otyłość, poczucie wyobcowania, brak wsparcia z powodu dodatkowych kilogramów mogą być przyczyną zwiększonego poziomu stresu, obniżenia nastroju i wystąpienia depresji.</p>
                                <a href="#" class="btn-diseases">Czytaj więcej...</a>
                              </div>
                            </div>

                          </div>
                          
                        </div>
                      </div>

                      <!-- rolka 1 koniec -->
                      
                    </div>

                  </div>
                  <button class="carousel-control-prev btn-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <img src="img/left_arrow.png" alt="previous slides" class="btn-scroll button-left">
                  </button>
                  <button class="carousel-control-next btn-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <img src="img/right_arrow.png" alt="next slides" class="btn-scroll button-right">
                  </button>
                </div>

                <!-- bootstrap karuzela zdjęć koniec -->

              </div>
            </section>

            <!-- sekcja "choroby" koniec -->

            <!-- sekcja "co dalej" początek -->

            <section class="what-next">

              <h2 class="heading-what-next">
                Co dalej...
              </h2>
              <p class="para-what-next">Zobacz w jaki sposób możesz pozbyć się zbędnych kilogramów...</p>
              <div class="container-fluid">

                <!-- Slider Bootstrap -->

                <div class="container-fluid styling-carousel">
                  <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">

                        <!-- początek pierwyszch kart -->

                        <div class="container container-what-next">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 my-2">
                              <div class="container-content">
                                <div class="img-what-next">
                                  <img src="img/gym_workout.jpg" class="image-what-next" alt="Trening na siłowni">
                                </div>

                                <div class="what-next-title">
                                  <h3 class="what-next-title-text">Zacznij ćwiczyć</h3>
                                  <p class="what-next-para">Trening to jedna z wielu form jakie pomogą Ci podczas całego procesu odchudzania. Korzyści wynikiających z treningów jest całe mnóstwo.</p>
                                  <a href="#" class="btn-what-next">Czytaj więcej...</a>
                                </div>
                              </div>
                            </div>
                        

                            <div class="col-lg-6 col-md-12 my-2">
                              <div class="container-content">
                                <div class="img-what-next">
                                  <img src="img/zdrowa_zywnosc.jpg" class="image-what-next" alt="Trening na siłowni">
                                </div>
                                
                                <div class="what-next-title">
                                  <h3 class="what-next-title-text">Zabdaj o dietę</h3>
                                  <p class="what-next-para">Dieta to 80% sukcesu w drodze po szczuplejszą sylwetkę. Zmiana nawyków żywieniowych nie tylko pozwoli zrzucić zbędne kilogramy ale także wpłynie na nasze lepsze samopoczucie </p>
                                  <a href="#" class="btn-what-next">Czytaj więcej...</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        <!-- koniec pierwyszch kart -->
                      </div>

                      <div class="carousel-item">

                        <!-- początek drugich kart -->

                        <div class="container container-what-next">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 my-2">
                              <div class="container-content">
                                <div class="img-what-next">
                                  <img src="img/gym_workout.jpg" class="image-what-next" alt="Trening na siłowni">
                                </div>

                                <div class="what-next-title">
                                  <h3 class="what-next-title-text">Zacznij ćwiczyć</h3>
                                  <p class="what-next-para">Trening to jedna z wielu form jakie pomogą Ci podczas całego procesu odchudzania. Korzyści wynikiających z treningów jest całe mnóstwo.</p>
                                  <a href="#" class="btn-what-next">Czytaj więcej...</a>
                                </div>
                              </div>
                            </div>
                        

                            <div class="col-lg-6 col-md-12 my-2">
                              <div class="container-content">
                                <div class="img-what-next">
                                  <img src="img/zdrowa_zywnosc.jpg" class="image-what-next" alt="Trening na siłowni">
                                </div>
                                
                                <div class="what-next-title">
                                  <h3 class="what-next-title-text">Zabdaj o dietę</h3>
                                  <p class="what-next-para">Dieta to 80% sukcesu w drodze po szczuplejszą sylwetkę. Zmiana nawyków żywieniowych nie tylko pozwoli zrzucić zbędne kilogramy ale także wpłynie na nasze lepsze samopoczucie </p>
                                  <a href="#" class="btn-what-next">Czytaj więcej...</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- koniec drugich kart -->
                        
                      </div>
                      
                    </div>
                    
                  </div>
                </div>

              </div>
            </section>

            <!-- sekcja "co dalej" koniec -->

            <!-- sekcja "kontakt" początek -->

            <section class="contact-form">
              <h3 class="heading-contact">Skontaktuj się z nami</h3>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <div class="form-origin">
                      <div class="row">

                        <div class="col-lg-6 col-md-12">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="podaj imię*" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>                        
                        </div>

                        <div class="col-lg-6 col-md-12">
                          <div class="mb-3">
                            <input type="email" class="form-control" placeholder="podaj adres email*" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>                        
                        </div>
                      </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <textarea class="form-control" placeholder="napisz swoją wiadomość*" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3 text-center">
                              <a href="#" class="btn-contact">Wyślij swoją wiadomość</a>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <div class="contact-content">

                      <h2 class="heading-contact-content">Więcej o <span>FATMAN</span></h2>
                      <p class="para-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis earum error ipsam sequi veritatis odio quod blanditiis eligendi, nesciunt nam, minima recusandae!</p>
                      <p class="para-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium praesentium culpa eos et nobis.</p>

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
