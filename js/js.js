// JavaScript Document
$(document).ready(function (e) {
	$(".mainmu").mouseover(
		function () {
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function () {
			$(this).children(".mw").hide()
		}
	)
	// 
	$(".addSubMenu").on("click", function () {
		let ntr = `<tr>
						<td><input type="text" name="nameN[]"></td>
						<td><input type="text" name="hrefN[]" style="width:300px"></td>
						<td><button class="minus" style="width:40px;border:none;color:#fff;background-color:red;border-radius:4px;font-size: large;">-</button></td>
				   </tr>`;
		$(".sunmenuTable").append(ntr);
		$(".minus").on("click", function () {
			$(this).parent().parent().remove();
		})
	})
});

function lo(x) {
	location.replace(x)
}
function op(x, y, url) {
	$(x).fadeIn()
	if (y)
		$(y).fadeIn()
	if (y && url)
		$(y).load(url)
}
function cl(x) {
	$(x).fadeOut();
}
