$(document).ready(function () {
    $("#submit").click(function (event) {
        $.post("register.php",
        {
            name: $("#username").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            phnumber: $("#phnumber").val()
        },
        function(data,status){
            $("#status").text(data);
            $("#status").addClass("red");
            if(status=="success"){
                window.location.href="#";
            }
        });
      event.preventDefault();
    });
  });