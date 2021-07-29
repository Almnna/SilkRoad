<?php session_start(); require 'globals.php';?>
 <head> 
 <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link type="text/css" href="static/css/materialize.css" rel="stylesheet"/>
  <link type="text/css" href="static/css/skeleton/card.css" rel="stylesheet"/>
  <link rel="icon" href="static/images/favicon.png" type="image/x-icon">
  <link href="static/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>SilkRoad</title>
  <?php
      if(!empty($_SESSION)){
        if($_SESSION["username"] == "admin")
        {
          $settings = '<a class="right" href="manage.php" style="margin-top: -80px; margin-right: 20%">
              <i class="material-icons" style="font-size: 50px; color: var(--greeno); font-family: materialize-icons;">settings</i>
            </a>';
        }else{
          $settings = "";
        }

        $navbar_l = '
        <!-- <nav style="height: 10%;"> -->
          <div class="nav-wrapper" style="height: 18%; background-color: #f8f9fa;">
            <a href="../index.php" class="brand-logo">
              <img src="static/images/navlogo.png" width="64px; height: 74px;" style="margin-top: 1%;"/>
              </a>
            <h4 style="font-family: DotGothic; color: var(--greeno); margin-top: -4%; margin-left: 5%;">SilkRoad</h4>
            <h7 style="font-family: DotGothic; color: black; margin-left: 6%;">Anonymous Market</h7>
            <div class="container row s6 input-field" style="margin-top: -1%";>
              <label class="col s3 offset-s2" style="margin-top: -2%;" for="search">
                <i class="material-icons" style="color: var(--greeno); font-size: 2.4rem; font-family: materialize-icons;">
                  search
                </i>
              </label>
              <input type="text" class="col s6 offset-s3" id="search" style="margin-top: -50px;" name="search" placeholder="search" />
            </div>
            <a class="left" href="post.php" style="margin-top: -80px; margin-left: 19%">
              <i class="material-icons" style="font-size: 50px; color: var(--greeno); font-family: materialize-icons;">cloud_upload</i>
            </a>
            <a class="right" href="dashboard.php" style="margin-top: -80px; margin-right: 25%">
              <i class="material-icons" style="font-size: 50px; color: var(--greeno); font-family: materialize-icons;">home</i>
            </a>'.$settings.
            '<text class="right" style="font-family: DotGothic; margin-right: 9%; margin-top: -5%; font-size: 20px;">Hi, '.$_SESSION["username"].'</text>
            <text class="right" style="margin-right: 80px; margin-top: -7%; font-size: 20px;">
              <b class="material-icons" style="font-family: materialize-icons; font-size: 3rem; color: var(--greeno);">person</b>
            </text>
            <text class="right" style="font-family: DotGothic; margin-right: 10%; margin-top: -3%; font-size: 20px;">Logout</text>
            <text class="right" style="margin-right: 8%; margin-top: -3%; font-size: 20px;">
              <a href="logout.php">
                <b class="material-icons" style="font-family: materialize-icons; font-size: 2rem; color: var(--greeno);">logout</b>
              </a>
            </text>
            <span class="badge badgeoc" style="border-radius: 10px;height: 30px;%; margin-top: -4%; margin-right: 80px;">
              <b style="font-family: DotGothic; margin-top: 10px;">'.$_SESSION["bitcoins"].'₿</b>
              </span>
            <div class="vertical" style="height: 60px;  left: 95%; margin-top: -5%;"></div>
            <span class="badge badgeoc" style="border-radius: 100px;height: 30px;  left: 95%; margin-top: -3%; margin-right: 15px;">
              <b style="font-family: DotGothic; margin-top: 10px;">'.$_SESSION["contents"].'</b>
              </span>
            <text class="right" style="margin-top: -6%; margin-right: 1%;">
              <b class="material-icons" style="font-family: materialize-icons; font-size: 3rem; color: var(--greeno);">
                shopping_cart
              </b>
            </text>
          </div>
        <!-- </nav> -->
        ';
            echo $navbar_l;
        }
    ?>

  <script src="static/js/jquery-3.6.0.js">
          document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.collapsible');
          var instances = M.Collapsible.init(elems, options);
      });

      $(document).ready(function(){
      $('.collapsible').collapsible();
    });
  </script>
</head>
