<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/9/2018
 * Time: 2:18 PM
 */
    require './database/contants.php';
    if(isset($_SESSION['userid'])){
        session_destroy();
    }
    header("location".DOMAIN."/");