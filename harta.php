<?php
include '<afterlogin/connect.php';
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haihui prin Brasov</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./st.css" />
    <script type="module" src="./index.js"></script>
    <!-- Link our css file-->
    <link rel="stylesheet" href="css/atractii.css">
    <link rel="stylesheet" href="css/st.css">
    <link rel="icon" type="image/x-icon" href="Imagini/l1.png">
</head>

<body>
    <style>
        /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
    </style>
    <!--Bara de navigare incepe aici-->
    <section class="nav-bar">
        <div class="container">
            <div class="Logo">
                <img src="imagini/l1.png" alt="Logo aplicatie" class="img-responsive">
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

    <div class="wrapper">
<div id="map"></div>
<script src="js/harta.js"> </script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1QBA9B0r5MNNbyyg4lqdgaMYfHVlcqVM&callback=getLocation&v=weekly"
    async defer
></script>

<div class="wrapper" >

<div class="textul">Atractii turistice din apropiere:</div>

<script> 
function getLocation1()
{
if (navigator.geolocation)
  {
  navigator.geolocation.getCurrentPosition(showPosition1);
  }
}
function showPosition1(position)
{
var lat=position.coords.latitude;
var lng=position.coords.longitude;
    document.cookie = "lat = " + lat ;
    document.cookie = "lng = " + lng ;
}
</script>

<?php
$lat= $_COOKIE['lat'];
$lng= $_COOKIE['lng'];

    $sql = "SELECT *, ( 6371 * acos( cos( radians(latitudine ) ) * cos( radians( $lat ) ) * cos( radians( $lng ) - radians( longitudine ) ) + sin( radians( latitudine ) ) * sin( radians( $lat ) ) ) ) AS distance FROM `locatii` HAVING distance < 5 ORDER BY distance LIMIT 0 , 4";   

    $result=mysqli_query($con,$sql);
    if($result){
  while( $row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $nume=$row['nume'];
    $adresa=$row['adresa'];
    $imagine=$row['imagine'];
    $lati=$row['latitudine'];
    $long=$row['longitudine'];
    echo '
    <table class = "grid-gview">
    <div class="loc-gview">
    <td ><img src="data:image;base64,'.base64_encode($imagine) .'" height="100" width="150"/> </td>
    <td >
            <div class="textul">'.$nume.'</div>
            <div> Adresa: '.$adresa.'</div>
    </td>
    </div>
    </table>
        ';}
    } 
?>
</div>

</body>
</html>