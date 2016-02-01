<?php 
$url='https://itunes.apple.com/jp/rss/topalbums/limit=100/genre=20/xml';
$req=simplexml_load_file($url);
/*
echo '<pre>';
print_r($req);
echo '</pre>';
*/

function h($v){
return htmlspecialchars($v,ENT_QUOTES);
}

isset($_POST['words'])?$words=h($_POST['words']):'';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>itunes 検索</title>

</head>
<body>
<div class="container">

	<div class="content">
		<h1>itunes作戦！検索できるようにしちゃう</h1>
		<div class="serchbox">
			<form method="post" action="">
				<input type="text" name="words">
				<input type="submit" value="タイトルから検索">
			</form>
		</div>
		<?php 
			foreach($req->entry as $cnt){
				if(isset($_POST['words']) && $_POST['words']!==''){
					if(mb_strpos($cnt->title,$words)!==false){
						echo "<h2>$cnt->title</h2>";
					}
				}		
			}		
		;?>
		

	</div>
</div>
</body>
</html>


