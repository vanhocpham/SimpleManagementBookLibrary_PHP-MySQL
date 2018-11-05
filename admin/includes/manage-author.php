<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/10/2018
 * Time: 4:12 PM
 */
?>
<?php
require '../database/contants.php';
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
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/manage.js"></script>
</head>
<body>
<?php
//Navar
include_once '../templates/categories-header.php'
?>

<br><br><br>
<div class="container">
    <h2>Author manage</h2>
    <table class="table table-hover table-bordered table-sm white">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_author">
        <!--        <tr>-->
        <!--            <td>1</td>-->
        <!--            <td>Truyện Ngắn</td>-->
        <!--            <td>Root</td>-->
        <!--            <td><a href="#" class="btn btn-success btn-sm">Active</a></td>-->
        <!--            <td>-->
        <!--                <a href="#" class="btn btn-info btn-sm">Edit</a>-->
        <!--                <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
        <!--            </td>-->
        <!---->
        <!--        </tr>-->
        </tbody>
    </table>
</div>


<?php
    require '../templates/update-author.php';
?>
</body>
</html>

