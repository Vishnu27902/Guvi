// console.log("on js");
$(document).ready(function(){
    $("#submit").click(function(e){
        $.post("login.php",
        {
            email: $("#email").val(),
            password: $("#password").val()
        },
        function(data,status){
            alert("Data: "+ data+"\n Status: "+status);
            if(status=="success"){
                window.location.href="register.html";
            }
        });
        e.preventDefault();
    });
});