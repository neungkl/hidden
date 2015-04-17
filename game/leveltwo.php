<?php
  session_start();

  require_once("../password.php");

  $prev_path = "level1.php";
  $cur_path = "leveltwo.php";

  $level_num = 2;

  $prev_level = "level".($level_num-1);
  $cur_level = "level".$level_num;

  if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $_SESSION[$cur_level] = $_POST["pass"];
    $tmp = authen( $cur_level,$_POST["pass"] );
    if( $tmp != "-1" ) {
      exit( $tmp );
    } else if( authen( $cur_level,strtolower($_POST["pass"]) ) != "-1" ) {
      exit( "near" );
    } else {
      exit( "-1" );
    }
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
    <script src="../script/checker.js"></script>
    <script>

      function submit() {
        var pass = $("#password-inp").val();
        if( pass.toLowerCase() == "highlight" ) {
          err("It's not a password. It's a verb !!");
          return ;
        }
        $.ajax({
          url : "<?= $cur_path ?>",
          type : "post",
          data : "pass="+pass,
          success: function(res) {
            if( res == "near" ) {
              err( "Do you know about lower case and upper case ?" );
            } else if( res == -1 ) {
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
