<?php
include_once "./base.php";

if (!empty($_POST['total'])) {
    $Total->save(['total' => $_POST['total'], 'id' => 1]);
} else {
    to("../admin.php?do=total");
}
to("../admin.php?do=total");
?>