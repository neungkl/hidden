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
        width: 300px;
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
      <div class="small-12 columns">
        <div class="block">
          <div class="centered">
            <div style="font-size:2.5em;">Level 1</div>
            <div style="margin-bottom:40px;">Password is apple</div>

            <paper-input-decorator style="text-align:left;" label="password" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="password-inp" is="core-input" maxlength="20" placeholder="" aria-label="password">
              <paper-char-counter class="counter" target="password-inp"></paper-char-counter>
            </paper-input-decorator>

            <paper-button style="background-color:#d50000;" onclick="submit()">Enter</paper-button>
          </div>
        </div>
      </div>

      <paper-toast id="err" text="Your draft has been discarded." style="background-color:#d50000;" onclick="discardDraft(el)"></paper-toast>
    </div>

    <?php include_js(); ?>
    <script>
      CoreStyle.g.paperInput.focusedColor = "#d50000";
      CoreStyle.g.paperInput.invalidColor = "#d50000";

      function submit() {
        var pass = $("#password-inp").val();
        $("#err").attr("text",pass)[0].show();
      }

      $(function() {
        setInterval(function() {
          if( $("#logo-text").text() == "Hidden" ) {
            $("#logo-text").text("H_dden");
          } else {
            $("#logo-text").text("Hidden");
          }
        },750);

        $("#password-inp").keypress(function(e) {
          if( e.which == 13 ) {
            submit();
          }
        });
      });
    </script>
  </b ody>
</html>
