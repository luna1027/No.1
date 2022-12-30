<h3>編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table class="sunmenuTable" style="margin: auto;">
        <tr>
            <td width="30%">次選單名稱</td>
            <td width="60%">次選單連結網址</td>
            <td width="10%">刪除</td>
        </tr>
        <?php
        include_once "../api/base.php";
        $rows = $Menu->all(['parent' => $_GET['id']]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><input type="text" name="name[]" value="<?= $row['name']; ?>"></td>
                <td><input type="text" name="href[]" value="<?= $row['href']; ?>" style="width:300px"></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" class="addSubMenu" value="更多次選單">
    </div>
</form>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/js.js"></script>