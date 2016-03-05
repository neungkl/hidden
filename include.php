<?php
function include_js( $path = "" ) {
  global $lvl_num;
  ?>
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
    var lvl_num = <?= $lvl_num ?>;
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>
  <script src="<?= $path ?>bower_components/webcomponentsjs/webcomponents.min.js"></script>
  <script src="<?= $path ?>script/checker.js"></script>
  <?php
}

function include_css( $path = "" ) {
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/normalize.min.css" type='text/css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
  <link rel="import" href="<?= $path ?>bower_components/paper-button/paper-button.html">
  <style>
    paper-input-decorator[focused] /deep/ .floated-label .label-text {
        color: #d50000;
    }
    paper-input-decorator /deep/ .focused-underline {
        background-color: #d50000;
    }
  </style>
  <?php
}

function include_identifying() {
  global $lvl_num;
  ?>
  <div class="row">
    <div class="small-12 columns"
      <div class="block">
        <div class="block">
          <div class="centered">
            <div style="font-size:1.5em;">Enter Level <?= $lvl_num-1 ?> Password</div>
            <div>For identifying that you are not a hacker :D</div>
            <paper-input-decorator style="text-align:left;" label="password" error="Too long" layout="" vertical="" class="" floatingLabel>
              <input id="iden-inp" is="core-input" maxlength="30" placeholder="" aria-label="password">
              <paper-char-counter class="counter" target="iden-inp"></paper-char-counter>
            </paper-input-decorator>

            <paper-button style="background-color:#d50000;" onclick="submit_iden('<?= $lvl_num ?>')">Enter</paper-button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}

function include_game_header( $path = "" ) {
  ?>
  <meta name="robots" content="noindex" />
  <link rel="import" href="<?= $path ?>bower_components/paper-input/paper-input-decorator.html">
  <link rel="import" href="<?= $path ?>bower_components/paper-input/paper-char-counter.html">
  <link rel="import" href="<?= $path ?>bower_components/paper-toast/paper-toast.html">
  <link rel="stylesheet" href="<?= $path ?>script/game.css">
  <?php
}

function include_game_footer( $path = "" ) {
  global $lvl_num;
  include_anlytics();
  ?>
  <script>
  ga('send', 'event', 'game', 'level', '<?= $lvl_num ?>');
  </script>
  <?php
}


function include_anlytics() {
  ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39468607-1', 'auto');
  ga('send', 'pageview');
  </script>
  <?php
}
?>
