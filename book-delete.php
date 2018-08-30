<?php
require './libs/book.php';
require './libs/PaginationControl.php';
// Thực hiện xóa
$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : '';
if ($id){
delete_book($id);
}

// Trở về trang danh sách
header("location: book-list.php?pn=");