<?php
include_once "./base.php";

$Ad->save(['text' => $_POST['text']]);
to("../admin.php?do=ad");

?>
