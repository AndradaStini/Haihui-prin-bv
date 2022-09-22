<?php
session_start (); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haihui prin Brasov</title>


    <!-- Link our css file-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../Imagini/l1.png">

    <style>
        h2 {
            color: red;
        }
        #bg-video {
            min-width: 100%;
            min-height: 100vh;
            max-width: 100%;
            max-height: 100vh;
            object-fit: cover;
            z-index: -1;
            
        }
        #bg-video::-webkit-media-controls {
            display: none !important;
        }
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0px;
        }
        .main-banner {
            text-align: center;
            position: absolute;
            left: 37%;
            top: 25%;
            transform: translate (-50%, -50%);
            
        }
        </style>
</head>

<body>
    <!--Bara de navigare incepe aici-->
    <section class="nav-bar">
        <div class="container">
            <div class="Logo">
                <img src="Imagini/l1.png" alt="Logo aplicatie" class="img-responsive">
            </div>

            <div class="Menu text-right">
            <nav>
                    <ul>
                    <li>
                        <a href="index.html">Acasă</a>
                    </li>
                    <li>
                        <a href="login.html">Conectează-te</a>
                    </li>
                    <li>
                        <a href="atractii.php">Atracții</a>
                    </li>
                    <li>
                        <a href="harta.php">Hartă</a>
                    </li>
                    <li>
                        <a href="login.html">Quiz</a>
                    </li>
                    <li>
                        <a href="vreme.html">Vreme</a>
                    </li>
                    </ul>
                </nav>
            </div>

            <div class="clearfix">

            </div>
        </div>
    </section>

    

    <div class="hero">
    <video autoplay muted loop id="bg-video">
            <source src="imagini/intro.mp4" type="video/mp4">
        </video>
        <div class="video-overlay main-banner" style="padding-top:50px;">
        <center>
        <?php
                    //definirea parametrilor din baza de date si conexiunea cu pagina web


                    $AdresaBazaDate="localhost";
                    $UtilizatorBazaDate="root";
                    $ParolaBazaDate="";
                    $NumeBazaDate="travel_app";

                    
                    $conexiune=mysqli_connect($AdresaBazaDate, $UtilizatorBazaDate, $ParolaBazaDate, $NumeBazaDate) or 
                    die ("Nu se poate realiza conexiunea la serverul MySQL");


                    $username= $_POST ['username'];
                    $password= $_POST ['password'];

                    $cerere_SQL ="SELECT * FROM `login` WHERE username='".$username."' AND password='".$password."'";

                    $rezultat=mysqli_query($conexiune, $cerere_SQL);
                    $row=mysqli_fetch_assoc($rezultat);
                    $userId=$row['id'];

                    $randuri_gasite=mysqli_num_rows($rezultat);

                    if($randuri_gasite>=1)
                    {while($row=mysqli_fetch_assoc($cerere_SQL))
                        {
                            $dbusername=$row['username'];
                            $dbpassword=$row['password'];
                        }
                        if($user==$dbusername && $pass == $dbpassword)
                        {
                            $_SESSION['username']= $username;
                            header("Location: http://localhost/TravelApp-Brasov/afterlogin/index.php?userId=$userId");
                            exit();
                        }}
                        else {
                            echo '<script>window.location=\'login.html\';window.onload=alert("Username sau parola incorecte!")</script>';
                        exit();
                        }
                        mysqli_close($conexiune);
                   ?>


                 
            </div>
      <!--
        </center>
        <div class="form-box video-overlay main-banner">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Loghează-te</button>
                <button type="button" class="toggle-btn" onclick="register()">Înregistreaza-te</button><br>
            </div>
           
            <form id="login"  class="input-group" action="login.php" method="post">
                <input type="text" name="username" class="input-field" placeholder="Adaugă username"
                       required>
                <input type="password" name="password" class="input-field" placeholder="Adaugă parola" required />
                <button type="submit" class="submit-btn">Conectează-te</button>
            </form>

            <form id="register" class="input-group" action="register.php" method="post">
                <input type="text" name="username" class="input-field" placeholder="Adaugă username" required />
                <input type="email" name="email" class="input-field" placeholder="Adaugă Email"
                       required>
                <input type="password" name="password" class="input-field" placeholder="Adauga parola" required />
                <button type="submit" class="submit-btn">Înregistrează-te</button>
            </form>
        </div>

    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

    </script> -->


    </body>
</html>

