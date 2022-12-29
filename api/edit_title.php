<?php
include_once "./base.php";

$originSh = $Title->find(['sh' => 1])['id'];
$Title->save(['sh' => 0, 'id' => $originSh]);
$Title->save(['sh' => 1, 'id' => $_POST['sh']]);

if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $del_id) {
        $Title->del(['id' => $del_id]);
    }
}

to("../admin.php?do=title");

?>
