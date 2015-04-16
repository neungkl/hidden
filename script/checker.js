CoreStyle.g.paperInput.focusedColor = "#d50000";
CoreStyle.g.paperInput.invalidColor = "#d50000";

function err( txt ) {
  $("#err").attr("text",txt)[0].show();
}

function submit_iden( prev,cur ) {
  var pass = $("#iden-inp").val();
  $.ajax({
    url : prev,
    type : "post",
    data : "pass="+pass+"&iden=1",
    success: function(res) {
      console.log( res );
      if( res == cur ) {
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
