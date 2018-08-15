<!doctype html>
<html lang="en">
<style type="text/css">

  .fontSans{
  font-family:'Comic Sans MS', cursive, sans-serif;
  font-weight:bold;
}

</style>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wei's Kitchen - Location</title>
  </head>
  <body>

<!-- background -->
    <div>

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
              <a class="nav-item nav-link" href="Homepage.php">Home<span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="OrderNow.php">Order Now</a>
              <a class="nav-item nav-link active" href="Location.php" >Location</a>
              <a class="nav-item nav-link" href="ContactUs.php">Contact Us</a>
            </div>
          </div>
        </nav>
      </div>

<!-- location -->
      <div class="container fontSans" style="width:900px; height:50vh; text-align:center">
        <h5 class="mb-2"><br>MAP</h5>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89643.26037704563!2d-75.73530806689438!3d45.40224325358269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cce058daf0fe029%3A0x74da01dc88b9866d!2s1755+Riverside+Dr%2C+Ottawa%2C+ON+K1G+3T6!5e0!3m2!1sen!2sca!4v1530300222347" width="800" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>


<!-- footer -->
      <div style="background-color: #ff7f0e; border:0; height:60px; width:100%; position:fixed; right:0rem; bottom:0rem">
      </div>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- map -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf54B3WgUofF_s97g915h9oKzv37pgJig&callback=initMap"
    async defer></script>
  </body>
</html>