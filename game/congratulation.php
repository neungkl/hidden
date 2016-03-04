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
            <div style="margin-bottom:40px;"></div>


            <paper-button style="background-color:#d50000; width:200px;" onclick="submit()">Go to Main Page</paper-button>
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
  </body>
</html>
