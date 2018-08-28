


<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/22/2018
 * Time: 10:35 AM
 */

        // if submit form ->action
        if (isset($_REQUEST['ok']))
        {
            //  addslashes fix sql injection
            $search = addslashes($_GET['search']);

            // if $search empty create notification.
            if (empty($search)) {
                echo "Let's type keyword you need find!";
            }
            else {
                // use statement "like" in sql and use % of php to search data exactly.
                $sql = "SELECT tb_book.b_id,tb_book.b_name,tb_book.b_author,tb_book.b_date,tb_style.s_style FROM tb_book
                        INNER JOIN tb_style ON tb_book.b_style=tb_style.s_id
                        WHERE 
                        b_id LIKE '%$search%'
                        OR b_name LIKE '%$search%'
                        OR b_author  LIKE '%$search%'
                        OR s_style  LIKE '%$search%'
                        ";


                // Connect DB
                $conn = mysqli_connect("localhost", "root", "", "myDB");
                mysqli_set_charset($conn, "utf8");

                // do query to DB
                $query = mysqli_query($conn, $sql);


                // if have result ->display, else notification not find result
                if (mysqli_num_rows($query) > 0 && $search != "") {
                    echo mysqli_num_rows($query) . " result be finded with keyword \"<b>$search</b>\"";


                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Style</th>";
                    echo "<th>Author</th>";
                    echo "<th>Date</th>";
                    echo "</tr>";
                    echo '<tr>';
                    //  while loop & mysql_fetch_assoc use to get all data have in table and return datatype array.
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<td>{$row['b_id']}</td>";
                        echo "<td>{$row['b_name']}</td>";
                        echo "<td>{$row['s_style']}</td>";
                        echo "<td>{$row['b_author']}</td>";
                        echo "<td>{$row['b_date']}</td>";
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "Unfortunately, not find result!";
                }
            }

        }