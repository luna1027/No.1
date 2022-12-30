<!-- <h2>menu</h2> -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="15%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td width=""></td>
                </tr>
                <?php
                $rows = $Menu->all(['parent' => 0]);
                foreach ($rows as $row) {
                    $checked = $row['sh'] == 1 ? 'checked' : '';
                ?>
                    <tr class="">
                        <td class="cent"><input type="text" name="name[]" value="<?= $row['name']; ?>" style="width:95%"></td>
                        <td class="cent"><input type="text" name="href[]" value="<?= $row['href']; ?>" style="width:95%"></td>
                        <td class="cent"><?= $Menu->count("*", ['parent' => $row['id']]); ?></td>
                        <td class="cent"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked; ?>></td>
                        <td class="cent"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        <td class="cent"><input type="button" onclick="op('#cover','#cvr','./modal/submenu.php?id=<?= $row['id']; ?>')" value="編輯次選單"></td>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/menu.php')" value="新增主選單"></td>
                    <input type="hidden" name="table" value="Menu">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>