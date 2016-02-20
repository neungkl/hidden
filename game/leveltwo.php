<?php
  session_start();

  $lvl_num = 2;
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
            <div style="font-size:2.5em;">Level <?= $lvl_num ?></div>
            <div>Highlight</div>
            <div style="color:#111;">Password is Lava</div>
            <div  style="margin-bottom:40px;"></div>

            <paper-input-decorator style="text-align:left;" label="password" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="password-inp" is="core-input" maxlength="30" placeholder="" aria-label="password">
              <paper-char-counter class="counter" target="password-inp"></paper-char-counter>
            </paper-input-decorator>

            <paper-button style="background-color:#d50000;" onclick="submit()">Enter</paper-button>
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
