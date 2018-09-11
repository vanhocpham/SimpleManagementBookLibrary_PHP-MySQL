<?php
require './database/contants.php';
if(isset($_SESSION["userid"])){
    header("loacation:".DOMAIN."/");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Management Categories Book Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<?php
//Navar
include_once './templates/categories-header.php'
?>

<br><br><br>
<div class="container" >
    <?php
    if (isset($_GET['msg'])AND !empty($_GET['msg'])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET['msg'];?>&nbsp;&nbsp;&nbsp;<i class="fa fa-award">&nbsp;</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto" >
                <img class="card-img-top mx-auto" style="width: 40%;" src="./images/profile.png" alt="Profile Icon">
                <div class="card-body">
                    <h4 class="card-title">Profile Info</h4>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Pham Hoc</p>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                    <p class="card-text">Last Login: xxxx-xx-xx</p>
                    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="width:100%; height: 100%">
                <h4>Welcome Admin,</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p> Have a nice day!</p>
                        <iframe src="http://free.timeanddate.com/clock/i6e8aau0/n95/szw110/szh110/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98" frameborder="0" width="110" height="110"></iframe>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mx-auto" >
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">Here you can make invoices and create new orders</p>
                                <a href="#" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto"  >
                <div class="card-body mx-auto">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">Here you can manage your categories and you add new parent and sub categories.</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_categories"><i class="fa fa-plus">&nbsp;</i>Add</a>
                    <a href="./includes/manage-categories.php" class="btn btn-success"><i class="fa fa-user-edit">&nbsp;</i>Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mx-auto">
                <div class="card-body mx-auto">
                    <h5 class="card-title">Author</h5>
                    <p class="card-text">Here you can manage your book author style and you add new book author style.</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_author"><i class="fa fa-plus">&nbsp;</i>Add</a>
                    <a href="./includes/manage-author.php" class="btn btn-success"><i class="fa fa-user-edit">&nbsp;</i>Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mx-auto"  >
                <div class="card-body mx-auto">
                    <h5 class="card-title">Book</h5>
                    <p class="card-text">Here you can manage your book and you add new book .</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_book"><i class="fa fa-plus">&nbsp;</i>Add</a>
                    <a href="./includes/manage-book.php" class="btn btn-success"><i class="fa fa-user-edit">&nbsp;</i>Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>


        <?php

            include_once './templates/categories-modal.php';
            include_once './templates/author-modal.php';
            include_once './templates/book-modal.php';
        ?>

</body>
</html>
