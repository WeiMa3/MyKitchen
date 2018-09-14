<?php

require_once("db.php");
$cateNames=getCateName();

?>

<!doctype html>
<html lang="en">
<style type="text/css">

.BlueText{
  color:#027e94;
}

.BlueText:hover{
  color:#00505a;
}

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

    <title>Wei's Kitchen - Order Now</title>
    <style type="text/css">
      .nav .nav-item .order-menu {
        font-weight:bold; 
        margin:0 ; 
        border-radius: 5px 0 0 5px; 
        border:solid 2px #e0bf61; 
        border-right:none; 
        line-height:8vh
      }
    </style>
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
              <a class="nav-item nav-link active" href="OrderNow.php">Order Now</a>
              <a class="nav-item nav-link" href="Location.php" >Location</a>
              <a class="nav-item nav-link" href="ContactUs.php">Contact Us</a>
            </div>
          </div>
        </nav>
      </div>


<!-- tabs-menu -->
      <div class="container" style="height:85vh; background-color:#ffdc77">
        <div class="row">
          <div class="col-2 pl-0 pr-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="flex-direction: column; border: none">
              <?php
              $i=0;
              foreach ($cateNames as $cateName){
              ?>
              
                <li class="nav-item">
                  <a class="nav-link BlueText <?php if($i==0){echo'active';} ?> order-menu" id="<?php echo $cateName['food_cate_id']; ?>-tab" data-toggle="tab" href="#c<?php echo $cateName['food_cate_id']; ?>" role="tab" aria-controls="c<?php echo $cateName['food_cate_id']; ?>" aria-selected="<?php if ($i==0){echo'true';}?>"> 
                    <?php 
                      echo $cateName['cate_name']; 
                    ?> 
                  </a>
                </li>
              <?php
                $i++;
                }
              ?>
            </ul>
          </div>

<!-- tabs-main -->
          <div class="col-10 px-0" style="border-top:solid 3px #e0bf61">
            <div class="tab-content" id="myTabContent">
              <?php
              $i=0;
              foreach ($cateNames as $cateName){
              ?>
              <div class="tab-pane fade <?php if($i==0){echo 'show active';}?>" id="c<?php echo $cateName['food_cate_id'];?>" role="tabpanel" aria-labelledby="<?php echo $cateName['food_cate_id'];?>-tab" style="height:85vh; overflow-y: scroll; background-color: white;padding:2rem">

                <div class="container pl-0 pr-0">
                  <?php
                  $x=0;
                  $menuByCateId=getMenuByCateId($cateName['food_cate_id']);
                  foreach($menuByCateId as $eachMenu){
                    if($x%3==0){
                      echo "<div class='card-group'>";
                    }
                  
                  ?>
                  

                    <div class="card menu_card" id="w<?php echo $eachMenu['menu_id'];?>">
                      <img class="card-img-top" src="<?php echo $eachMenu['picture'];?>" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">
                          <?php
                          echo $eachMenu['name'];
                          ?>
                        </h5>
                        <p class="card-text">$<span class="item-price"><?php echo $eachMenu['price'];?></span></p>
                        <p class="card-text"><?php echo $eachMenu['description'];?></p>
                        <button style="width:2rem" onclick="minusOne('w<?php echo $eachMenu['menu_id'];?>')">-</button><span class="item-num" style="display:inline-block;width:3rem;text-align: center"> 0 </span><button style="width:2rem" onclick="plusOne('w<?php echo $eachMenu['menu_id'];?>')">+</button>
                      </div>
                    </div>
                  <?php
                    if (($x+1) % 3 == 0) {
                        echo "</div>";
                      }
                      $x++;
                    }
                    if ($x%3 != 0 ) {
                      echo "</div>";
                    }
                  ?>
                </div>
                
              </div>
              <?php
              $i++;
              }
              ?>

            </div>
          </div>
        </div>
      </div>


<!-- Checkout Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Total amount to pay: $<span id="total-price-checkout"></span> ($5 delivery fee included) </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="recipient-address">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cellphone:</label>
            <input type="text" class="form-control" id="phone-number">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirm-order">Confirm Order</button>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
      <div style="background-color: #ff7f0e; border:0; height:60px; width:100%; position:fixed; right:0rem; bottom:0rem">
        
        <div style="margin:10px 20px; font-size: 18px; float:right; font-weight:bold; color:#027e94">
          <span>Total: </span> <span id="total-price" style="display:inline-block;width:4rem; text-align: left">0</span>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">CHECK OUT</button>
        </div>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">

      function plusOne(q) {
        // document.getElementById().innerHTML = $q+1;
        // console.log(q);
        var num_element = $('#' + q).find('.item-num');
        var num = num_element.text();
        num_element.text(parseInt(num)+1);
        calcTotal();
      }

      function minusOne(q) {
        var num_element = $('#' + q).find('.item-num');
        var num = num_element.text();
        if (parseInt(num) > 0 ) {
          num_element.text(parseInt(num)-1);
        }
        calcTotal();
      }

      function calcTotal() {
        var total = 0;
        $('.menu_card').each(
          function() {
            var num_str = $(this).find('.item-num').text();
            var num = parseInt(num_str);
            var price_str = $(this).find('.item-price').text();
            var price = parseFloat(price_str);
            total = total + num * price;
            totalWithDelivery = total + 5;
          }
        );
        $('#total-price').text(total.toFixed(2));
        $('#total-price-checkout').text(totalWithDelivery.toFixed(2));
      }


      $('#confirm-order').on('click',function(){

        var recipientName = $('#recipient-name').val();
        var recipientAddress = $('#recipient-address').val();
        var phoneNumber = $('#recipient-address').val();
        var message = $('#message-text').val();
        var amountToPay = $('#total-price').val();

        $.post(
          'https://mandrillapp.com/api/1.0/messages/send.json',
                      
          '{"message":{"html":"<h3>Order from Mr/Ms '  + recipientName + ':</h3> <p>Total amount to pay: $' + amountToPay + '<br>Address: ' + recipientAddress + '<br>Phone number: ' + phoneNumber + '<br>Message: ' + message + '</p>","text":"Example text content","subject":"example subject","from_email":"admin@myseasonalrecipes.com","from_name":"Wei\'s Kitchen","to":[{"email":"myemailaddress@gmail.com","name":"Wei","type":"to"}],"headers":{"Reply-To":"myemailaddress@gmail.com"},"important":false,"track_opens":null,"track_clicks":null},"async":false,"ip_pool":"Main Pool","send_at":null,"key":"mymandrillkey"}'
          ,
          function(data) {
            console.table(data);
          },
          'json'
        );
        
      });

    </script>
  </body>
</html>

