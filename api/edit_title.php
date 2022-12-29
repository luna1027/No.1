<?php
include_once "./base.php";

prr($_POST);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Title->del(['id' => $id]);
        } else {
            $text = $_POST['text'][$idx];
            $sh = $_POST['sh'] == $id ? 1 : 0;
            $Title->save(['text' => $text, 'sh' => $sh, 'id' => $id]);
        }
    }
} else {
    to("../admin.php?do=title");
}

// foreach ($_POST['text'] as $key => $text) {
//     $Title->save(['text' => $text, 'id' => $_POST['id'][$key]]);
// }

// $originSh = $Title->find(['sh' => 1])['id'];
// $Title->save(['sh' => 0, 'id' => $originSh]);
// $Title->save(['sh' => 1, 'id' => $_POST['sh']]);

// if (isset($_POST['del'])) {
//     foreach ($_POST['del'] as $del_id) {
//         $Title->del(['id' => $del_id]);
//     }
// }

// 多的 => 考試可以不用寫 :D //
if (empty($Title->find(['sh' => 1]))) {
    $minId = $Title->min('id', 1);
    $Title->save(['sh' => 1, 'id' => $minId]);
}

to("../admin.php?do=title");
?>