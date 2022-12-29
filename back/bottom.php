<!-- <h2>bottom</h2> -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_text.php">
        <table width="100%">
            <tbody>
                <tr class="">
                    <td width="15%" style="background-color: #F3DA49;">頁尾版權資料:</td>
                    <td><input type="text" name="text" value="<?= $Bottom->find(1)['text'] ?>"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:100%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="Bottom">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>