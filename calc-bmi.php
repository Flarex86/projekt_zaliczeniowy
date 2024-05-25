<?php include 'calc-header.php'; ?>

    <?php 

        $errh = $errw = "";
        $height = $weight = "";
        $bmipass = 0;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['height'])) {
                $errh = "<span style='
                font-size: 14px;
                color: rgba(241, 85, 106, 1);
                font-weight: 400;
                text-transform: uppercase;
                '> Wzrost jest wymagany !</span>";

            } elseif (filter_var(($_POST['height']), FILTER_VALIDATE_FLOAT) === false){
                $errh = "<span style='
                font-size: 14px;
                color: rgba(241, 85, 106, 1);
                font-weight: 400;
                text-transform: uppercase;
                '> Wprowadzono niepopraną wartość !</span>";

            }  else {
                $height = validation($_POST['height']);
            }


            if (empty($_POST['weight'])) {
                $errw = "<span style='
                font-size: 14px;
                color: rgba(241, 85, 106, 1);
                font-weight: 400;
                text-transform: uppercase;
                '> Waga jest wymagana !</span>";

            } elseif (filter_var(($_POST['weight']), FILTER_VALIDATE_FLOAT) === false){
                $errw = "<span style='
                font-size: 14px;
                color: rgba(241, 85, 106, 1);
                font-weight: 400;
                text-transform: uppercase;
                '> Wprowadzono niepopraną wartość !</span>";

            } else {
                $weight = validation($_POST['weight']);
            }

            if (empty($_POST['height'] && $_POST['weight'])){
                echo "";
            } elseif (filter_var(($_POST['height']), FILTER_VALIDATE_FLOAT) === false || filter_var(($_POST['weight']), FILTER_VALIDATE_FLOAT) === false){
                echo"";
            } else {
                $bmi = ($weight / ($height * $height));
                $bmipass = $bmi;
            }
        }

        function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    ?>

            <form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="POST">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="mb-3">
                        <?php echo $errh; ?>
                            <input type="number" step="0.01" min="0.01" lang="en" class="form-control arrows" placeholder="podaj swój wzrost (w metrach)" name="height">
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="mb-3">
                        <?php echo $errw; ?>
                            <input type="number" step="0.01" min="0.01" lang="en" class="form-control arrows" placeholder="podaj swoją wagę (w kilogramach)" name="weight">
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3 text-center">
                            <input type="submit" name="submit" class="btn-bmi" value="oblicz BMI">
                            <input type="reset" class="btn-bmi" value="Wyczyść">
                        </div>
                    </div>
                </div>

            </form>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <?php
                            error_reporting(0);
                                echo "<span class='bmiscore'>Twoje BMI wynosi: " . number_format($bmipass , 2) . "</span>";
                                if (isset($_POST['submit'])) {
                                    if ($bmipass >= 13.6 && $bmipass <=18.5){
                                        echo "<span class='bmi_score_note'>Twój wynik BMI jest zbyt niski. Zwiększ swoją wagę poprzez zwiększenie kaloryczności posiłków.</span>";
                                    } elseif ($bmipass >= 18.6 && $bmipass <=24.9){
                                        echo "<span class='bmi_score_note'>Twój wynik BMI jest w normie.</span>";
                                    } elseif ($bmipass >= 25.0 && $bmipass <=29.9){
                                        echo "<span class='bmi_score_note'>Twój wynik BMI wskazuje na nadwagę. Zwiększ aktywność lub nieznacznie zmniejsz kaloryczność posiłków.</span>";
                                    } elseif ($bmipass >= 30.0 && $bmipass <=34.9){
                                        echo "<span class='bmi_score_note'>Twój wynik BMI wskazuje na otyłość I stopnia. Zwiększ aktywność lub znacznie zmniejsz kaloryczność posiłków.</span>";
                                    } elseif ($bmipass >= 35.0 && $bmipass <=39.9){
                                        echo "<span class='bmi_score_note'>Twój wynik BMI wskazuje na otyłość II stopnia. Stanowczo zwiększ aktywność oraz znacznie zmniejsz kaloryczność posiłków. Skosultuj się z dietetykiem.</span>";
                                    } elseif ($bmipass >= 40.0){
                                        echo "<span class='bmi_score_note_red'>Twój wynik BMI wskazuje na otyłość III stopnia. Wysokie ryzyko przedwczesnej śmierci. Pilnie skosultuj się z lekarzem!</span>";
                                    }
                                }
                        ?>
                    </div>
                </div>
            </div>

        </div>
            </div>

                <div class="col-lg-6 col-md-12">
                    <div class="contact-content">

                    <img src="img/what_is_your_bmi.jpg" class="img-bmi" alt="Ile wynosi twoje BMI">

                    </div>
                </div>

            </div>
        </div>
    </section>


             

<?php include 'calc-footer.php'; ?>
