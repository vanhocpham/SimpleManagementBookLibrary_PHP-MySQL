<?php
require './libs/book.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
delete_book($id);
}

// Trở về trang danh sách
header("location: book-list.php");