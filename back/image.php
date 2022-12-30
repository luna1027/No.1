<!-- <h2>image</h2> -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映象資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="60%">校園映象資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $num = 3;
                $length = $Image->count('*', 1);
                // echo $length;
                $pages = ceil($length / $num);
                // echo $pages;
                $page = $_GET['p'] ?? 1;
                // echo $page;
                $start = ($page - 1) * $num;
                $lastPage = $page - 1 < 1 ? 1 : $page - 1;
                $nextPage = $page + 1 > $pages ? $pages : $page + 1;
                $rows = $Image->all(' LIMIT ' . $start . ',' . $num);
                // prr($rows);
                foreach ($rows as $row) {
                    $checked = $row['sh'] == 1 ? 'checked' : '';
                ?>
                    <tr>
                        <td class="cent"><img src="./upload/<?= $row['img']; ?>" style="width:300px;height:100px;object-fit: contain;"></td>
                        <td class="cent"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked; ?>></td>
                        <td class="cent"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        <td class="cent">
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload_image.php?id=<?= $row['id'] ?>')" value="更新圖片">
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <div style="text-align:center;">
            <a class="bl" style="font-size:15px;" href="?do=image&p=<?= $lastPage; ?>">&lt;&nbsp;</a>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                $fontSize = ($i == $page) ? "font-size:25px;" : "font-size:20px;";
            ?>
                <a class="bl" style="<?= $fontSize; ?>" href="?do=image&p=<?= $i; ?>"><?= $i; ?></a>
            <?php
            }
            ?>
            <a class="bl" style="font-size:15px;" href="?do=image&p=<?= $nextPage; ?>">&nbsp;&gt;</a>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/image.php')" value="新增校園映象圖片"></td>
                    <input type="hidden" name="table" value="Image">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>