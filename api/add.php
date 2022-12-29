<?php
include_once "./base.php";

$table = $_POST['table'];
$data = [];

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
    $data['img'] = $_FILES['img']['name'];
}

switch ($table) {
    case 'Admin':
        if (!empty($_POST['acc']) && !empty($_POST['pw'])) {
            $data['acc'] = $_POST['acc'];
            $data['pw'] = $_POST['pw'];
        }
        break;
    case 'Menu':
        break;
    default:
        if (isset($_POST['text'])) {
            $data['text'] = $_POST['text'];
        }
        $data['sh'] = ($table == "Title") ? 0 : 1;
        break;
}

$$table->save($data);
to('../admin.php?do=' . lcfirst($table));
