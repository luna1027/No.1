<?php
include_once "./base.php";

// prr($_FILES);
if (!empty($_FILES['img']['tmp_name'])) {
    // unlink()
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
    $img = $_FILES['img']['name'];
}

$Title->save(['img' => $img, 'id' => $_POST['id']]);

to("../admin.php?do=title");

?>