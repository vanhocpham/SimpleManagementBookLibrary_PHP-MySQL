<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/29/2018
 * Time: 10:38 AM
 */

if (isset($_GET['search']))
{
    //  addslashes fix sql injection

    $search = addslashes($_GET['search']);
    $search = trim( $search);
    $search = stripslashes( $search);
    $search = htmlspecialchars( $search);
    $conn=mysqli_connect("localhost","root","","myDB") or die("Can\'t connect to database") ;

    //set font connect
    mysqli_set_charset($conn,'utf8');
    $query=mysqli_query($conn,"SELECT tb_book.b_id,tb_book.b_name,tb_book.b_author,tb_book.b_date,tb_style.s_style FROM tb_book
                        INNER JOIN tb_style ON tb_book.b_style=tb_style.s_id
                        WHERE 
                        b_id LIKE '%$search%'
                        OR b_name LIKE '%$search%'
                        OR b_author  LIKE '%$search%'
                        OR s_style  LIKE '%$search%'
                        ");
    //total row
    $rows = mysqli_num_rows($query);
    //index row=0
    //number page wanna display
    $page_rows = 3;
    //total number page expect display
    $last = ceil($rows/$page_rows);
    //number page never <1
    if($last<1){
        $last=1;
    }
    //establish $page_num variable
    $pagenum = 1;
    //update URL follow page_num var
    if(isset($_GET['page'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
    }
    if ($pagenum < 1) {
        $pagenum = 1;
    }else if ($pagenum>$last){
        $pagenum=$last;
    }
    //set the range of rows to query for chose pagenum
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    $squery=mysqli_query($conn,"SELECT tb_book.b_id, tb_book.b_name, tb_style.s_style,tb_book.b_author,tb_book.b_date 
                                       FROM tb_book 
                                       INNER JOIN tb_style ON tb_book.b_style=tb_style.s_id
                                        WHERE 
                                        b_id LIKE '%$search%'
                                        OR b_name LIKE '%$search%'
                                        OR b_author  LIKE '%$search%'
                                        OR s_style  LIKE '%$search%'
                                       ORDER BY tb_book.b_id $limit");
    //establish $paginationCtrls variable
    $SpaginationCtrls = '';

    //if page >1 do
    if($last!=1) {
        //check condition page is page 1 not previous or next
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $SpaginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?search='.$search.'&page=' . $previous . '" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
        }
        //Render clickable number link that should appear on
        for ($i = $pagenum - 4; $i < $pagenum; $i++) {
            if ($i > 0) {
                $SpaginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] .'?search='.$search.'&page=' . $i . '" class="btn btn-default">' . $i . '</a> &nbsp; ';
            }

        }
        //render the target page number, but without it being a link
        $SpaginationCtrls .= '<a class="active">' . $pagenum . '</a> &nbsp; ';
        //Render clickable number link that should appear on the right of the target page number
        for ($i = $pagenum + 1; $i <= $last; $i++) {
            $SpaginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?search='.$search.'&page=' . $i . '" class="btn btn-default">' . $i . '</a> &nbsp; ';
            if ($i >= $pagenum + 4) {
                break;
            }

        }
        //this does the same as above,only checking if we are on the last page,and then generate the "Next"
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $SpaginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?search='.$search.'&page=' . $next . '" class="btn btn-default">Next</a> ';
        }

    }
    }
