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
    
    <?= include_css() ?>
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
        width: 350px;
      }
      * {
        white-space:normal; word-wrap: break-word;
      }
      @media screen and (max-width: 30em) {
        .centered {
          width : 100%;
        }
      }
      @media only screen {
        .column, .columns {
          padding-right: 1.875rem;
        }
      }
    </style>
  </head>
  <body>

    <div class="row">
      <div class="small-12 columns">
        <div class="block">
          <div class="centered">
            <div style="font-size:2.5em;">Skip</div>
            <div style="margin-bottom: 20px;">Enter level you want to skip and previous level password.</div>

            <paper-input-decorator style="text-align:left;" label="Enter level" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="level-inp" is="core-input" maxlength="2" placeholder="" aria-label="level">
            </paper-input-decorator>

            <paper-input-decorator style="text-align:left;" label="Enter previous level password" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="password-inp" is="core-input" maxlength="30" placeholder="" aria-label="password">
              <paper-char-counter class="counter" target="password-inp"></paper-char-counter>
            </paper-input-decorator>

            <paper-button style="background-color:#d50000;" onclick="submit()">Skip</paper-button>
          </div>

        </div>
      </div>

      <paper-toast id="err" text="" style="background-color:#d50000;" onclick="discardDraft(el)"></paper-toast>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>
    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <script>
      CoreStyle.g.paperInput.focusedColor = "#d50000";
      CoreStyle.g.paperInput.invalidColor = "#d50000";

      $(function() {
        $('#level-inp').on('keyup', function() {
          var level  = $('#level-inp').val();
          if(level != parseInt(level) || parseInt(level) < 2) {
            $('#password-inp').parent().attr('label', 'Enter previous level password');
          } else {
            $('#password-inp').parent().attr('label', 'Enter password level ' + (parseInt(level) - 1));
          }

        });
      });

      function submit() {

        var err = function(msg) {
          $("#err").attr("text",msg)[0].show();
        }

        var level = $.trim($('#level-inp').val());
        var pass = $.trim($('#password-inp').val());

        if(level.length == 0) { err('Please enter level'); return ; }
        if(level != parseInt(level) || parseInt(level) > 25) { err('Level is incorrect.'); return ; }
        if(pass.length == 0) { err('Please enter password.'); return ; }

        if(level == 1) {
          location.href = './game/level1.php';
          return ;
        }

        var pass = encodeURIComponent($("#password-inp").val());
        $.ajax({
          url : "password.php",
          type : "post",
          data : "lvl="+(level-1)+"&pass="+pass,
          dataType : 'json',
          success: function(res) {
            if(res.status != 'correct') {
              err('Password incorrect.');
            } else {
              location.href = './game/' + res.path;
            }
          },
          error: function(errMsg) {
            console.log(errMsg);
            err("Something wrong with internet connection or server :(");
          }
        });
      }
    </script>
  </body>
</html>
