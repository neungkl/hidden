<?php
  session_start();

  require_once("../password.php");

  $prev_path = "math.php";
  $cur_path = "xbox.php";

  $level_num = 7;

  $prev_level = "level".($level_num-1);
  $cur_level = "level".$level_num;

  if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $_SESSION[$cur_level] = $_POST["pass"];
    exit( authen( $cur_level,$_POST["pass"] ) );
  }

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
    if( !isset($_SESSION[$prev_level]) || authen($prev_level,$_SESSION[$prev_level]) != $cur_path ) {
      include_identifying( $level_num-1,$prev_path,$cur_path );
    } else {
    ?>
    <div class="row">
      <div class="small-12 columns">
        <div class="block">
          <div class="centered">
            <div style="font-size:2.5em;">Level <?= $level_num ?></div>
            <div style="font-size:0.6em;">
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
              xbox xbox xbox xbox xbox xbox xbox xbox xbox xbox<br>
            </div>
            <div style="margin-bottom:40px;"></div>

            <paper-input-decorator style="text-align:left;" label="password" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="password-inp" is="core-input" maxlength="20" placeholder="" aria-label="password">
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

    <paper-toast id="err" text="Your draft has been discarded." style="background-color:#d50000;" onclick="discardDraft(el)"></paper-toast>

    <?php include_js("../"); ?>
    <script src="../script/checker.js"></script>
    <script>

      function submit() {
        var pass = $("#password-inp").val();
        if( pass == "5.85987448205" ) {
          err("Too easy for plus two number");
          return ;
        }
        $.ajax({
          url : "<?= $cur_path ?>",
          type : "post",
          data : "pass="+pass,
          success: function(res) {
            if( res == -1 ) {
              err("Password incorrect.");
            } else {
              location.href = res;
            }
          },
          error: function() {
            err("Could not connect to internet");
          }
        });
      }

    </script>
  </body>
</html>