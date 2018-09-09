<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/9/2018
 * Time: 12:34 PM
 */
    class DBoperation{
        private $con;
        function __construct()
        {
            require '../database/db.php';
            $db=new Database();
            $this->con=$db->connect();
        }
        public function addCategories($parent,$cat){
            $pre_stmt=$this->con->prepare("INSERT INTO `categories`( `parent_cat`, `name_cat`, `status`) VALUES (?,?,?)");
            $status=1;
            $pre_stmt->bind_param("isi",$parent,$cat,$status);
            $result=$pre_stmt->execute() or die($this->con->error);
            if($result){
                return "CATEGORIES_ADDED";
            }else{
                return 0;
            }

        }
        public function getAllrecord($table){
            $pre_stmt=$this->con->prepare("SELECT * FROM ".$table);
            $pre_stmt->execute() or die($this->con->error);
            $result=$pre_stmt->get_result();
            $rows=array();
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()){
                    $rows[]=$row;

                }
                return $rows;
            }
            return "NO_DATA";
        }
    }
    //$obj=new DBoperation();
   // echo "<pre>";
   // print_r($obj->getAllrecord("categories"));
