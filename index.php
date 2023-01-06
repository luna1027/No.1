<?php
include_once "./api/base.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover.')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<a title="<?= $Title->find(['sh' => 1])['text']; ?>" href="index.php">
			<div class="ti" style="background:url('upload/<?= $Title->find(['sh' => 1])['img']; ?>'); background-size:cover;"></div>
			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli"> 主選單區 </span>
					<?php
					$rows = $Menu->all(['parent' => 0, 'sh' => 1]);
					foreach ($rows as $row) {
					?>
						<div class="mainmu cent parent">
							<a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $row['href']; ?>">
								<?= $row['name']; ?>
							</a>
							<?php
							echo "<div class= 'mw'>";
							if ($Menu->count('*', ['parent' => $row['id']] > 0)) {
								$babys = $Menu->all(['parent' => $row['id'], 'sh' => 1]);
								// prr($babys);
								foreach ($babys as $baby) {
							?>
									<div class='mainmu2 cent'>
										<a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $baby['href']; ?>">
											<?= $baby['name']; ?>
										</a>
									</div>
							<?php
								}
							}
							echo "</div>";
							?>
						</div>
					<?php
					}
					?>
				</div>
				<script>
				</script>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 : <?= $Total->find(1)['text']; ?> </span>
				</div>
			</div>
			<?php
			$do = $_GET['do'] ?? 'home';
			$file = "./front/" . $do . ".php";
			if (file_exists($file)) {
				include_once $file;
			} else {
				include_once "./front/home.php";
			}
			?>
			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "")
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<div style="width:89%; height:480px;" class="dbor cent">
					<span class="t botli" style="margin-bottom:20px;">校園映象區</span>
					<div class="cent" onclick="ed()"><img src="./icon/01E01.jpg" alt=""></div>
					<div class="ssaa" style="list-style-type:decimal; padding-left:0;">
						<?php
						$rows = $Image->all(['sh' => 1]);
						// prr($rows);
						// foreach ($rows as $key => $row) {
						?>
						<div class="im cent">
							<img class="ti imgg" src="" style="width: 150px; height:103px;border:2px solid #F3DA49;margin:8px;"></img>
						</div>
						<div class="im cent">
							<img class="ti imgg" src="" style="width: 150px; height:103px;border:2px solid #F3DA49;margin:8px;"></img>
						</div>
						<div class="im cent">
							<img class="ti imgg" src="" style="width: 150px; height:103px;border:2px solid #F3DA49;margin:8px;"></img>
						</div>
						<?php
						// }
						?>
					</div>
					<div class="cent" onclick="next()"><img src="./icon/01E02.jpg" alt=""></div>
					<script>
						const array = new Array();
						<?php
						$rows = $Image->all(['sh' => 1]);
						foreach ($rows as $row) {
							echo "array.push('./upload/{$row['img']}');";
						}
						?>
						console.log(array);

						test();

						function test() {
							for (j = 0; j < 3; j++) {
								console.log($(".ti"));
								$(".imgg").eq(j).attr('src', array[j]);
							}
						}

						function ed() {
							let last = array.pop();
							array.unshift(last);
							test();
						}

						function next() {
							let one = array.shift();
							array.push(one);
							test();
						}

					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"> <?= $Bottom->find(1)['text']; ?> </span>
		</div>
	</div>

</body>

</html>