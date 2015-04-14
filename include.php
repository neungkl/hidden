<?php
function include_js() {
  ?>
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation.min.js"></script>
  <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>
  <?php
}

function include_css() {
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/normalize.min.css" type='text/css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
  <link rel="import" href="bower_components/paper-button/paper-button.html">
  <?php
}
?>
