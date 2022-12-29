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
            switch ($table) {
                case 'Admin':
                    if (!empty($_POST['acc'][$idx]) && !empty($_POST['pw'][$idx])) {
                        $$table->save(['acc' => $_POST['acc'][$idx], 'pw' => $_POST['pw'][$idx], 'id' => $_POST['id'][$idx]]);
                    }
                    break;
                case 'Menu':

                    break;
                default:
                    $sh = in_array($id, $_POST['sh']) ? 1 : 0;
                    if (isset($_POST['text'])) {
                        $text = $_POST['text'][$idx];
                        $$table->save(['text' => $text, 'sh' => $sh, 'id' => $id]);
                    } else {
                        $$table->save(['sh' => $sh, 'id' => $id]);
                    }

                    break;
            }
        }
    }
} else {
    to("../admin.php?do=" . lcfirst($table));
}
// 多的 => 考試可以不用寫 :D //
if ($table == 'Title') {
    if (!empty($$table->all(['sh' => 0])) && empty($$table->find(['sh' => 1]))) {
        $minId = $$table->min('id', 1);
        $$table->save(['sh' => 1, 'id' => $minId]);
    }
}


to("../admin.php?do=" . lcfirst($table));
