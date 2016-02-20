<?php

  // What are you looking for LOL

  $path = array(
    "",
    "level1.php",
    "leveltwo.php",
    /*...*/
  );

  $PASS = array(
    array(),
    //level 1
    array(
      "apple" => array("status" => "correct")
    ),
    //level 2
    array(
      "lava" => array("status" => "correct"),
      "highlight" => array("status" => "incorrect", "msg" => "It's not a password. It's a verb !!")
    ),
    /*...*/
  );

?>
