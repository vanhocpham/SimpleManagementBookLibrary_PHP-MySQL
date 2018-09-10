$(document).ready(function () {
    var DOMAIN="http://localhost:8088/Projects/BookLibrary/admin";
    //manage categories
    manageCategories(1);
    function manageCategories(pn) {
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method: "POST",
            data: {manageCategories:1,pageno:pn},
            success:function (data) {
                $("#get_categories").html(data);


            }
        })

    }

    $("body").delegate(".page-link","click",function () {
        var pn=$(this).attr("pn");
        manageCategories(pn);
    })

    //delete categories
    $("body").delegate(".del_cat","click",function () {
        var did=$(this).attr("did");
        if(confirm("Are you sure delete this categories?")){
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method: "POST",
                data: {deleteCategories:1,id:did},
                success:function (data) {
                    if(data=="DEPENDENT_CATEGORY"){
                        alert("Sorry!This categories is dependent.");
                    }else if(data=="CATEGORY_DELETED"){
                        alert("Categories Deleted Success.");
                        manageCategories(1);
                    }else if(data=="DELETED"){
                        alert("Delete successful!");
                    }else {
                        alert(data);
                    }

                }
            })

        }else {

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
                var root="<option value='0'>Root</option>";
                $("#parent_cat").html(root+data);

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


    //update categories
    $("body").delegate(".edit_cat","click",function () {
        var eid=$(this).attr("eid");
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method: "POST",
            dataType: "json",
            data:{updateCategories:1,id:eid},
            success: function (data) {
                console.log(data);
                $("#cid").val(data["cid"]);
                $("#update_categories").val(data["name_cat"]);
                $("#parent_cat").val(data["parent_cat"]);

            }
        })

    })

    $("#update_category_form").on("submit",function(){
        if ($("#update_categories").val() == "") {
            $("#update_categories").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
        }else{
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data  : $("#update_category_form").serialize(),
                success : function(data){
                    if(data=="UPDATED"){

                        $("#update_categories").val("");
                        $("#parent_cat").val("0");
                        manageCategories(1);
                        $("#update_categories").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>Edit Success!</span>");

                    }else {
                        alert(data);
                    }
                }
            })
        }
    })
    //-------------------------Author--------------------------------
    manageAuthor(1);
    function manageAuthor(pn) {
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method: "POST",
            data: {manageAuthor:1,pageno:pn},
            success:function (data) {
                $("#get_author").html(data);


            }
        })

    }
    $("body").delegate(".page-link","click",function () {
        var pn=$(this).attr("pn");
        manageAuthor(pn);
    })

    //delete categories
    $("body").delegate(".del_author","click",function () {
        var did=$(this).attr("did");
        if(confirm("Are you sure delete this author?")){
            $.ajax({
                url:DOMAIN+"/includes/process.php",
                method: "POST",
                data: {deleteAuthor:1,id:did},
                success:function (data) {
                    if(data=="DELETED"){
                        alert("Delete successful!");
                        manageAuthor(1);
                    }else {
                        alert(data);
                    }

                }
            })

        }else {

        }
    })



    //update author
    $("body").delegate(".edit_author","click",function () {
        var eid=$(this).attr("eid");
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method: "POST",
            dataType: "json",
            data:{updateAuthor:1,id:eid},
            success: function (data) {
                console.log(data);
                $("#aid").val(data["aid"]);
                $("#update_author").val(data["author_name"]);

            }
        })

    })

    $("#update_author_form").on("submit",function(){
        if ($("#update_author").val() == "") {
            $("#update_author").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Author Name</span>");
        }else{
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data  : $("#update_author_form").serialize(),
                success : function(data){
                    if(data=="UPDATED"){
                        $("#update_author").val("");
                        manageAuthor(1);
                        $("#update_author").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>Edit Success!</span>");
                        window.location.href = "";
                    }else {
                        $("#update_author").removeClass("border-danger");
                        $("#cat_error").html("");
                        alert(data);
                    }
                }
            })
        }
    })


})