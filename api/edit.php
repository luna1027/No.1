<?php
include_once "./base.php";

prr($_POST);
prr(${$_POST['table']});
$table = $_POST['table'];

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $$table->del(['id' => $id]);
            if ($table == 'Menu') {
                $Menu->del(['parent' => $id]);
            }
        } else {
            $row = $$table->find($id);

            switch ($table) {
                case 'Admin':
                    if (!empty($_POST['acc'][$idx]) && !empty($_POST['pw'][$idx])) {
                        $row['acc'] = $_POST['acc'][$idx];
                        $row['pw'] = $_POST['pw'][$idx];
                    }
                    break;

                case 'Menu':
                    $row['name'] = $_POST['name'][$idx];
                    $row['href'] = $_POST['href'][$idx];
                    $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']) ? 1 : 0;
                    break;

                default:
                    if (isset($_POST['text'])) {
                        $row['text'] = $_POST['text'][$idx];
                    }
                    $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']) ? 1 : 0;
                    break;
            }
            $$table->save($row);
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
