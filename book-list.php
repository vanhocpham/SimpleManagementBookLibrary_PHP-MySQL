<?php
require './libs/book.php';
$book = get_all_book();
disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Data Book Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        tr:hover {background-color:#c9c5c5;}

    </style>
</head>
<body>
<header></header>

<h1 style="text-align: center;color: cornflowerblue"> Management Information Library Book</h1>
<p style="text-align: center"><input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder="Fast Search ID" size="50"></p><br>
<table width="70%" align="center"  border="1" cellspacing="0" cellpadding="10" id="myTable">
    <div>
    <tr>
        <td colspan="6"><a href="book-add.php" style="background-color: olivedrab;text-decoration: none;color: white;border: solid 5px olivedrab;">Add book</a>
            <form action="book_search.php" method="get" style="float: right">
                <input type="text" name="search" placeholder="type text">
                <input type="submit" name="ok" value="search">
            </form>

        </td>
    </tr>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Style</th>
            <th>Author</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </div>

    <?php foreach ($book as $item){ ?>
        <tr>
            <td><?php echo $item['b_id']; ?></td>
            <td><?php echo $item['b_name']; ?></td>
            <td><?php echo $item['b_style']; ?></td>
            <td><?php echo $item['b_author']; ?></td>
            <td><?php echo $item['b_date']; ?></td>
            <td>
                <form method="post" action="book-delete.php">
                    <input onclick="window.location = 'book-edit.php?id=<?php echo $item['b_id']; ?>'" type="button" value="Edit"/>
                    <input type="hidden" name="id" value="<?php echo $item['b_id']; ?>"/>
                    <input onclick="return confirm('you sure wanna delete?');" type="submit" name="delete"  value="Delete"/>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");



        // Loop through all table rows, and hide those who don't match the search query
        for (i = 2; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


</body>
</html>