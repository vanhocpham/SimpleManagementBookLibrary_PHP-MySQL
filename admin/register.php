<!DOCTYPE html>
<html>

<headed>
    <title>Management Categories Book Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="./js/categories-main.js"></script>
</headed>
<body>
<?php
//Navar
include_once './templates/categories-header.php'
?>
<br>
<div class="container">
    <div class="card mx-auto" style="width: 20rem;">
        <div class="card-header"><i class="fa fa-bullhorn">&nbsp;&nbsp;</i><span class="text-success">Register</span></div>
         <div class="card-body">
            <form id="register_form" action="<?php echo DOMAIN.""?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password2">Re-enter Password</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="usertype">Usertype</label>
                    <select name="usertype" class="form-control" id="usertype">
                        <option value="0">Admin</option>
                        <option value="1">Other</option>
                    </select>
                </div>
                <button type="submit" name="user_register" class="btn btn-primary">
                    <span class="fa fa-user"></span>&nbsp;Register
                </button>
                <span><a href="categories-index.php">Login</a></span>
            </form>
        </div>

    </div>
</div>


</body>
</html>