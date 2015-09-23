<?php
error_reporting(-1);
ini_set('display_errors', 1);
?>
<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Password Generator</title>
	<link rel='stylesheet' href='style.css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<?php require('logic.php'); ?>
</head>
<body>
	<div class = 'container'>
		<h1> xkcd Password Generator</h1>
		<p class = 'pswrd'>
			<?php
			if(sizeof($_POST)>1 || !$_POST==NULL){
			if(! array_key_exists('spc_char',$_POST) && !array_key_exists('number',$_POST)){
				echo generate_password($_POST["words_num"],NULL,NULL);
			}elseif (!array_key_exists('spc_char',$_POST)) {
				echo generate_password($_POST["words_num"],NULL,$_POST["number"]);
			}elseif (!array_key_exists('number',$_POST)) {
				echo generate_password($_POST["words_num"],$_POST["spc_char"],NULL);
			}else {
				echo generate_password($_POST["words_num"],$_POST["spc_char"],$_POST["number"]);
			}
		}
			?>
		</p>
		<form method ='POST' action='index.php'>

			<label for='words'> Number of words (Max 9):</label>
			<input type='text' name='words_num' maxlength="1">

			<label for='characters'>Include Special Character:</label>
			<input type='checkbox' name='spc_char'>

			<label for='number'>Include Number:</label>
			<input type='checkbox'  name='number'> <br>

			<input class='submit' type='submit' value='Get Password!'><br>
		</form>
	</div>
</body>
