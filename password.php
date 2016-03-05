<?php
  @session_start();

  include('sensitive.php');

  if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    $_POST['lvl'] = intval($_POST['lvl']);
    if($_POST['lvl'] == 0) exit();

    if(isset($_POST['iden']) && $_POST['iden'] == '1') {
      $_SESSION['level'.($_POST['lvl']-1)] = $_POST['pass'];
      echo authen_prev($_POST['lvl'], $_POST['pass']);
    } else {
      $_SESSION['level'.$_POST['lvl']] = $_POST['pass'];
      echo json_encode(authen($_POST['lvl'], $_POST['pass']));
    }
    exit();
  }

  function safe_pass($pass) {
    return trim(strtolower($pass));
  }

  function pass_iden() {
    global $lvl_num;
    return !isset($_SESSION['level'.($lvl_num-1)]) || authen_prev($lvl_num, $_SESSION['level'.($lvl_num-1)]) != 'correct';
  }

  function authen( $lvl, $pass ) {

    global $path, $PASS;    

    $pass = safe_pass($pass);

    if(strlen($pass) == 0) {
      return array(
        "status" => "incorrect",
        "msg" => "Please enter password."
      );
    }

    foreach( $PASS[$lvl] as $key => $value ) {
      if( safe_pass($key) == $pass ) {
        if($value['status'] == "correct") {
          $value['path'] = $path[$lvl+1];
        }
        return $value;
      }
    }
    return array(
      "status" => "incorrect",
      "msg" => "Password incorrect."
    );
  }

  function authen_prev( $lvl, $pass ) {
    global $PASS;
    $lvl--;

    $pass = safe_pass($pass);

    foreach( $PASS[$lvl] as $key => $value ) {
      if( safe_pass($key) == $pass && $value['status'] == 'correct' ) {
        return 'correct';
      }
    }
    return 'incorrect';
  } 
?>
