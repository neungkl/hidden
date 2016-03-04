<?php

  // What are you looking for LOL

  $path = array(
    "",
    "level1.php",
    "leveltwo.php",
    /*...*/
  );

  function incorrect_obj($msg) {
    return array('status' => 'incorrect', 'msg' => $msg);
  }

  $correct_obj = array('status' => "correct");

  $PASS = array(
    array(),
    //level 1
    array(
      "android" => $correct_obj
    ),
    //level 2
    array(
      "highlight" => incorrect_obj("It's not a password. It's a verb !"),
      "lava" => $correct_obj,
    ),
    /*...*/
  );

?>

test