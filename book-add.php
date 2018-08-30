<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 8/21/2018
 * Time: 1:37 PM
 */

require './libs/book.php';
require './libs/PaginationControl.php';



// if user submit form
if (!empty($_POST['add_book']))
{
    // take data
    $data['b_name']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['b_style']         = isset($_POST['style']) ? $_POST['style'] : '';
    $data['b_author']    = isset($_POST['author']) ? $_POST['author'] : '';

    // Validate information
    $errors = array();
    if (empty($data['b_name'])){
        $errors['b_name'] = "You don't type book name"  ;
    }

    if (empty($data['b_style'])){
        $errors['b_style'] = "You don't type book style";
    }
    if (empty($data['b_author'])){
        $errors['b_author']="You don't type author name";
    }
    // not error->insert
    if (!$errors){
        add_book($data['b_name'], $data['b_style'], $data['b_author']);
        // return to main page
        header("location: book-list.php?pn=".$last);
    }
}

disconnect_db();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add book</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1 style="text-align: center;color: cornflowerblue" >Add book you wanna</h1>
        <a href="book-list.php">Return</a> <br/> <br/>
        <form method="post" action="book-add.php">

            <table width="50%" border="1" cellspacing="0" cellpadding="10" >
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['b_name']) ? $data['b_name'] : ''; ?>"/>
                        <?php if (!empty($errors['b_name'])) echo $errors['b_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>
                        <select name="style">
                            <option value="0">Choose Style</option>
                            <option value="1">Truyện Ngắn</option>
                            <option value="2">Viễn Tưởng</option>
                            <option value="3">Ký Sự</option>
                            <option value="4">Đạo Đức</option>
                        </select>
                        <?php if (!empty($errors['b_style'])) echo $errors['b_style']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>
                        <input type="text" name="author" value="<?php echo !empty($data['b_author']) ? $data['b_author'] : ''; ?>"/>
                        <?php if(!empty($errors['b_author'])) echo $errors['b_author']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_book" value="Save"/>
                    </td>
                </tr>
            </table>

        </form>

    </body>
</html>