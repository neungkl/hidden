'use strict';

CoreStyle.g.paperInput.focusedColor = "#d50000";
CoreStyle.g.paperInput.invalidColor = "#d50000";

var err = function( txt ) {
  $("#err").attr("text",txt)[0].show();
};

function submit_iden() {
  var pass = encodeURIComponent($("#iden-inp").val());
  $.ajax({
    url : "../password.php",
    type : "post",
    data : "lvl="+lvl_num+"&pass="+pass+"&iden=1",
    success: function(res) {
      if(res == 'correct') {
        window.location.reload();
      } else {
        err("Password incorrect.");
      }
    },
    error: function() {
      err("Could not connect to internet");
    }
  });
}

function submit() {
  var pass = encodeURIComponent($("#password-inp").val());
  $.ajax({
    url : "../password.php",
    type : "post",
    data : "lvl="+lvl_num+"&pass="+pass,
    dataType : 'json',
    success: function(res) {
      if(res.status != 'correct') {
        err(res.msg);
      } else {
        location.href = res.path;
      }
    },
    error: function(errMsg) {
      console.log(errMsg);
      err("Something wrong with internet connection or server :(");
    }
  });
}

$(function() {
  $("#password-inp").keypress(function(e) {
    if( e.which == 13 ) {
      submit();
    }
  });

  $("#iden-inp").keypress(function(e) {
    if( e.which == 13 ) {
      $("paper-button").click();
    }
  });
});


      
