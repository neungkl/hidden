<?php
  session_start();

  require_once("password.php");

  $prev_path = "leveltwo.php";
  $cur_path = "three.php";

  $level_num = 3;

  $prev_level = "level".($level_num-1);
  $cur_level = "level".$level_num;

  if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $_SESSION[$cur_level] = $_POST["pass"];
    exit( authen( $cur_level,$_POST["pass"] ) );
  }

  require_once("include.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidden</title>
    <?php include_css(); ?>
    <link rel="import" href="bower_components/paper-input/paper-input-decorator.html">
    <link rel="import" href="bower_components/paper-input/paper-char-counter.html">
    <link rel="import" href="bower_components/paper-toast/paper-toast.html">
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
        min-width: 300px;
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

    <?php
    if( !isset($_SESSION[$prev_level]) || authen($prev_level,$_SESSION[$prev_level]) != $cur_path ) {
    ?>
    <div class="row">
      <div class="small-12 columns"
        <div class="block">
          <div class="block">
            <div class="centered">
              <div style="font-size:1.5em;">Enter Level <?= $level_num-1 ?> Password</div>
              <div>For identifying that you are not a hacker :D</div>
              <paper-input-decorator style="text-align:left;" label="password" error="Too long" layout="" vertical="" class="" floatingLabel>
                <input id="iden-inp" is="core-input" maxlength="20" placeholder="" aria-label="password">
                <paper-char-counter class="counter" target="iden-inp"></paper-char-counter>
              </paper-input-decorator>

              <paper-button style="background-color:#d50000;" onclick="submit_iden('<?= $prev_path ?>','<?= $cur_path ?>')">Enter</paper-button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    } else {
    ?>
    <div class="row">
      <div class="small-12 columns">
        <div class="block">
          <div class="centered">
            <div style="font-size:2.5em;">Level <?= $level_num ?></div>
            <div>Highlight</div>
            <div style="color:#111;">AAA</div>
            <div  style="margin-bottom:40px;"></div>

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

    <?php include_js(); ?>
    <script src="script/checker.js"></script>
    <script>

      function submit() {
        var pass = $("#password-inp").val();
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
