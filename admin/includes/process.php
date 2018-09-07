<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/7/2018
 * Time: 1:25 PM
 */
    require '../database/contants.php';
    require 'user.php';
    if(isset($_POST["username"])AND isset($_POST["email"])){
        $user=new User();
        $result=$user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
        echo $result;
    }

    //for login process
    if(isset($_POST["log_email"])AND isset($_POST["log_pass"])){
        $user=new User();
        $result=$user->userLogin($_POST["log_email"],$_POST["log_pass"]);
        echo $result;
    }