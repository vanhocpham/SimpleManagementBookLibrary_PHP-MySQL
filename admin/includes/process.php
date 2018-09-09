<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/7/2018
 * Time: 1:25 PM
 */
    require '../database/contants.php';
    require 'DBoperation.php';
    require 'user.php';
    if(isset($_POST["username"])AND isset($_POST["email"])){
        $user=new User();
        $result=$user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
        echo $result;
        exit();
    }

    //for login process
    if(isset($_POST["log_email"])AND isset($_POST["log_pass"])){
        $user=new User();
        $result=$user->userLogin($_POST["log_email"],$_POST["log_pass"]);
        echo $result;
        exit();
    }


    //to get categories
    if(isset($_POST["getCategories"])){
        $obj=new DBoperation();
        $rows=$obj->getAllrecord("categories");
        foreach ($rows as $row){
            echo "<option value='".$row["cid"]."'>".$row["name_cat"]."</option>";
        }
        exit();
    }
    //add categories
    if(isset($_POST["categories_name"]) AND isset($_POST["parent_cat"])){
        $obj=new DBoperation();
        $result=$obj->addCategories($_POST["parent_cat"],$_POST["categories_name"]);
        echo $result;
        exit();
    }