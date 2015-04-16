<?php
function include_js( $path = "" ) {
  ?>
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>
  <script src="<?= $path ?>bower_components/webcomponentsjs/webcomponents.min.js"></script>
  <?php
}

function include_css( $path = "" ) {
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/normalize.min.css" type='text/css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
  <link rel="import" href="<?= $path ?>bower_components/paper-button/paper-button.html">
  <?php
}

function include_identifying( $level_num, $prev_path, $cur_path ) {
  ?>
  <div class="row">
    <div class="small-12 columns"
      <div class="block">
        <div class="block">
          <div class="centered">
            <div style="font-size:1.5em;">Enter Level <?= $level_num ?> Password</div>
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
}

function include_game_header( $path = "" ) {
  ?>
  <link rel="import" href="<?= $path ?>bower_components/paper-input/paper-input-decorator.html">
  <link rel="import" href="<?= $path ?>bower_components/paper-input/paper-char-counter.html">
  <link rel="import" href="<?= $path ?>bower_components/paper-toast/paper-toast.html">
  <link rel="stylesheet" href="<?= $path ?>script/game.css">
  <?php
}
?>
