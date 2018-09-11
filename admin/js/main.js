
$(document).ready(function(){
    var DOMAIN="http://localhost:8088/Projects/BookLibrary/admin";
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
            $("#p1_error").html("<span class='text-danger'>Please Enter more than 8 digit password</span>");
            status = false;
        }else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        if(pass2.val()==""||pass2.val().length<8){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Please Enter more than 8 digit password</span>");
            status = false;
        }else {
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
        if(pass1.val()==pass2.val()&&status==true){
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method:"POST",
                data:$("#register_form").serialize(),
                success : function (data) {
                    if (data=="EMAIL_ALREADY_EXISTS"){
                        alert("This email is used");
                    }
                    else if(data=="SOME_ERROR"){
                        alert("Something wrong!")
                    }
                    else {
                        window.location.href=encodeURI(DOMAIN+"/categories-index.php?msg=You+are+register+success+Now+you+can+login");
                    }
                }
            })
        }else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password Not Matched</span>");
            status=false;
        }
    })


    //for site login
    $("#login_form").on("submit",function () {
        var email=$("#log_email");
        var pass=$("#log_pass");
        var status=false;
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if(email.val()==""){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please enter email<span>");
            status=false;
        }else if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Email is valid.Please re-enter<span>");
            status=false;
        }else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status=true;
        }
        if(pass.val()==""||pass.val().length<8){
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please enter password and password should more 8 digit</span>");
            status=false;
        }else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status=true;
        }
        if(status){
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method:"POST",
                data:$("#login_form").serialize(),
                success : function (data) {
                    if (data=="NOT_REGISTERD"){
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>This email is not register, please new email</span>");
                     }
                    else if(data=="PASSWORD_NOT_MATCHED"){
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Password not matched, please re-enter</span>")
                        status=false;
                    }
                    else {
                        console.log(data);
                        window.location.href=encodeURI(DOMAIN+"/categories-dashboard.php?msg=Success+Login!+Welcome+to+dashboard");
                    }
                }
            })
        }
    })







    //fetch categories
    fetch_categories();
    function fetch_categories() {
        $.ajax({
            url: DOMAIN+"/includes/process.php",
            method: "POST",
            data:{getCategories:1},
            success: function (data) {
                var root="<option value='0'>Root</option>"
                var choose="<option value=''>Choose Categories</option>"
                $("#parent_cat").html(root+data);
                $("#select_cat").html(choose+data);
            }

        })

    }

    //fetch author
    fetch_author();
    function fetch_author() {
        $.ajax({
            url: DOMAIN+"/includes/process.php",
            method: "POST",
            data:{getAuthor:1},
            success: function (data) {
                var choose="<option value=''>Choose Authors</option>"
                $("#select_author").html(choose+data);
            }

        })

    }


    //add categories
    $("#categories-form").on("submit",function () {
        if($("#categories_name").val()==""){
            $("#categories_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please enter categories name</span>")
        }else {
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method: "POST",
                data: $("#categories-form").serialize(),
                success: function (data) {
                  if(data=="CATEGORIES_ADDED"){
                      $("#categories_name").removeClass("border-danger");
                      $("#cat_error").html("<span class='text-success'>New categories added successful.</span>");
                      $("#categories_name").val("");
                      fetch_categories();
                  }else{
                      alert(data);
                  }
                }
            })
        }
    })


    //add author
    $("#author-form").on("submit",function () {
        if($("#author_name").val()==""){
            $("#author_name").addClass("border-danger");
            $("#author_error").html("<span class='text-danger'>Please enter author name<span>");
        }else{
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method: "POST",
                data: $("#author-form").serialize(),
                success: function (data) {
                    if(data=="AUTHOR_ADDED"){
                        $("#author_name").removeClass("border-danger");
                        $("#author_error").html("<span class='text-success'>New author added successful.<span>");
                        $("#author_name").val("");
                        fetch_author();
                    }else {
                        alert(data);
                    }

                }
            })
        }
    })


    //add book
    $("#book_form").on("submit",function () {
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method: "POST",
            data: $("#book_form").serialize(),
            success:function (data) {
                if(data=="BOOK_ADDED"){
                    $("#book_name").val("");
                    $("#select_cat").val("");
                    $("#select_author").val("");
                    alert(data);
                }else {
                    console.log(data);
                    alert(data);
                }

            }
        })
    })


})
//show password
function showPass() {
    var x = document.getElementById("log_pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}