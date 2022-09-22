<?php
include 'afterlogin/connect.php';
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="ISO-8859-1">
<title>Haihui prin Brasov</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atracții Turistice din Brașov</title>
    <!-- Link our css file-->
    <link rel="stylesheet" href="css/atractii.css">
    <link rel="stylesheet" href="css/st.css">
    <link rel="icon" type="image/x-icon" href="Imagini/l1.png">
</head>

<body>
   
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

            <div class="clearfix"> </div>
        </div>
    </section>

    <div class ="wrapper">
		<div class = "rand">
			<div class="titl"> Atracții Turistice din Brașov </div>
		</div>
		<div class = "main">
            <?php 
                $sql="Select * from `locatii`";
                $result=mysqli_query($con,$sql);
                if($result){
                    while( $row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $adresa=$row['adresa'];
                        $imagine=$row['imagine'];
                        $descriere=$row['descriere'];

                         echo '	
                         <table class = "view_wrap list-view">
                         <tbody>
                         <div class="loc-view">
                         <tr>
                         <td ><img src="data:image;base64,'.base64_encode($imagine) .'" height="150" width="300"/> </td>
                         <td >
                         <div class="left-view"><table>
                         <tr>
                            <td class="titl">'.$nume.'</td>
                         </div></tr>
                         
                         <tr>
                            <td><div class="textul">Adresă: '.$adresa.'</div></td>
                         </tr>
                         <tr> 
                         <td >Știai că? </td>
                         </tr>
                         <tr> 
                         <td> '.$descriere.'</td>
                         </tr>
                         </div>
                         </table></div>
                         </td>
                         </tr>
                         </div> 
                         </tbody>
                         </table>';
			
                    }
            }
            ?>
               
       
        </div>	
	</div>
    </body>
    </html>
  