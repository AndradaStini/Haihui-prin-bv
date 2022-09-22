<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            a {
                text-decoration: none;
            }
            </style>
</head>
<body>
    <center>       
<?php

//definirea parametrilor din baza de date si conexiunea cu pagina web
$AdresaBazaDate="localhost";
$UtilizatorBazaDate="root";
$ParolaBazaDate="";
$NumeBazaDate="travel_app";

$conexiune=mysqli_connect($AdresaBazaDate, $UtilizatorBazaDate, $ParolaBazaDate, $NumeBazaDate) or die ("Nu se poate realiza conexiunea la serverul MySQL");

$username= $_POST ['username'];
$email= $_POST ['email'];
$password= $_POST ['password'];







//limitarea unui singur user cu acelasi nume
$cerere_SQL ="SELECT * FROM `login` WHERE username='".$username."'";

$rezultat=mysqli_query($conexiune, $cerere_SQL);

$randuri_gasite=mysqli_num_rows($rezultat);

if($randuri_gasite>=1)
{
   echo "<script>alert('Username-ul există deja!')</script>";
   mysqli_close($conexiune);
   

} else {
//Se defineste comannda sql de adaugare a inregistrarii in baza de date

$Adaugare_inregistrare="INSERT INTO `login` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";

//Se executa comanda sql de adaugare a inregistrarii in baza de date

mysqli_query($conexiune, $Adaugare_inregistrare) or die (mysqli_error($conexiune));

//Se inchide conexiunea cu baza de datesi cu serverul sql

$rezultat = mysqli_close($conexiune);
echo '<img src="Imagini/success.gif">';
echo "<h1>Contul a fost creat cu succes.</h1><br>";
echo "<br>";
echo '<br>
<button><a href="index.html">Revino la pagina principală</a></button>
';
}

?>






</center>
</body>
</html>