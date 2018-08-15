<?php

require_once("db.php");
$bestSix=getBestSix();
?>

<!doctype html>
<html lang="en">

<style type="text/css">

.fontSans{
  font-family:'Comic Sans MS', cursive, sans-serif;
  font-weight:bold;
}

td{
	height:3rem;
}


</style>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wei's Kitchen - Home</title>
  </head>
  <body>

<!-- background -->
    <div style="background: #fff1f1;">

<!-- menu bar -->
      <div class="container col-12" style="height: 60px; background: #ff7f0e;">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
          <a class="navbar-brand fontSans" href="Homepage.php"><h4 style="font-weight:bold">Wei's Kitchen</h4></a>
            <form class="form-inline" style="position:absolute; right:5rem">
              <input class="form-control mr-sm-2" type="search" placeholder="Coupon Code" aria-label="Search">
              <button class="btn btn-success my-2 my-sm-0" type="submit"  style="color:white;">APPLY</button>
            </form>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="position:absolute; right:0rem">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="font-weight:bold;">
              <a class="nav-item nav-link active" href="Homepage.php">Home<span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="OrderNow.php">Order Now</a>
              <a class="nav-item nav-link" href="Location.php" >Location</a>
              <a class="nav-item nav-link" href="ContactUs.php">Contact Us</a>
            </div>
          </div>
        </nav>
      </div>

<!-- slides -->
      <div class="container pl-0 pr-0">
        <div class="row">
          <div class="col-8">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color:black; height:auto">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="img/1.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
	      <div class="container fontSans col-4" style="width:500px; height:50vh;"><h5><br>HOURS:<br><br>
	        <table class="mx-5" >
	          <tbody>
	            <tr>
	              <td>Monday</td>
	              <td>11:00 - 22:00</td>
	            </tr>
	            <tr>
	              <td>Tuesday</td>
	              <td>11:00 - 22:00</td>
	            </tr>
	            <tr>
	              <td>Wednesday</td>
	              <td>11:00 - 22:00</td>
	            </tr>
	            <tr>
	              <td>Thursday</td>
	              <td>11:00 - 22:00</td>
	            </tr>
	            <tr>
	              <td>Friday</td>
	              <td>11:00 - 24:00</td>
	            </tr>
	            <tr>
	              <td>Saturday</td>
	              <td>11:00 - 24:00</td>
	            </tr>
	            <tr>
	              <td>Sunday</td>
	              <td>Closed</td>
	            </tr>
	          </tbody>
	        </table>
	      </div>

        </div>
        
      </div>

<!-- cards -->
      <div class="container" style="height:60px; background-color: #ff7f0e">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
          <a class="navbar-brand fontSans" href="Homepage.php"><h4 style="color:#f71e1e;">Hottest</h4></a>
        </nav>
      </div>

      <div class="container pl-0 pr-0">
          <?php
          $i=0;  //在第四个card的时候换行，两个card group每个有3个card
          foreach($bestSix as $eachMenu){
            if($i%3==0){
              echo "<div class='card-group'>";
            }
          ?>

          <div class="card">
            <?php
            echo "<img class='card-img-top' src='".$eachMenu['picture']."' alt='Card image cap'>"; 
            ?>
            <div class="card-body">
              <h5 class="card-title">

              <?php
              echo $eachMenu['name'];
              ?>

              </h5>
              <p class="card-text">

              <?php
              echo $eachMenu['description'] . '<br>';
              echo '$' . $eachMenu['price'];
              ?>

              </p>

            </div>
          </div>

          <?php
            if (($i+1)%3==0){
              echo "</div>";
            }
            $i++;
          }
          ?>

      </div>

<!-- footer -->
      <div class="container col-12" style="background-color: #ff7f0e; height:60px;">
      </div>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>