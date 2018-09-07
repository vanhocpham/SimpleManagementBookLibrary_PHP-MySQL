
$(document).ready(function(){
    $("#register_form").on("submit",function(){
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");

        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if(name.val() == "" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
            status = false;
        }else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
            status = false;
        }else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        if(pass1.val()==""||pass1.val().length<8){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'></span>");
            status = false;
        }else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        if(pass2.val()==""||pass2.val().length<8){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'></span>");
            status = false;
        }else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
        if(type.val()=="") {
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Let's a usertype</span>");
            status = false;
        }else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status=true;
        }
        if(pass1.val()==pass2.val()){

        }else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password Not Matched</span>");
            status=false;
        }
    })
})