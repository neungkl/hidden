<?php
  require_once("include.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO //-->
    <meta name="keywords" content="kozartae, kosate studio, hidden, question">
    <meta name="description" content="A place you can not exit.">
    <meta property="og:image" content="http://project.kosatestudio.com/hidden/thumnail.png">
    <meta property="og:title" content="Hidden">
    <meta property="og:type" content="website">
    <meta property="fb:admins" content="100000418457798">
    <meta name="twitter:card" content="summary">
    <link rel="shortcut icon" href="../favicon.ico">

    <title>Hidden</title>
    <?php include_css(); ?>
    <style>
      body {
        font-family: 'Droid Sans Mono', Arial, sans-serif;
        background: #111;
        color: #FFF;
      }
      .block {
        text-align: center;
        white-space: nowrap;
      }
      .block:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
      }
      .centered {
        display: inline-block;
        vertical-align: middle;
      }
      #play {
        background-color: #FFF;
        color: #111;
        margin: 10px 20px;
      }
      #play a {
        height: auto;
        color: #111;
      }
      @media screen and ( max-width: 40em ) {
        .block:before {
          height: 50%;
        }
        .text-head {
          font-size: 4em;
        }
      }
      @media screen and (min-width: 40em) {
        .text-head {
          font-size: 5em;
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

    <div class="row">
      <div class="medium-6 small-12 columns">
        <div class="block">
          <div class="centered">
            <div class="text-head" id="logo-text">Hidden</div>
            A place you can not exit.
          </div>
        </div>
      </div>
      <div class="medium-6 small-12 columns">
        <div class="block">
          <div class="centered">
            <div>
              <paper-button id="play" raised><a href="game/level1.php" style="width:150px;">Play</a></paper-button>
            </div>
            <div>
              <paper-button id="play" raised><a href="skip.php" style="width:150px;">Skip Level</a></paper-button>
            </div>
            <div style="margin-top:20px;">
              <div style="display: inline-block;">
                <div class="fb-share-button" data-href="http://project.kosatestudio.com/hidden/" data-layout="button_count"></div>
              </div>
              <div style="display: inline-block;">
                <a href="https://twitter.com/share" class="twitter-share-button" data-text="H_dden. A place you can not exit.">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>
    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <script type="text/javascript">
      $(function() {
        setInterval(function() {
          if( $("#logo-text").text() == "Hidden" ) {
            $("#logo-text").text("H_dden");
          } else {
            $("#logo-text").text("Hidden");
          }
        },750);
      });
    </script>

    <?= include_anlytics(); ?>
  </body>
</html>
