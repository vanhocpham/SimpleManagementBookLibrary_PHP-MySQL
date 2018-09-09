<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/4/2018
 * Time: 3:29 PM
 */
class Database{
    private $con;
    public function connect(){
        include_once 'contants.php';
        $this->con=new Mysqli(HOST,USER,PASS,DB);
        mysqli_set_charset($this->con,'utf8');
        if ($this->con){
            return $this->con;
        }
        return "DATABASE_CONNECTION_FAIL";
    }
}
