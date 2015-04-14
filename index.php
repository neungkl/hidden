<?php
  require_once("include.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      }
      @media screen and ( max-width: 40em ) {
        .block:before {
          height: 50%;
        }
      }
    </style>
  </head>
  <body>

    <div class="row">
      <div class="medium-6 small-12 columns">
        <div class="block">
          <div class="centered">
            <div style="font-size:5em;" id="logo-text">Hidden</div>
            The place you can not exit.
          </div>
        </div>
      </div>
      <div class="medium-6 small-12 columns">
        <div class="block">
          <div class="centered">
            <paper-button id="play" raised>Play</paper-button>
          </div>
        </div>
      </div>
    </div>

    <?php include_js(); ?>
    <script>
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
  </body>
</html>
