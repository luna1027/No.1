<?php
include_once "base.php";

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
    $img = $_FILES['img']['name'];
}

$Title->save(['img' => $img, 'text' => $_POST['text'], 'sh' => 0]);
to('../admin.php?do=title');


?>