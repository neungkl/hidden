<?php
  session_start();

  $lvl_num = 26;
  require_once("../password.php");
  require_once("../include.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidden</title>
    <?php include_css("../"); ?>
    <?php include_game_header("../"); ?>
    <style>
      .head {
        font-size: 2.5em;
      }
      .centered {
        width: 400px;
      }
      @media screen and (max-width: 40em) {
        .head {
          font-size: 2em;
        }
        .centered {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=971120696244513";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php
    if( pass_iden() ) {
      include_identifying();
    } else {
    ?>
    <div class="row">
      <div class="small-12 columns">
        <div class="block">
          <div class="centered">
            <div class="head">Congratulation</div>
            <div>You pass all levels.</div>
            <div style="margin-bottom: 20px;"></div>

            <div class="stat" style="margin-bottom: 20px; font-size: 1.5em;"></div>

            <div style="display: inline-block;">
              <div class="fb-share-button" data-href="http://project.kosatestudio.com/hidden/" data-layout="button_count"></div>
            </div>
            <div style="display: inline-block;">
              <a href="https://twitter.com/share" class="twitter-share-button" data-text="H_dden. A place you can not exit.">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>
            
            <div style="margin-bottom:20px;"></div>

            <a href="../index.php" style="color:white;"><paper-button style="background-color:#d50000; font-size:0.8em; width:200px;">Go to Main Page</paper-button></a>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>

    <paper-toast id="err" text="" style="background-color:#d50000;" onclick="discardDraft(el)"></paper-toast>

    <?php include_game_footer(); ?>

    <?php include_js("../"); ?>
    <script>
      $(function() {

        var fillZero = function(num) {
          if(num < 10) return '0' + num;
          return num;
        };

        var t = new Date();
        var res = fillZero(t.getHours()) + ":" + fillZero(t.getMinutes()) + " " + t.getDay() + "/" + t.getMonth() + "/" + t.getFullYear();

        $('.stat').text(res);
      });
    </script>

    <?= include_anlytics(); ?>
  </body>
</html>
