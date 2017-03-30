<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	$qu = "SELECT * FROM news";
	$notice = mysqli_query($dbc, $qu);

	foreach($notice as $news) {
	?>
	<img src="images/new.gif" alt="" width="30" height="15">
	<a href="<?php echo $news['news_body'] ?>" target="_blank">&nbsp;<?php echo $news['news_head'] ?></a><br><br>
	<?php 
	}
?>       
