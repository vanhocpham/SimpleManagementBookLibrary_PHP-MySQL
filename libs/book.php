<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/21/2018
 * Time: 1:36 PM
 */
    global $conn;



    //function connect to my database
    function connect_db(){
        global $conn;
        //if not connect to connected
        if(!$conn){
            $conn=mysqli_connect("localhost","root","","myDB") or die("Can\'t connect to database") ;
            //set font connect
            mysqli_set_charset($conn,'utf8');
        }
    }

    //function disconnect to database
    function disconnect_db(){
        global $conn;
        //if connected to disconnect
        if($conn){
            mysqli_close($conn);
        }
    }

    //function get all book
    function get_all_book(){
        global $conn;
        connect_db();
        $sql="SELECT * FROM tb_book";
        //create query to db
        $query=mysqli_query($conn,$sql);
        //array contain result
        $result=array();
        // Loop each record to result variable
        if($query){
            while ($row=mysqli_fetch_assoc($query)){
                $result[]=$row;
            }
        }
        return $result;
    }


    //function get book follow id
    function get_book_id($book_id){
        global $conn;
        connect_db();
        $sql="SELECT *FROM tb_book WHERE b_id=$book_id";
        //create query with condition to db
        $query=mysqli_query($conn,$sql);
        //array contain result
        $result=array();
        // Loop each record to result variable
        if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query);
            $result=$row;
        }
        return $result;
    }

    //function get book follow name
    function get_book_name($book_name){
        global $conn;
        connect_db();
        $sql="SELECT *FROM tb_book WHERE b_name=$book_name";
        //create query with condition to db
        $query=mysqli_query($conn,$sql);
        //array contain result
        $result=array();
        //loop each record to result variable
        if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query);
            $result=$row;
        }
        return$result;
    }

    //function get book follow style
    function get_book_style($book_style){
        global $conn;
        connect_db();
        $sql="SELECT * FROM  tb_book WHERE b_style=$book_style";
        //create query with condition to db
        $query=mysqli_query($conn,$sql);
        //array contain result
        $result=array();
        //loop each record to result variable
        if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query);
            $result=$row;
        }
        return $result;
    }

    //function get book follow author
    function get_book_author($book_author){
        global $conn;
        connect_db();
        $sql="SELECT * FROM tb_book WHERE b_author=$book_author";
        //create query with condition to db
        $query=mysqli_query($conn,$sql);
        //array contain result
        $result=array();
        //loop each record to result variable
        if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query);
            $result=$query;
        }
        return $result;
    }


    //function add book to db
    function add_book($book_name,$book_style,$book_author){
        global $conn;
        connect_db();
        //fix injection db
        $book_name =addslashes($book_name);
        $book_style=addslashes($book_style);
        $book_author=addslashes($book_author);


        $book_name = trim( $book_name);
        $book_name = stripslashes( $book_name);
        $book_name = htmlspecialchars( $book_name);

        $book_author = trim($book_author);
        $book_author = stripslashes($book_author);
        $book_author = htmlspecialchars($book_author);



        $sql="INSERT INTO tb_book(b_name,b_style,b_author)
              VALUES 
              ('$book_name','$book_style','$book_author')";

        $query=mysqli_query($conn,$sql);

        return $query;
    }


    //function edit book to db
    function edit_book($book_id,$book_name,$book_style,$book_author){
        global $conn;
        connect_db();
        //fix injection db
        $book_name =addslashes($book_name);
        $book_style=addslashes($book_style);
        $book_author=addslashes($book_author);

        //fix xss injection
        $book_name = trim( $book_name);
        $book_name = stripslashes( $book_name);
        $book_name = htmlspecialchars( $book_name);

        $book_author = trim($book_author);
        $book_author = stripslashes($book_author);
        $book_author = htmlspecialchars($book_author);

        $sql="UPDATE tb_book SET
               b_name='$book_name',b_style='$book_style',b_author='$book_author' WHERE b_id=$book_id";

        $query=mysqli_query($conn,$sql);

        return $query;
    }

    //function edit book to db
    function delete_book($book_id){
        global $conn;
        connect_db();


        $sql="DELETE FROM tb_book WHERE b_id=$book_id";

        $query=mysqli_query($conn,$sql);

        return $query;
    }



    //function search book follow id, name , style, author
    function search_book(){

    }





