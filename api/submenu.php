<?php
include_once "./base.php";
prr($_POST);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } elseif (!empty($_POST['name'][$idx] && !empty($_POST['href'][$idx]))) {
            $row = $Menu->find($id);
            $row['name'] = $_POST['name'][$idx];
            $row['href'] = $_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}

if (isset($_POST['nameN'])) {
    foreach ($_POST['nameN'] as $idx => $nameN) {
        if (!empty($nameN) && !empty($_POST['hrefN'][$idx])) {
            $Menu->save(['name' => $nameN, 'href' => $_POST['hrefN'][$idx], 'sh' => 1, 'parent' => $_POST['parent']]);
        }
    }
}

to("../admin.php?do=menu");

?>