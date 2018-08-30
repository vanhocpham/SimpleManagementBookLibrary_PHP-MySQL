<?php

require './libs/book.php';
require './libs/PaginationControl.php';

connect_db();
//take information user wanna edit
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';

if ($id){
    $data = get_book_id($id);
}

// if not data -> not book need edit
if (!$data){
    header("location: book-list.php?pn=");
}

//if user submit form
if (!empty($_POST['edit_book']))
{
    // take data
    $data['b_name']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['b_style']         = isset($_POST['style']) ? $_POST['style'] : '';
    $data['b_author']    = isset($_POST['author']) ? $_POST['author'] : '';
    $data['b_id']          = isset($_POST['id']) ? $_POST['id'] : '';

    // Validate information
    $errors = array();
    if (empty($data['b_name'])){
        $errors['b_name'] = "you don't type book name";
    }

    if (empty($data['b_style'])){
        $errors['b_style'] = "You don't type book style";
    }
    if (empty($data['b_author'])){
        $errors['b_author']="You don't type author name";
    }

    // Not error -> insert
    if (!$errors){
        edit_book($data['b_id'], $data['b_name'], $data['b_style'], $data['b_author']);
        // return page have id wanna edit
        header("location: book-list.php?pn=");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit book</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 style="text-align: center;color: cornflowerblue">Edit book you wanna</h1>
<a href="book-list.php">Return</a> <br/> <br/>
<form method="post" action="">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="<?php echo $data['b_name']; ?>"/>
                <?php if (!empty($errors['b_name'])) echo $errors['b_name']; ?>
            </td>
        </tr>
        <tr>
            <td>Style</td>
            <td>
                <select name="style">
                    <option>Choose Style</option>
                    <option value="1"<?php if (!empty($data['b_style']) && $data['b_style'] == '1') echo 'selected'; ?>>Truyện Ngắn</option>
                    <option value="2"<?php if (!empty($data['b_style']) && $data['b_style'] == '2') echo 'selected'; ?>>Viễn Tưởng</option>
                    <option value="3"<?php if (!empty($data['b_style']) && $data['b_style'] == '3') echo 'selected'; ?>>Ký Sự</option>
                    <option value="4" <?php if (!empty($data['b_style']) && $data['b_style'] == '4') echo 'selected'; ?>>Đạo Đức</option>
                </select>
                <?php if (!empty($errors['b_style'])) echo $errors['b_style']; ?>
            </td>
        </tr>
        <tr>
            <td>Author</td>
            <td>
                <input type="text" name="author" value="<?php echo !empty($data['b_author']) ? $data['b_author'] : ''; ?>"/>
                <?php if(!empty($errors['b_author'])) echo $errors['b_author'];?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="hidden" name="id" value="<?php echo $data['b_id']; ?>"/>
                <input type="submit" name="edit_book" value="Save"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>