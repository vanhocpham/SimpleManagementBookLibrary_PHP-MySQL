


<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/22/2018
 * Time: 10:35 AM
 */

        // if submit form ->action
        if (isset($_GET['search']))
        {
            //  addslashes fix sql injection
            $search = addslashes($_GET['search']);

            // if $search empty create notification.
            if (empty($search)) {
            }
            else {
                // use statement "like" in sql and use % of php to search data exactly.


                // Connect DB
                $conn = mysqli_connect("localhost", "root", "", "myDB");
                mysqli_set_charset($conn, "utf8");

                // do query to DB
                $querys = mysqli_query($conn, "SELECT tb_book.b_id,tb_book.b_name,tb_book.b_author,tb_book.b_date,tb_style.s_style FROM tb_book
                        INNER JOIN tb_style ON tb_book.b_style=tb_style.s_id
                        WHERE 
                        b_id LIKE '%$search%'
                        OR b_name LIKE '%$search%'
                        OR b_author  LIKE '%$search%'
                        OR s_style  LIKE '%$search%'
                        ");



            }

        }
        ?>
