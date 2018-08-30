<?php
require './libs/PaginationControl.php';
require './libs/PaginationControlSearch.php';
require 'book_search.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>List Data Book Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/style.css">

</head>
<header></header>

<h1> Management Information Library Book</h1>
<p class="fastsearch">
        <span>ID:<input type="text" id="myInput" onkeyup="myFunction()"   placeholder="Type Content" size="20">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span>Name:<input type="text" id="myInput1" onkeyup="myFunction1()"   placeholder="Type Content" size="20">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span>Style:<input type="text" id="myInput2" onkeyup="myFunction2()"   placeholder="Type Content" size="20">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span>Author:<input type="text" id="myInput3" onkeyup="myFunction3()"   placeholder="Type Content" size="20"></span>


</p><br>


    <?php if(!isset($_GET['search'])){ ?>
        <table width="70%" align="center"  border="1" cellspacing="0" cellpadding="10" id="myTable" >
            <div >
                <tr>
                    <td colspan="6"><a href="book-add.php"  class="addbook">Add book</a>
                        <form action="book-list.php" method="get" style="float: right">
                            <input type="text" name="search" placeholder="type text">
                            <input type="submit" name="ok" value="search">
                        </form>

                    </td>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Style</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </div>
                <?php while ($item=mysqli_fetch_array($nquery,MYSQLI_ASSOC)){ ?>
        <tr>
            <td><?php echo $item['b_id']; ?></td>
            <td><?php echo $item['b_name']; ?></td>
            <td><?php echo $item['s_style']; ?></td>
            <td><?php echo $item['b_author']; ?></td>
            <td><?php echo $item['b_date']; ?></td>
            <td>
                <form method="post" action="book-delete.php" >
                    <input onclick="window.location = 'book-edit.php?id=<?php echo $item['b_id']; ?>'" type="button" value="Edit"/>
                    <input type="hidden" name="id" value="<?php echo $item['b_id']; ?>"/>
                    <input onclick="return confirm('you sure wanna delete?');" type="submit" name="delete"  value="Delete"/>
                </form>
            </td>
        </tr>

    <?php
        } ?>
</table>
    <div class="center">
        <div class="pagination">
            <?php echo $paginationCtrls; ?>
        </div>
    </div>


<?php
    }
    else {
    // if have result ->display, else notification not find result
    if (mysqli_num_rows($querys)!=0&& $search != "") {
    echo mysqli_num_rows($querys) . " result be finded with keyword \"<b>$search</b>\"";


    ?>
<table width="70%" align="center" border="1" cellspacing="0" cellpadding="10" id="myTable">
    <div>
        <tr>
            <td colspan="6"><a href="book-add.php" class="addbook">Add book</a>
            </td>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Style</th>
            <th>Author</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </div>
    <?php while ($item = mysqli_fetch_array($squery, MYSQLI_ASSOC)) { ?>
        <tr>
            <td><?php echo $item['b_id']; ?></td>
            <td><?php echo $item['b_name']; ?></td>
            <td><?php echo $item['s_style']; ?></td>
            <td><?php echo $item['b_author']; ?></td>
            <td><?php echo $item['b_date']; ?></td>
            <td>
                <form method="post" action="book-delete.php">
                    <input onclick="window.location = 'book-edit.php?id=<?php echo $item['b_id']; ?>'" type="button"
                           value="Edit"/>
                    <input type="hidden" name="id" value="<?php echo $item['b_id']; ?>"/>
                    <input onclick="return confirm('you sure wanna delete?');" type="submit" name="delete"
                           value="Delete"/>
                </form>
            </td>
        </tr>

        <?php
            } ?>

</table>
<div class="center">
    <div class="pagination">
        <?php echo $SpaginationCtrls; ?>
    </div>
</div>
    <?php }else {
        echo "Unfortunately, not find result!";
    }
        ?>
<?php }?>

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
    function myFunction1() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");



        // Loop through all table rows, and hide those who don't match the search query
        for (i = 2; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function myFunction2() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");



        // Loop through all table rows, and hide those who don't match the search query
        for (i = 2; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function myFunction3() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput3");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");



        // Loop through all table rows, and hide those who don't match the search query
        for (i = 2; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
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