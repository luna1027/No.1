<?php
include_once "./base.php";

prr($_POST);
prr(${$_POST['table']});
$table = $_POST['table'];

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $$table->del(['id' => $id]);
        } else {
            $text = $_POST['text'][$idx];
            $sh = in_array($id, $_POST['sh']) ? 1 : 0;
            $$table->save(['text' => $text, 'sh' => $sh, 'id' => $id]);
        }
    }
} else {
    to("../admin.php?do=ad");
}

to("../admin.php?do=ad");
?>