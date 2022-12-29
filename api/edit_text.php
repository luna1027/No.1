<?php
include_once "./base.php";

$table=$_POST['table'];

if (!empty($_POST['text'])) {
    $$table->save(['text' => $_POST['text'], 'id' => 1]);
} else {
    to("../admin.php?do=". lcfirst($table));
}
to("../admin.php?do=". lcfirst($table));
?>