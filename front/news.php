<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div style="width:95%;height: 250px; padding:2px;  margin-top:10px; padding:5px 10px 5px 10px; border:transparent dashed 3px; position:relative;">
		<span class="t botli" style="display:flex;justify-content:space-between;">
			更多最新消息區
		</span>

		<?php
		$num = 5;
		$length = $News->count('*', 1);
		// echo $length;
		$pages = ceil($length / $num);
		// echo $pages;
		$page = $_GET['p'] ?? 1;
		// echo $page;
		$start = ($page - 1) * $num;
		$lastPage = $page - 1 < 1 ? 1 : $page - 1;
		$nextPage = $page + 1 > $pages ? $pages : $page + 1;
		$rows = $News->all(' LIMIT ' . $start . ',' . $num);
		// prr($rows);
		// $rows = $News->all(['sh' => 1]);
		echo "<ol start='" . ($start + 1) . "' class='ssaa' style='list-style-type:decimal;'>";
		foreach ($rows as $row) {
		?>
			<li>
				<p class="all"><?= $row['text']; ?></p>
			</li>
		<?php
		}
		echo "</ol>";
		?>
		<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
		<script>
			$(".ssaa li").hover(
				function() {
					$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
						"top": $(this).offset().top - 80
					})
					console.log($(this));
					$("#altt").show()
				}
			)
			$(".ssaa li").mouseout(
				function() {
					$("#altt").hide()
				}
			)
		</script>
	</div>
	<div style="text-align:center;">
		<a class="bl" style="font-size:15px;" href="?do=news&p=<?= $lastPage; ?>">&lt;&nbsp;</a>
		<?php
		for ($i = 1; $i <= $pages; $i++) {
			$fontSize = ($i == $page) ? "font-size:25px;" : "font-size:20px;";
		?>
			<a class="bl" style="<?= $fontSize; ?>" href="?do=news&p=<?= $i; ?>"><?= $i; ?></a>
		<?php
		}
		?>
		<a class="bl" style="font-size:15px;" href="?do=news&p=<?= $nextPage; ?>">&nbsp;&gt;</a>
	</div>
</div>