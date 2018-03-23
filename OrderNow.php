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
  color:#cc2b2b;
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
  </head>
  <body>

<!-- background -->
    <div style="background-color:#f3ebd4; margin:0; border:0">

<!-- title picture -->
      <div style="background: linear-gradient(#f3ebd4,#ffdc77); margin:0; border:0; height:14vh; display:flex">
        <h1 class="container fontSans" style="align-self:flex-end">Wei's Kitchen</h1>
      </div>

<!-- menu bar -->
      <div class="container" style="background-color: #cc2b2b; height:9vh">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
          <a class="navbar-brand fontSans" href="Homepage.php"><h4 style="color:white">Wei's Kitchen</h4></a>
            <form class="form-inline" style="position:absolute; right:5rem">
              <input class="form-control mr-sm-2" type="search" placeholder="Coupon Code" aria-label="Search">
              <button class="btn btn-success my-2 my-sm-0" type="submit">APPLY</button>
            </form>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="position:absolute; right:0rem">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="font-weight:bold">
              <a class="nav-item nav-link" href="Homepage.php">Home</a>
              <a class="nav-item nav-link active" href="OrderNow.php">Order Now<span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link " href="Location.php">Location</a>
              <a class="nav-item nav-link " href="ContactUs.php">Contact Us</a>
            </div>
          </div>
        </nav>
      </div>


<!-- tabs-menu -->
      <div class="container" style="margin-bottom: 7vh; background-color:#ffdc77">
        <div class="row">
          <div class="col-2 pl-0 pr-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="flex-direction: column; border: none">
              <?php
              $i=0;
              foreach ($cateNames as $cateName){
              ?>
              
                <li class="nav-item">
                  <a class="nav-link BlueText <?php  if($i==0){echo'active';} ?>" id="<?php echo $cateName['food_cate_id']; ?>-tab" data-toggle="tab" href="#c<?php echo $cateName['food_cate_id']; ?>" role="tab" aria-controls="c<?php echo $cateName['food_cate_id']; ?>" aria-selected="<?php if ($i==0){echo'true';}?>" style="font-weight:bold; margin:0 0 0 2px; border-radius: 5px 0 0 5px; border:solid 2px #e0bf61; border-right:none; line-height:8vh"> 
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
          <div class="col-10 px-0" style="border-left: 1px solid white">
            <div class="tab-content" id="myTabContent">
              <?php
              $i=0;
              foreach ($cateNames as $cateName){
              ?>
              <div class="tab-pane fade <?php if($i==0){echo 'show active';}?>" id="c<?php echo $cateName['food_cate_id'];?>" role="tabpanel" aria-labelledby="<?php echo $cateName['food_cate_id'];?>-tab" style="height:70vh; overflow-y: scroll; background-color: white;padding:2rem">

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
                        <p class="card-text">Price: $<span class="item-price"><?php echo $eachMenu['price'];?></span></p>
                        <p class="card-text"><?php echo $eachMenu['description'];?></p>
                        <button class="minusbtn" disabled style="width:2rem" onclick="minusOne('w<?php echo $eachMenu['menu_id'];?>')">-</button><span class="item-num" style="display:inline-block;width:3rem;text-align: center"> 0 </span><button class="plusbtn" style="width:2rem" onclick="plusOne('w<?php echo $eachMenu['menu_id'];?>')">+</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Your Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              pickup or delivery<br>
              if (delivery){address input + map}<br>
              order list (-,+,delete,price)<br>
              total
              <div id="checkoutdetail"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-success" onclick="submitOrder()">Confirm</button>
            </div>
          </div>
        </div>
      </div>

<!-- footer -->
      <div style="background: linear-gradient(#fbd463,#ffdc77,#f3ebd4); border:0; height:8vh; width:100%; position:fixed; right:0rem; bottom:0rem">
        
        <div style="margin:1vh; float:right; font-weight:bold; color:#027e94">
          <span>Total: </span> <span id="total-price" style="display:inline-block;width:4rem; text-align: left">0</span>
          <button class="btn btn-success" id="checkoutbtn" onclick="showList()" type="button" disabled data-toggle="modal" data-target="#exampleModal">CHECK OUT</button>
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
        var minus_element=$('#' + q).find('.minusbtn');
        minus_element.attr('disabled',false);
      }

      function minusOne(q) {
        var num_element = $('#' + q).find('.item-num');
        var num = num_element.text();
        if (parseInt(num) > 0 ) {
          num_element.text(parseInt(num)-1);
        }
        calcTotal();
        if ((parseInt(num)-1)==0){
          var minus_element=$('#' + q).find('.minusbtn');
          minus_element.attr('disabled',true);
        }
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
          }
        );
        if (total>0){
          $('#checkoutbtn').attr('disabled',false);
        }else{
          $('#checkoutbtn').attr('disabled',true);
        }
        $('#total-price').text(total.toFixed(2));
      }

      function showList(){
        var addhtml="";
        $('.menu_card').each(
          function() {
            var num_str = $(this).find('.item-num').text();
            var num = parseInt(num_str);
            if (num>0){
              var item_name = $(this).find('.card-title').text();
              var price_str = $(this).find('.item-price').text();
              var price = parseFloat(price_str);
              subtotal = num * price;
              addhtml=addhtml+"<p>"+item_name+"*"+num+"="+subtotal+"</p>";
            }
          }
        );
        $('#checkoutdetail').html(addhtml);
      }

      // function submitOrder(){
      //   $.ajax
      // }


    </script>
  </body>
</html>

