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
    require 'manage.php';
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

    //to get author
    if(isset($_POST["getAuthor"])){
        $obj=new DBoperation();
        $rows=$obj->getAllrecord("author");
        foreach ($rows as $row){
            echo "<option value='".$row["aid"]."'>".$row["author_name"]."</option>";
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

    //add brand
    if(isset($_POST["author_name"])){
        $obj=new DBoperation();
        $result=$obj->addAuthor($_POST["author_name"]);
        echo $result;
        exit();
    }


    //add book
    if(isset($_POST["added_date"]) AND isset($_POST["book_name"])){
        $obj=new DBoperation();
        $result=$obj->addBook($_POST["select_cat"],$_POST["select_author"],$_POST["book_name"],$_POST["added_date"]);
        echo $result;
        exit();
    }
    //manage category
    if(isset($_POST["manageCategories"])){
        $m=new Manage();
        $result=$m->manageRecordwithPagination("categories",$_POST["pageno"]);
        $rows=$result["rows"];
        $pagination=$result["pagination"];
        if (count($rows)>0){
            $n = (($_POST["pageno"] - 1) * 10)+1;
            foreach ($rows as $row){
                ?>
                <tr>
                    <td><?php echo $n;?></td>
                    <td><?php echo $row["category"];?></td>
                    <td><?php echo $row["parent"]?></td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td>
                        <a href="#" eid="<?php echo $row['cid']?>" class="btn btn-info btn-sm edit_cat" data-toggle="modal" data-target="#form_category">Edit</a>
                        <a href="#" did="<?php echo $row['cid']?>" class="btn btn-danger btn-sm del_cat">Delete</a>
                    </td>

                </tr>
                <?php
                $n++;
            }
            ?>
                <tr>
                    <td colspan="5"><?php echo $pagination;?></td>
                </tr>
            <?php

            exit();
        }
    }

    if(isset($_POST["deleteCategories"])){
        $m=new Manage();
        $result=$m->deleteRecord("categories","cid",$_POST["id"]);
        echo $result;
        exit();
    }

    //update categories
    if(isset($_POST["updateCategories"])){
        $m=new Manage();
        $result=$m->getSingleRecord("categories","cid",$_POST["id"]);
        echo json_encode($result);
        exit();
    }
    //update categories after get data
    if(isset($_POST["update_categories"])){
        $m=new Manage();
        $id=$_POST["cid"];
        $name=$_POST["update_categories"];
        $parent=$_POST["parent_cat"];
        $result=$m->update_record("categories",["cid"=>$id],["parent_cat"=>$parent,"name_cat"=>$name,"status"=>1]);
        echo $result;

    }


    //---------------------------Author-------------------------
//manage category
if(isset($_POST["manageAuthor"])){
    $m=new Manage();
    $result=$m->manageRecordwithPagination("author",$_POST["pageno"]);
    $rows=$result["rows"];
    $pagination=$result["pagination"];
    if (count($rows)>0){
        $n = (($_POST["pageno"] - 1) * 10)+1;
        foreach ($rows as $row){
            ?>
            <tr>
                <td><?php echo $n;?></td>
                <td><?php echo $row["author_name"];?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" eid="<?php echo $row['aid']?>" class="btn btn-info btn-sm edit_author" data-toggle="modal" data-target="#form_author">Edit</a>
                    <a href="#" did="<?php echo $row['aid']?>" class="btn btn-danger btn-sm del_author">Delete</a>
                </td>

            </tr>
            <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="5"><?php echo $pagination;?></td>
        </tr>
        <?php

        exit();
    }
}
if(isset($_POST["deleteAuthor"])){
    $m=new Manage();
    $result=$m->deleteRecord("author","aid",$_POST["id"]);
    echo $result;
    exit();
}

//update author
if(isset($_POST["updateAuthor"])){
    $m=new Manage();
    $result=$m->getSingleRecord("author","aid",$_POST["id"]);
    echo json_encode($result);
    exit();
}
//update author after get data
if(isset($_POST["update_author"])){
    $m=new Manage();
    $id=$_POST["aid"];
    $name=$_POST["update_author"];
    $result=$m->update_record("author",["aid"=>$id],["author_name"=>$name,"status"=>1]);
    echo $result;

}
    //---------------------------BOOK--------------------------
if(isset($_POST["manageBook"])){
    $m=new Manage();
    $result=$m->manageRecordwithPagination("book",$_POST["pageno"]);
    $rows=$result["rows"];
    $pagination=$result["pagination"];
    if (count($rows)>0){
        $n = (($_POST["pageno"] - 1) * 10)+1;
        foreach ($rows as $row){
            ?>
            <tr>
                <td><?php echo $n;?></td>
                <td><?php echo $row["book_name"];?></td>
                <td><?php echo $row["name_cat"];?></td>
                <td><?php echo $row["author_name"];?></td>
                <td><?php echo $row["added_date"];?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" eid="<?php echo $row['b_id']?>" class="btn btn-info btn-sm edit_book" data-toggle="modal" data-target="#form_book">Edit</a>
                    <a href="#" did="<?php echo $row['b_id']?>" class="btn btn-danger btn-sm del_book">Delete</a>
                </td>

            </tr>
            <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="7"><?php echo $pagination;?></td>
        </tr>
        <?php

        exit();
    }
}
//delete book
if(isset($_POST["deleteBook"])){
    $m=new Manage();
    $result=$m->deleteRecord("book","b_id",$_POST["id"]);
    echo $result;
    exit();
}
//update book
if(isset($_POST["updateBook"])){
    $m=new Manage();
    $result=$m->getSingleRecord("book","b_id",$_POST["id"]);
    echo json_encode($result);
    exit();
}
//update book after get data
if(isset($_POST["update_book"])){
    $m=new Manage();
    $id=$_POST["b_id"];
    $name=$_POST["update_book"];
    $cat=$_POST["select_cat"];
    $author=$_POST["select_author"];
    $date=$_POST["added_date"];
    $result=$m->update_record("book",["b_id"=>$id],["cid"=>$cat,"aid"=>$author,"book_name"=>$name,"added_date"=>$date,"b_status"=>1]);
    echo $result;

}

