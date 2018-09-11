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
            $parent =addslashes($parent);
            $cat =addslashes($cat);

            $parent = trim( $parent);
            $parent = stripslashes( $parent);
            $parent = htmlspecialchars( $parent);

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


        public function addAuthor($author_name){
            $author_name =addslashes($author_name);

            $author_name = trim( $author_name);
            $author_name = stripslashes( $author_name);
            $author_name = htmlspecialchars( $author_name);

            $pre_stmt=$this->con->prepare("INSERT INTO `author`( `author_name`, `status`) VALUES (?,?)");
            $status=1;
            $pre_stmt->bind_param("si",$author_name,$status);
            $result=$pre_stmt->execute() or die($this->con->error);
            if($result){
                return "AUTHOR_ADDED";
            }else{
                return 0;
            }

        }



        public function addBook($cid,$aid,$book_name,$date){
            $book_name =addslashes($book_name);

            $book_name = trim( $book_name);
            $book_name = stripslashes( $book_name);
            $book_name = htmlspecialchars( $book_name);

            $pre_stmt=$this->con->prepare("INSERT INTO `book`( `cid`, `aid`, `book_name`, `added_date`, `b_status`) VALUES (?,?,?,?,?)");
            $status=1;
            $pre_stmt->bind_param("iissi",$cid,$aid,$book_name,$date,$status);
            $result=$pre_stmt->execute() or die($this->con->error);
            if($result){
                return "BOOK_ADDED";
            }else{
                return 0;
            }

        }
    }


    //$obj=new DBoperation();
   // echo "<pre>";
   // print_r($obj->getAllrecord("categories"));
