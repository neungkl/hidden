<?php

  // What are you looking for LOL

  function authen( $lvl, $pass ) {

    $PASS = array(
      "level1" => [["apple","leveltwo.php"]]
    );

    foreach( $PASS[$lvl] as $sub ) {
      if( $sub[0] == $pass ) {
        return $sub[1];
      }
    }
    return "-1";
  }
?>
